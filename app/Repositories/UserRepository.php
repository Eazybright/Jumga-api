<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
  public function get_details($user_id)
  {
    return User::with(['store', 'store.rider'])->where('id', $user_id)->first();
  }
}