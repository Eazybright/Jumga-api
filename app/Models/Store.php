<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  use HasFactory;

  protected $table = 'stores';

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id');
  }

  public function rider()
  {
    return $this->belongsTo('App\Models\User', 'dispatch_rider_id');
  }

  public function products()
  {
    return $this->hasMany('App\Models\Product');
  }
}
