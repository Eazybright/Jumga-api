<?php

namespace App\Http\Requests;

class ProductRequest extends BaseFormRequest
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
      'description' => 'string|required',
      'price' => 'numeric|required',
      'number_of_stock' => 'string|required',
      'image*' => 'required|image|mimes:jpeg,jpg,bmp,png,gif',
      'store_id' => 'numeric|required',
      'delivery_fee' => 'numeric|required'
    ];
  }
}