<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class BaseFormRequest extends FormRequest
{
  protected function failedValidation(Validator $validator)
  {
    throw new UnprocessableEntityHttpException($validator->errors()->toJson());
  }

  protected function failedAuthorization()
  {
    throw new HttpException(403);
  }
}