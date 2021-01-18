<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use Illuminate\Http\Request;
use App\Services\CheckoutService;
use App\Traits\ApiResponseMessage;
use Illuminate\Support\Facades\Redirect;

/**
 * @group Products Checkout
 */
class CheckoutController extends Controller
{
  use ApiResponseMessage;
  
  protected $checkoutService;

  public function __construct(CheckoutService $checkoutService)
  {
    $this->checkoutService = $checkoutService;
  }

  /**
   * Create Order
   * This endpoint should create user order and setup payment link
   * grand_total
   * @bodyParam sub_total numeric required This is the sub total amount without the delivery fee
   * @bodyParam delivery_fee numeric required The delivery fee of the product(s) purchased
   * @bodyParam item_count numeric required  The number of products purchased
   * @bodyParam first_name string required The firstname of the buyer
   * @bodyParam last_name string required The lastname of the buyer
   * @bodyParam company_name string optional The company name of the buyer if available (optional)
   * @bodyParam address string required The delivery address where the buyer wants the products to be delivered to
   * @bodyParam city string required The city of the delivery address
   * @bodyParam country string required The country of the delivery address
   * @bodyParam state string required The state of the delivery address
   * @bodyParam email email required The email address of the buyer
   * @bodyParam post_code string required The postal code of the delivery address
   * @bodyParam phone_number numeric required The phone number of the buyer
   * @bodyParam notes string optional The additional notes of the order (optional)
   * @bodyParam items array required This is an array of array of the details of the products to be purchased. For example items: [{ "product_id": "1", "product_name": "eazy shoes", "quantity": "1", "price": "50000" }]
   * @response{
   *     "status": true,
   *     "message": "Payment link created successfully",
   *     "data": {
   *       "grand_total": "91250",
   *       "callback_url": "http:\/\/localhost:8000\/callback_endpoint",
   *       "sub_total": "90000",
   *       "delivery_fee": "1250",
   *       "item_count": "2",
   *       "first_name": "bamidele",
   *       "last_name": "Adebayo",
   *       "address": "Akarabata, line 3, lagere, ile-ife",
   *       "city": "ile-ife",
   *       "state": "osun",
   *       "country": "Nigeria",
   *       "email": "eazybright1@gmail.com",
   *       "post_code": "2200221",
   *       "phone_number": "08135306027",
   *       "items": [
   *         {
   *           "product_id": "1",
   *           "product_name": "eazy shoes",
   *           "quantity": "1",
   *           "price": "50000"
   *         },
   *         {
   *           "product_id": "2",
   *           "product_name": "Perfume",
   *           "quantity": "1",
   *           "price": "40000"
   *         }
   *       ],
   *       "payment_link": {
   *         "link": "https:\/\/checkout-testing.herokuapp.com\/v3\/hosted\/pay\/ee1d6996daed8b480e64"
   *       },
   *       "order_number": "JUMGA-6004CAC59D4A0",
   *       "status": "pending"
   *     }
   *   }
   */
  public function place_order(PlaceOrderRequest $request)
  {
    try {
      $data = $this->checkoutService->store_order_details($request->all());

      if((isset($data['status'])) && ($data['status'] == false)){
        return $this->ErrorResponse("Unable to store order details, please try again", 
                $data['message'], 400);
      }

      return $this->SuccessResponse($data, "Payment link created successfully", 201);
    }catch(\Exception $e) {
      return $this->ExceptionResponse($e);
    }
  }

  public function confirm_order_payment(Request $request)
  {
    try {
      $data = $this->checkoutService->confirm_order_payment($request->all());

      if((isset($data['status'])) && ($data['status'] == false)){
        return $this->ErrorResponse("An error occurred, please try again", 
                $data['message'], 400);
      }

      $url = env('FRONTEND_URL').'confirm?order_number='.$data['order_number'].
        '&transaction_id='.$data['transaction_id'].'&payment_reference='.$data['payment_reference'];
      return Redirect::to($url);
    }catch(\Exception $e) {
      throw $e;
    }
  }
}
