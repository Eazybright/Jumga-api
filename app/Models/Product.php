<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;

  protected $table = 'products';

  public function images()
  {
    return $this->hasMany('App\Models\ProductImages');
  }

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }
}
