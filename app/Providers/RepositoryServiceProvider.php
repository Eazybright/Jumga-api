<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
  public function register()
  {
    //bind your interface here
    $this->app->bind(
      UserRepositoryInterface::class,
      UserRepository::class
    );
  }
}