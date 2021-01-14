<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StoreService;
use App\Traits\ApiResponseMessage;

/**
 * @group Stores
 */
class StoreController extends Controller
{
  use ApiResponseMessage;

  protected $storeService;

  public function __construct(StoreService $storeService)
  {
    $this->storeService = $storeService;
  }
  /**
   * Get all stores
   * Display a listing of all stores.
   * @response{
   *     "status": true,
   *     "message": "Successful",
   *     "data": [
   *         {
   *             "id": 2,
   *             "name": "Eazbright store",
   *             "image": "https://res.cloudinary.com/api-seekhostel/image/upload/v1609959281/JUMGA_FOR_FLUTTERWAVE%20-%20Shop%20Images/nplltsxgtqjsoh2z92sc.png",
   *             "location": "ikeja, lagos",
   *             "public_reference_id": "",
   *             "description": "a very conducive store",
   *             "user_id": 5,
   *             "dispatch_rider_id": 2,
   *             "created_at": "2021-01-06T18:54:42.000000Z",
   *             "updated_at": "2021-01-06T18:54:42.000000Z"
   *         },
   *         {
   *             "id": 1,
   *             "name": "Eazbright store",
   *             "image": "https://res.cloudinary.com/api-seekhostel/image/upload/v1609958802/JUMGA_FOR_FLUTTERWAVE%20-%20Shop%20Images/itlylp997digqwvq8frb.png",
   *             "location": "ikeja, lagos",
   *             "public_reference_id": "",
   *             "description": "a very conducive store",
   *             "user_id": 4,
   *             "dispatch_rider_id": 2,
   *             "created_at": "2021-01-06T18:46:44.000000Z",
   *             "updated_at": "2021-01-06T18:46:44.000000Z"
   *         }
   *     ]
   * }
   */
  public function index()
  {
    try {
      $data = $this->storeService->get_all_stores();

      if(isset($data['status']) && $data['status'] == false ){
        return $this->ErrorResponse("An error, please try again", 
                $data['message'], 400);
      }

      return $this->SuccessResponse($data, "Successful", 201);
    }catch(\Exception $e) {
      return $this->ExceptionResponse($e);
    }
  }

 
  public function store(Request $request)
  {
      //
  }

   /**
   * Get a store
   * Get store details by its id
   * @response{
   *     "status": true,
   *     "message": "Successful",
   *     "data": {
   *         "id": 1,
   *         "name": "Eazbright store",
   *         "image": "https://res.cloudinary.com/api-seekhostel/image/upload/v1609958802/JUMGA_FOR_FLUTTERWAVE%20-%20Shop%20Images/itlylp997digqwvq8frb.png",
   *         "location": "ikeja, lagos",
   *         "public_reference_id": "",
   *         "description": "a very conducive store",
   *         "user_id": 4,
   *         "dispatch_rider_id": 2,
   *         "created_at": "2021-01-06T18:46:44.000000Z",
   *         "updated_at": "2021-01-06T18:46:44.000000Z",
   *         "products": [
   *             {
   *                 "id": 1,
   *                 "name": "eazy shoes",
   *                 "description": "A collection os shoes",
   *                 "price": "50000",
   *                 "number_of_stock": "80",
   *                 "public_reference_id": "5ffc36bdd1b0f",
   *                 "delivery_fee": "800",
   *                 "user_id": 4,
   *                 "store_id": 1,
   *                 "created_at": "2021-01-11T11:30:05.000000Z",
   *                 "updated_at": "2021-01-12T12:43:08.000000Z",
   *                 "images": [
   *                     {
   *                         "id": 1,
   *                         "image": "https://res.cloudinary.com/api-seekhostel/image/upload/v1610364609/JUMGA_FOR_FLUTTERWAVE%20-%20Product%20Images/splnn0brrelkbrxdfgbb.png",
   *                         "product_id": 1,
   *                         "created_at": "2021-01-11T11:30:10.000000Z",
   *                         "updated_at": "2021-01-11T11:30:10.000000Z"
   *                     },
   *                     {
   *                         "id": 2,
   *                         "image": "https://res.cloudinary.com/api-seekhostel/image/upload/v1610364613/JUMGA_FOR_FLUTTERWAVE%20-%20Product%20Images/v3mkeajh6wklfnzxkneq.png",
   *                         "product_id": 1,
   *                         "created_at": "2021-01-11T11:30:15.000000Z",
   *                         "updated_at": "2021-01-11T11:30:15.000000Z"
   *                     }
   *                 ]
   *             }
   *         ]
   *     }
   * }
   */
  public function show(int $store_id)
  {
    try {
      $data = $this->storeService->get_by_id($store_id);

      if(isset($data['status']) && $data['status'] == false ){
        return $this->ErrorResponse("An error, please try again", 
                $data['message'], 400);
      }

      return $this->SuccessResponse($data, "Successful", 201);
    }catch(\Exception $e) {
      return $this->ExceptionResponse($e);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
