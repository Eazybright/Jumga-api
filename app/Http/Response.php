<?php

namespace App\Http;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\MessageBag;
use League\Fractal\Manager;

class Response
{
  const ERR_BAD_PARAMS = "BAD PARAMS";
  const ERR_NOT_FOUND = "NOT FOUND";
  const ERR_INVALID_USER = "INVALID USER";
  const ERR_NOT_SUCCESSFUL = "REQUEST NOT SUCCESSFUL";
  const SERVER_ERROR = "SERVER ERROR";
  const NOT_AUTHORIZED = "NOT AUTHORIZED";
  const NOT_AUTHENTICATED = "NOT AUTHENTICATED";

  private $fractalManager;

  public function __construct()
  {
    $this->fractalManager = new Manager();
  }

  /**
   * @param array $array data to be returned
   * @param int $statusCode
   * @param array $headers
   * @param int $options @link http://php.net/manual/en/function.json-encode.php
   * @return JsonResponse
   */
  public function withArray(array $array, int $statusCode = 200, array $headers = [], $options = 0) 
  {
    return response()->json($array, $statusCode, $headers, $options);
  }

  public function withError($message, $errorCode, $statusCode, array $headers = []) 
  {
    return $this->withArray([
      'error' => [ 
        'type' => $errorCode,
        'status_code' => $statusCode,
        'message' => $message
      ]
    ], $statusCode, $headers);
  }
 
  public function withServerError($code = self::SERVER_ERROR,
                                  $message = "An error occurred while carrying out the request") 
  {
    return $this->withError($message, $code, 500);
  }

  public function withAuthorizationError(
      $message = "The logged in user is not authorized to carry out the request",
      $type = self::NOT_AUTHORIZED, 
      $statusCode = 401)
 {
    return $this->withError($message, $type, $statusCode);
  }

  // similar to withError(), but for cases where you need to return multiple error messages 
  // e.g when a validation fails
  public function withErrors(MessageBag $messageBag, $errorCode, $statusCode, array $headers= []) 
  {
    return $this->withArray([
      'error' => [
        'type' => $errorCode,
        'status_code' => $statusCode,
        'messages' => $messageBag->first()
      ]
    ], $statusCode, $headers);
  }

  public function withCollection($collection, array $meta = [], array $headers = [])
  {
    $root = $this->fractalManager->createData($collection);
    return $this->withArray([
            'data' => $root->toArray()
          ], 200, $headers); 
  }

  /**
   * Similar to this->withArray but for cases where you want to return a single json object as response
   * You can convert an array data to a collection by calling collect() on your array
   * @param Collection $item: The laravel collection to be sent
   * @param int $statusCode
   * @param array $headers
   * @param int $options
   * @return JsonResponse
   */
  public function withSingleItem(Collection $item, $statusCode = 200, $headers = [], $options = 0)
  {
    return response()->json($item, $statusCode, $headers, $options);
  }
}
