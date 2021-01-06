<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Traits\ApiResponseMessage;
use App\Services\AuthService;

/**
 * @group Authentication endpoints
 */
class RegisterController extends Controller
{
  use ApiResponseMessage;

  protected $authService;

  public function __construct(AuthService $authService)
  {
    $this->authService = $authService;
  }

  /**
   * Register
   * Seller signs up on our platform
   * @bodyParam name string required The fullname of the user
   * @bodyParam email email required The email of the user
   * @bodyParam password password required The password of the user account
   * @bodyParam phone_number numeric required The phone number of the user
   * @bodyParam role string required The role of the user either seller or rider
   * @bodyParam account_number The account number of the user
   * @bodyParam account_name string required The bank account name of the user
   * @bodyParam account_bank_code integer required The bank code of the user preferred bank
   * @bodyParam country string required The country of residence of the user
   * @bodyParam image filepath required The cover image for the store
   * @bodyParam transaction_id integer required This is the transaction_id of the payment evidence (you can get this during the payment callback - `data.id`)
   * @bodyParam location string required The location of the store
   * @bodyParam description string required The description of the store
   * @bodyParam name_of_store string required The name of the store
   * @response {
   *     "status": true,
   *     "message": "Successful",
   *     "data": "Registration successfull"
   * }
   */
  public function register(RegisterRequest $request)
  {
    try {
      $data = $this->authService->register_user($request->all());

      if(isset($data['status']) && $data['status'] == false ){
        return $this->ErrorResponse("Unable to create User, please try again", 
                $data['message'], 400);
      }

      return $this->SuccessResponse($data, "User registered successfully", 201);
    }catch(\Exception $e) {
      return $this->ExceptionResponse($e);
    }
  }
}
