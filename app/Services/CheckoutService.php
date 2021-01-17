<?php

namespace App\Services;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Services\PaymentService;

class CheckoutService
{
  protected $productRepository;
  protected $paymentService;

  const SELLER_TRANSACTION_PERCENTAGE = 0.907;
  const RIDER_TRANSACTION_PERCENTAGE = 0.056;
  const JUMGA_BASE_PERCENTAGE = 0.023;
  const JUMGA_DELIVERY_PERCENTAGE = 0.014;

  public function __construct(ProductRepositoryInterface $productRepository,
                              PaymentService $paymentService)
  {
    $this->productRepository = $productRepository;
    $this->paymentService = $paymentService;
  }

  public function store_order_details($params)
  {
    if(!isset($params['items'])){
      return general_error_message('items parameter not set');
    }

    DB::beginTransaction();
    try{
      // get the product id of the first element in the items array
      $product_id = $params['items'][0]['product_id'];
      // get the seller flutterwave subaccount code
      $seller_subaccount_code = $this->productRepository->get_seller_subaccount_code($product_id);
      // ;
      
      // get the dispatch rider flutterwave subaccount code
      $rider_subaccount_code = $this->productRepository->get_dispatch_rider_subaccount_code($product_id);
     

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
        'rider_percentage' => self::RIDER_TRANSACTION_PERCENTAGE
      ];
      $create_payment_link = $this->paymentService->generate_payment_link($payment_payload);
      // send invoice to user(buyer)
    }catch(\Exception $e){
      DB::rollBack();
      throw $e;
    }  
  }
}