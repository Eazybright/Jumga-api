<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

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

  public function checkIfIdExists($product_id)
  {
    return Product::where('id', $product_id)->exists();
  }

  public function update($params, $user_id, $product_id)
  {
    $product = Product::find($product_id);
    if(isset($params['name'])){
      $product->name = $params['name'];
    }
    if(isset($params['description'])){
      $product->description = $params['description'];
    }
    if(isset($params['price'])){
      $product->price = $params['price'];
    }
    if(isset($params['number_of_stock'])){
      $product->number_of_stock = $params['number_of_stock'];
    }
    if(isset($params['delivery_fee'])){
      $product->delivery_fee = $params['delivery_fee'];
    }
    $product->user_id = $user_id;
    $product->save();
    return $product;
  }

  public function get_by_user_id($user_id)
  {
    return Product::with('images')->where('user_id', $user_id)->get();
  }

  public function get()
  {
    return Product::with('images')->latest()->get();
  }

  public function get_by_id($product_id)
  {
    return Product::with('images')->where('id', $product_id)->first();
  }

  public function get_seller_subaccount_code($product_id)
  {
    $sql_query = "SELECT users.flutterwave_subaccount_id 
                  FROM products
                  INNER JOIN users ON products.user_id = users.id
                  WHERE products.id = $product_id";
    $result = DB::select($sql_query);
    return $result[0];
  }

  public function get_dispatch_rider_subaccount_code($product_id)
  {
    $sql_query = "SELECT users.flutterwave_subaccount_id 
                  FROM products 
                  INNER JOIN stores ON products.store_id = stores.id
                  INNER JOIN users ON stores.dispatch_rider_id = users.id
                  WHERE products.id = $product_id";
    $result =  DB::select($sql_query);
    return $result[0];
  }
}