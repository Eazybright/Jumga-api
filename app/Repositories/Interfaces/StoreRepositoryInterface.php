<?php

namespace App\Repositories\Interfaces;

interface StoreRepositoryInterface
{
  public function save($params, $user_id);
}