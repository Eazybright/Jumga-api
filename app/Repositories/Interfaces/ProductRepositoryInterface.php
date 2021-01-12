<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
  public function save($params, $user_id);

  public function update($params, $user_id, $product_id);

  public function checkIfIdExists($product_id);
}