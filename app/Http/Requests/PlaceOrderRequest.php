<?php

namespace App\Http\Requests;

class PlaceOrderRequest extends BaseFormRequest
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
      'grand_total' => 'required',
      'sub_total' => 'required',
      'delivery_fee' => 'required',
      'item_count' => 'required',
      'first_name' => 'required|string',
      'last_name' => 'required|string',
      'company_name' => 'nullable|string',
      'address' => 'required|string',
      'city' => 'required|string',
      'country' => 'required|string',
      'state' => 'required|string',
      'email' => 'required|email',
      'post_code' => 'required|string',
      'phone_number' => 'required|numeric',
      'notes' => 'nullable|string',
      'items.*.product_id' => 'required',
      'items.*.quantity' => 'required',
      'items.*.price' => 'required'
    ];
  }
}