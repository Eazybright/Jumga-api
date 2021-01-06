<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Authenticate extends Middleware
{
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string|null
   */
  protected function redirectTo($request)
  {
    // if (! $request->expectsJson()) {
      // return $this->ErrorResponse('Unauthorised', 'Please login', 401); 
      // return response()->json(['error' => 'Please login'], 401);
    // }

    throw new HttpException(401);
  }
}
