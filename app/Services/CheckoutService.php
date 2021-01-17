<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InvoiceCreated;

class CheckoutService
{
  protected $productRepository;
  protected $paymentService;
  protected $orderRepository;

  const SELLER_TRANSACTION_PERCENTAGE = 0.907;
  const RIDER_TRANSACTION_PERCENTAGE = 0.056;
  const JUMGA_BASE_PERCENTAGE = 0.023;
  const JUMGA_DELIVERY_PERCENTAGE = 0.014;

  public function __construct(ProductRepositoryInterface $productRepository,
                              PaymentService $paymentService,
                              OrderRepositoryInterface $orderRepository)
  {
    $this->productRepository = $productRepository;
    $this->paymentService = $paymentService;
    $this->orderRepository = $orderRepository;
  }

  public function store_order_details($params)
  {
    if(!isset($params['items'])){
      return general_error_message('items parameter not set');
    }else if(!is_array($params['items'])){
      return general_error_message('items parameter must be an array');
    }

    DB::beginTransaction();
    try{
      // get the product id of the first element in the items array
      $product_id = $params['items'][0]['product_id'];

      // get the seller flutterwave subaccount code
      $seller_subaccount_code = $this->productRepository->get_seller_subaccount_code($product_id);
      if(!$seller_subaccount_code){
        DB::rollBack();
        return general_error_message('Seller subaccount code not found');
      }
      
      // get the dispatch rider flutterwave subaccount code
      $rider_subaccount_code = $this->productRepository->get_dispatch_rider_subaccount_code($product_id);
      if(!$rider_subaccount_code){
        DB::rollBack();
        return general_error_message('Seller subaccount code not found');
      }

      // save order details into the DB
      $save_order = $this->orderRepository->save($params);
      if(!$save_order){
        DB::rollBack();
        return general_error_message('An error occurred. Order not saved');
      }

      // generate payment link for users to pay
      $payment_payload = [
        'email' => $params['email'],
        'phone_number' => $params['phone_number'],
        'name' => $params['first_name'].' '.$params['last_name'],
        'amount' => $params['grand_total'],
        'tx_ref' => generateReferenceId(),
        'payment_options' => 'account, card, banktransfer, mobilemoneyrwanda, mobilemoneyghana, mpesa, credit, barter, qr, payattitude, mobilemoneyuganda, mobilemoneytanzania, mobilemoneyzambia',
        'seller_subaccount_code' => $seller_subaccount_code->flutterwave_subaccount_id,
        'seller_percentage' => self::SELLER_TRANSACTION_PERCENTAGE,
        'rider_subaccount_code' =>  $rider_subaccount_code->flutterwave_subaccount_id,
        'rider_percentage' => self::RIDER_TRANSACTION_PERCENTAGE,
        'callback_url' => $params['callback_url']
      ];

      $create_payment_link = $this->paymentService->generate_payment_link($payment_payload);
      if(isset($create_payment_link['status']) && $create_payment_link['status'] == false){
        DB::rollBack();
        return general_error_message($create_payment_link['message']);
      }

      $params['payment_link'] = $create_payment_link;
      $params['order_number'] = $save_order->order_number;
      $params['status'] = $save_order->status;
      $param['payment-status'] = $save_order->payment_status;

      // send invoice to user(buyer)
      Notification::route('mail', $params['email'])
                  ->notify(new InvoiceCreated($params));

      return $params;
    }catch(\Exception $e){
      DB::rollBack();
      throw $e;
    }  
  }
}