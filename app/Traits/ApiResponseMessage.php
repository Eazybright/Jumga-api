<?php

namespace App\Traits;

use App\Http\Response;

trait ApiResponseMessage
{
  public function ErrorResponse($error, $message, $status_code)
  {
    $response = new Response;

    $data = [
      'status' => false,
      'error' => $error,
      'message' => $message
    ];

    return $response->withSingleItem(collect($data), $status_code);
  }

  public function ExceptionResponse(\Exception $exception, $message="An error occurred")
  {
    $response = new Response;

    $error_data = [
      "status" => false,
      "message" => $message,
      "error" => $exception->getMessage()
    ];
      
    return $response->withSingleItem(collect($error_data), 500);
  }

  public function SuccessResponse($data=[], $message='Successful')
  {
    $response = new Response;
    
    $success_data = [
      'status' => true,
      'message' => $message,
      'data' => $data
    ];

    return $response->withSingleItem(collect($success_data), 200);
  }
}