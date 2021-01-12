<?php

namespace App\Http\Requests;

class UpdateProductRequest extends BaseFormRequest
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
      'name' => 'string|nullable',
      'description' => 'string|nullable',
      'price' => 'numeric|nullable',
      'number_of_stock' => 'string|nullable',
      'image*' => 'nullable|image|mimes:jpeg,jpg,bmp,png,gif',
      'delivery_fee' => 'numeric|nullable'
    ];
  }
}