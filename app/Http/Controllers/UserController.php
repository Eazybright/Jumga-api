<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Traits\ApiResponseMessage;

/**
 * @group User dashboard
 */
class UserController extends Controller
{
  use ApiResponseMessage;

  protected $userRepository;

  public function __construct(UserRepositoryInterface $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  /**
   * Get User details
   * Get all details about a user - seller
   * @authenticated
   * @response{
   *     "status": true,
   *     "message": "Successful",
   *     "data": {
   *         "id": 4,
   *         "name": "kolawole Ezekiel",
   *         "email": "doneazy911@gmail.com",
   *         "role": "seller",
   *         "phone_number": "08135306027",
   *         "account_number": "0228415513",
   *         "account_name": "Kolawole Ezekiel Damilare",
   *         "account_bank_code": "058",
   *         "country": "Nigeria",
   *         "flutterwave_subaccount_id": "RS_BBA8FFC88A3kfjkfjBC383C",
   *         "email_verified_at": "2021-01-06T18:46:33.000000Z",
   *         "created_at": "2021-01-06T18:46:33.000000Z",
   *         "updated_at": "2021-01-06T18:46:46.000000Z",
   *         "store": {
   *             "id": 1,
   *             "name": "Eazbright store",
   *             "image": "https://res.cloudinary.com/api-seekhostel/image/upload/v1609958802/JUMGA_FOR_FLUTTERWAVE%20-%20Shop%20Images/itlylp997digqwvq8frb.png",
   *             "location": "ikeja, lagos",
   *             "description": "a very conducive store",
   *             "user_id": 4,
   *             "dispatch_rider_id": 2,
   *             "created_at": "2021-01-06T18:46:44.000000Z",
   *             "updated_at": "2021-01-06T18:46:44.000000Z",
   *             "rider": {
   *                 "id": 2,
   *                 "name": "Dispatch Rider 2",
   *                 "email": "doneazy2@gmail.com",
   *                 "role": "rider",
   *                 "phone_number": "08135306035",
   *                 "account_number": "0228415513",
   *                 "account_name": "Kolawole Ezekiel Damilare",
   *                 "account_bank_code": "058",
   *                 "country": "Nigeria",
   *                 "flutterwave_subaccount_id": "RS_BBA8FFC88A3kfjkfjBC383C",
   *                 "email_verified_at": "2021-01-06T17:55:31.000000Z",
   *                 "created_at": "2021-01-06T17:55:31.000000Z",
   *                 "updated_at": "2021-01-06T17:55:31.000000Z"
   *             }
   *         }
   *     }
   * }
   */
  public function get_user_details(Request $request)
  {
    $user_id = $request->user()->id;
    $user_details = $this->userRepository->get_details($user_id);
    return $this->SuccessResponse($user_details);
  }
}
