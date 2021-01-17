<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  use HasFactory;

  protected $table = 'orders';

  protected $fillable = [
    'order_number',
    'status',
    'grand_total',
    'item_count',
    'payment_status',
    'payment_reference',
    'first_name',
    'last_name',
    'company_name',
    'address',
    'city',
    'country',
    'state',
    'email',
    'post_code',
    'phone_number',
    'notes'
  ];

  protected $casts = [
    'payment_status' => 'boolean'
  ];


  public function items()
  {
    return $this->hasMany('App\Models\OrderItem');
  }
}
