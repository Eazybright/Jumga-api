<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
  public function save($params, $user_id);

  public function update($params, $user_id, $product_id);

  public function checkIfIdExists($product_id);

  public function get_by_user_id($user_id);

  public function get();

  public function get_by_id($product_id);

  public function get_seller_subaccount_code($product_id);

  public function get_dispatch_rider_subaccount_code($product_id);
}