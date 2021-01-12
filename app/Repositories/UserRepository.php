<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
  public function get_details($user_id)
  {
    return User::with(['store', 'store.rider', 'product', 'product.images'])->where('id', $user_id)->first();
  }
}