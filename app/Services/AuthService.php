<?php

namespace App\Services;

class AuthService
{
  public function register_user()
  {

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