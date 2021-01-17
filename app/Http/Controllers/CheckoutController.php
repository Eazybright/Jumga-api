<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Services\CheckoutService;
use App\Traits\ApiResponseMessage;

class CheckoutController extends Controller
{
  use ApiResponseMessage;
  
  protected $checkoutService;

  public function __construct(CheckoutService $checkoutService)
  {
    $this->checkoutService = $checkoutService;
  }

  //This endpoint should create user order and setup payment link
  public function place_order(PlaceOrderRequest $request)
  {
    try {
      $data = $this->checkoutService->store_order_details($request->all());

      if(isset($data['status']) && $data['status'] == false ){
        return $this->ErrorResponse("Unable to store order details, please try again", 
                $data['message'], 400);
      }

      return $this->SuccessResponse($data, "Payment link created successfully", 201);
    }catch(\Exception $e) {
      return $this->ExceptionResponse($e);
    }
  }
}
