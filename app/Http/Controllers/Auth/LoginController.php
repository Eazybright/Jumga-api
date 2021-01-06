<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponseMessage;
use App\Http\Response;
use App\Services\AuthService;
use Carbon\Carbon;

/**
 * @group Authentication endpoints
 */
class LoginController extends Controller
{
  use ApiResponseMessage;

  protected $authService;

  public function __construct(AuthService $authService)
  {
    $this->authService = $authService;
  }

  /**
   * Login
   * User login into their account
   * @bodyParam email email required The email of the user
   * @bodyParam password password required The password of the user account
   * @response {
   *     "status": true,
   *     "message": "User authenticated",
   *     "data": {
   *         "user": {
   *             "id": 4,
   *             "name": "kolawole Ezekiel",
   *             "email": "donea1@gmail.com",
   *             "role": "seller",
   *             "phone_number": "08135306027",
   *             "account_number": "0228435513",
   *             "account_name": "Kolawole Ezekiel Damilare",
   *             "account_bank_code": "058",
   *             "country": "Nigeria",
   *             "flutterwave_subaccount_id": "kskjks_YRHJF",
   *             "email_verified_at": "2021-01-06T18:46:33.000000Z",
   *             "created_at": "2021-01-06T18:46:33.000000Z",
   *             "updated_at": "2021-01-06T18:46:46.000000Z"
   *         },
   *         "token": "AAAA-TOKEN",
   *         "token_type": "Bearer",
   *         "expires_at": "2021-01-06 21:19:45"
   *     }
   * }
   */
  public function login(LoginRequest $request)
  {
    $credentials = $request->only(["email", "password"]);
    
    if (!Auth::attempt($credentials)) {
      return $this->ErrorResponse(Response::ERR_INVALID_USER,
            "Invalid email and/or password", 400);
    }
    $user = $request->user();

    $tokenResult = $user->createToken('Personal Access Token');
    $token = $tokenResult->token;
    $token->expires_at = Carbon::now()->addMinutes(45);
    $token->save();

    $data = [
      'user' => $user,
      'token' => $tokenResult->accessToken,
      'token_type' => 'Bearer',
      'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
    ];
    return  $this->SuccessResponse($data, 'User authenticated');    
  }
}
