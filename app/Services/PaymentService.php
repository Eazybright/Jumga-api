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
      return general_error_message($e->getMessage());
    }
  }

  public function verify_payment($transaction_id)
  {
    $client = new Client(); 
    try {
      $response = $client->request('GET', env('RAVE_API_URL').'transactions/'.$transaction_id.'/verify', [
        'headers' => [
          'Authorization' => 'Bearer ' .env('RAVE_SECRET_KEY'),
          'Accept'        => 'application/json',
        ]
      ]);

      if (intval($response->getStatusCode()) === 200) {
        $result = json_decode($response->getBody(), true);
        return $result['data'];
      }else{ 
        return  array(
          'status' => false,
          'message' => "unable to verify payment"
        );
      }       
    }catch (\Exception $e) {
      return general_error_message($e->getMessage());
    }
  }

  public function get_all_transactions()
  {
    $client = new Client(); 
    try {
      $response = $client->request('GET', env('RAVE_API_URL').'transactions', [
        'headers' => [
          'Authorization' => 'Bearer ' .env('RAVE_SECRET_KEY'),
          'Accept'        => 'application/json',
        ],
        'query' => [
          'from' => '2021-01-01',
          'to' => '2021-01-14'
        ]
      ]);
      $result = json_decode($response->getBody(), true);
      return  array(
            'status' => true,
            'data' => $result
          );       
    }catch (\Exception $e) {
      return  general_error_message($e->getMessage());
    }
  }

  public function generate_payment_link($payment_payload)
  {
    $client = new Client(); 

    try {
      $response = $client->request('POST', env('RAVE_API_URL').'payments', [
        'headers' => [
          'Authorization' => 'Bearer ' .env('RAVE_SECRET_KEY'),
          'Accept'        => 'application/json',
        ],
        'json' => [
          'tx_ref' => $payment_payload['tx_ref'],
          'amount' => $payment_payload['amount'],
          'currency' => 'GBP',
          'payment_options' => $payment_payload['payment_options'],
          'customer' => [
            'email' => $payment_payload['email'],
            'phone_number' => $payment_payload['phone_number'],
            'name' => $payment_payload['name']
          ],
          'subaccounts' => [
            [
              'id' => $payment_payload['seller_subaccount_code'],
              'transaction_charge_type' => 'percentage',
              'transaction_charge' => ($payment_payload['seller_percentage'] * 100)
              // 'transaction_split_ratio' => $payment_payload['seller_percentage'],
            ],
            [
              'id' => $payment_payload['rider_subaccount_code'],
              'transaction_charge_type' => 'percentage',
              'transaction_charge' => ($payment_payload['rider_percentage'] * 100)
              // 'transaction_split_ratio' => $payment_payload['rider_percentage'],
            ]
          ],
          'redirect_url' => $payment_payload['callback_url']
        ]
      ]);

      if (intval($response->getStatusCode()) === 200) {
        $result = json_decode($response->getBody(), true);
        return $result['data'];
      }else{ 
        return  array(
          'status' => false,
          'message' => "unable to verify payment"
        );
      }       
    }catch (\Exception $e) {
      return  general_error_message($e->getMessage());
    }
  }
}