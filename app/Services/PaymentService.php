<?php

namespace App\Services;

use GuzzleHttp\Client;

class PaymentService
{
  public function create_subaccount($request)
  {
    $form_params = [
      'account_bank' => $request['account_bank_code'],
      'account_number' => $request['account_number'],
      'business_name' => $request['name'],
      'country' => $request['country'],
      'split_value' => 0.05,
      'business_mobile' => $request['phone_number'],
      'business_email' =>  $request['email']
    ];

    $client = new Client(); 
    try {
      $response = $client->request('POST', env('RAVE_API_URL').'subaccounts', [
        'json' => $form_params, 
        'headers' => [
          'Authorization' => 'Bearer ' .env('RAVE_SECRET_KEY'),
          'Accept'        => 'application/json',
        ]
      ]);
      $result = json_decode($response->getBody(), true);
      return  $result["data"]["subaccount_id"];       
    }catch (\Exception $e) {
      return  array(
            'status' => false,
            'message' => $e->getMessage()
          );
    }

  }

  public function verify_payment()
  {

  }
}