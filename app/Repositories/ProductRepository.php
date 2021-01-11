<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
  public function save($params, $user_id)
  {
    $product = new Product;
    $product->name = $params['name'];
    $product->description = $params['description'];
    $product->price = $params['price'];
    $product->number_of_stock = $params['number_of_stock'];
    $product->store_id = $params['store_id'];
    $product->user_id = $user_id;
    $product->delivery_fee = $params['delivery_fee'];
    $product->public_reference_id = generateReferenceId();
    $product->save();
    return $product;
  }
}