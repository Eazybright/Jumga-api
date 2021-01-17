<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\OrderRepository;
use App\Repositories\Interfaces\ProductImagesRepositoryInterface;
use App\Repositories\ProductImagesRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use App\Repositories\StoreRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
  public function register()
  {
    //bind your interface here
    $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    $this->app->bind(StoreRepositoryInterface::class, StoreRepository::class);
    $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    $this->app->bind(ProductImagesRepositoryInterface::class, ProductImagesRepository::class);
    $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
  }
}