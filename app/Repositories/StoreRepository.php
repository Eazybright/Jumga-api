<?php

namespace App\Repositories;

use App\Repositories\Interfaces\StoreRepositoryInterface;
use App\Models\Store;

class StoreRepository implements StoreRepositoryInterface
{
  public function save($params, $user_id)
  { 
    $new_store = new Store;
    $new_store->name = $params['name_of_store'];
    $new_store->location = $params['location'];
    $new_store->description = $params['description'];
    $new_store->image = $params['image_url'];
    $new_store->user_id = $user_id;
    return $new_store->save();
  }
}