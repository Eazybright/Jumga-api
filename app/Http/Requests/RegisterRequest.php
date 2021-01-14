<?php

namespace App\Http\Requests;

class RegisterRequest extends BaseFormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'name' => 'string|required',
      'email' => 'email|required|unique:users,email',
      'password' => 'string|required',
      'phone_number' => 'numeric|required|min:5|unique:users,phone_number',
      'role' => 'string|required',
      'account_number' => 'string|required',
      'account_name' => 'string|required',
      'account_bank_code' => 'string|required',
      'country' => 'string|required',
      'image' => 'file|required|mimes:jpeg,jpg,png,bmp,gif,svg',
      'transaction_id' => 'required|numeric',
      'location' => 'string|required',
      'description' => 'string|required',
      'name_of_store' => 'string|required'
    ];
  }
}
