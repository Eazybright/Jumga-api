<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Traits\ApiResponseMessage;
use App\Services\AuthService;

class RegisterController extends Controller
{
  use ApiResponseMessage;

  protected $authService;

  public function __construct(AuthService $authService)
  {
    $this->authService = $authService;
  }

  //
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
