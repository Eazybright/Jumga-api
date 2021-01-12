<?php

namespace App\Repositories\Interfaces;

interface StoreRepositoryInterface
{
  public function save($params, $user_id);

  public function checkIfIdExists($store_id);

  public function get();

  public function get_by_id($store_id);
}