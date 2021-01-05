<?php

namespace App\Services;

use App\Constants\Role;
use Illuminate\Support\Facades\DB;
use App\Services\PaymentService;


class AuthService
{
  protected $paymentService;

  public function __construct(PaymentService $paymentService)
  {
    $this->paymentService = $paymentService;
  }

  public function register_user($params)
  {
    DB::beginTransaction();
    try{
      $params['password'] = app('hash')->make($params['password']);
       // verify seller payment to register a shop 
      // also upload image of the store to cloudinary
      if($params['role'] == Role::SELLER){
        
      }

      //create a payment subaccount for seller and rider
      $subaccount = $this->paymentService->create_subaccount($params);
      if(isset($subaccount['status']) && $subaccount['status'] == false ){
        DB::rollback();
        return $subaccount;
      }
      $params['flutterwave_subaccount_id'] = $subaccount;
      //create account into the database
      DB::commit();
    }catch(\Exception $e){
      DB::rollback();
      throw $e;
    }
  }
}



// $create_user = $this->user_repo->save($request);

// if($create_user){
//   $tokenResult = $create_user->createToken('Personal Access Token');
//   $token = $tokenResult->token;
//   $token->save();

//   $data = [
//       'status' => true,
//       'message' => 'User created Successfully',
//       'user' => $create_user,
//       'token' => $tokenResult->accessToken
//     ]; 
    
//     // send welcome email to registered user
//     // try{
//     //     Notification::send($create_user, new WelcomeMail());
//     // }catch(\Exception $e){
//     //     return $response->withError($e->getMessage(), Response::SERVER_ERROR, 500);
//     // }

//   // return $response->withArray($data, 201);
// }

// $messageBag = new MessageBag(['message' => "User not created. Please try again!"]);
// return $response->withError($messageBag, Response::ERR_INVALID_USER, 400);