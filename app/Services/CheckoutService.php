<?php

namespace App\Services;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CheckoutService
{
  protected $productRepository;

  public function __construct(ProductRepositoryInterface $productRepository)
  {
    $this->productRepository = $productRepository;
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
      $seller_subaccount_code->flutterwave_subaccount_id;
      
      // get the dispatch rider flutterwave subaccount code
      $rider_subaccount_code = $this->productRepository->get_dispatch_rider_subaccount_code($product_id);
      $rider_subaccount_code->flutterwave_subaccount_id;

      // save order details into the DB
      $save_order = $this->orderRepository->save($params);
      if(!$save_order){
        DB::rollBack();
        return general_error_message('An error occurred. Order not saved');
      }
      // generate payment link for users to pay
      // send invoice to user(buyer)
    }catch(\Exception $e){
      DB::rollBack();
      throw $e;
    }  
  }
}