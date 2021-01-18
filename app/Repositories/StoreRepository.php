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
    $new_store->dispatch_rider_id = mt_rand(1,3); //assign dispatch rider id between 1 and 3
    $new_store->public_reference_id = generateReferenceId();
    return $new_store->save();
  }

  public function checkIfIdExists($store_id)
  {
    return Store::where('id', $store_id)->exists();
  }

  public function get()
  {
    return Store::latest()->get();
  }

  public function get_by_id($store_id)
  {
    return Store::with(['products', 'products.images'])->where('id', $store_id)->first(); 
  }
}