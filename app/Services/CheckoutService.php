<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InvoiceCreated;
use App\Notifications\InvoicePaid;
use App\Notifications\NotifySellerForProductPurchase;
use App\Constants\OrderStatus;
use App\Constants\PaymentStatus;

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
      $param['payment_status'] = $save_order->payment_status;

      // send invoice to user(buyer)
      Notification::route('mail', $params['email'])
                  ->notify(new InvoiceCreated($params));
      DB::commit();
      return $params;
    }catch(\Exception $e){
      DB::rollBack();
      throw $e;
    }  
  }

  public function confirm_order_payment($params)
  {
    // verify payment
    $verify_payment = $this->paymentService->verify_payment($params['transaction_id']);
    if(isset($verify_payment['status']) && $verify_payment['status'] == false ){
      return $verify_payment;
    }

    DB::beginTransaction();
    try{
      // check if order exists 
      $check_order = $this->orderRepository->get_order($params['order_number']);
      if(!$check_order){
        return general_error_message('Order number not found');
      }

      // update order details
      $check_order->status = OrderStatus::PROCESSING;
      $check_order->payment_status = PaymentStatus::COMPLETED;
      $check_order->payment_reference = $verify_payment['tx_ref'];
      $check_order->save();

      // get seller email address
      $seller_email_address = $this->orderRepository->get_seller_email_address($check_order->id);
      if(!$seller_email_address){
        return general_error_message('Seller details not found');
      }

      // send notification to the user(buyer) about the confirmed payment
      Notification::route('mail', $check_order->email)
                  ->notify(new InvoicePaid($check_order));
      
      // send notification to the seller about the product bought
      Notification::route('mail', $seller_email_address->email)
                  ->notify(new NotifySellerForProductPurchase($check_order));
      
      DB::commit();
      return $check_order;

      /**
       * TODO later sha
       * Update the number of stock available for each product bought
       */
    }catch(\Exception $e){
      DB::rollBack();
      throw $e;
    }
  }
}