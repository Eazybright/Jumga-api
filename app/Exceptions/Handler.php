<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use App\Traits\ApiResponseMessage;

class Handler extends ExceptionHandler
{
  use ApiResponseMessage;

  /**
   * A list of the exception types that are not reported.
   *
   * @var array
   */
  protected $dontReport = [
      //
  ];

  /**
   * A list of the inputs that are never flashed for validation exceptions.
   *
   * @var array
   */
  protected $dontFlash = [
      'password',
      'password_confirmation',
  ];

  /**
   * Register the exception handling callbacks for the application.
   *
   * @return void
   */
  public function register()
  {
    $this->reportable(function (Throwable $e) {
        //
    });

    $this->renderable(function (UnprocessableEntityHttpException $e) {
      $message = $e->getMessage();
      $messageArray = json_decode($message, true);

      // set the pointer to point to the first element
      reset($messageArray);
      $first = current($messageArray);

      // Get first validation error message
      $error = $first[0];
      return $this->ErrorResponse($message, $error, 422);
    });

  }
}
