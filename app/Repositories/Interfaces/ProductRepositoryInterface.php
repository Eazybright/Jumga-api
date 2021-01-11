<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
  public function save($params, $user_id);
}