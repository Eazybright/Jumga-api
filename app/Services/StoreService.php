<?php

namespace App\Services;

use App\Repositories\Interfaces\StoreRepositoryInterface;

class StoreService
{
  protected $storeRepository;

  public function __construct(StoreRepositoryInterface $storeRepository)
  {
    $this->storeRepository = $storeRepository;
  }

  public function get_all_stores()
  {
    $stores = $this->storeRepository->get();

    if($stores == null){
      return general_error_message('No store found');
    }

    return $stores;
  }

  public function get_by_id($store_id)
  {
    $stores = $this->storeRepository->get_by_id($store_id);

    if($stores == null){
      return general_error_message('Store not found');
    }

    return $stores;
  }
}