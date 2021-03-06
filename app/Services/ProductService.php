<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\ProductImagesRepositoryInterface;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductService
{
  protected $productRepository;
  protected $productImagesRepository;
  protected $storeRepository;

  public function __construct(ProductRepositoryInterface $productRepository,
                              ProductImagesRepositoryInterface $productImagesRepository,
                              StoreRepositoryInterface $storeRepository)
  {
    $this->productRepository =  $productRepository;
    $this->productImagesRepository = $productImagesRepository;
    $this->storeRepository = $storeRepository;
  }

  public function create_product($params, $user_id)
  {
    DB::beginTransaction();
    try{
      //check if image request is an array
      if(isset($params['image']) && !is_array($params['image'])){
        DB::rollBack();
        return general_error_message('Image content is not an array');
      }

      //check if store_id exists
      $checkStoreID = $this->storeRepository->checkIfIdExists($params['store_id']);
      if(!$checkStoreID){
        DB::rollBack();
        return general_error_message('Store does not exist');
      }

      // save product
      $save_product = $this->productRepository->save($params, $user_id);
      if(!$save_product){
        DB::rollBack();
        return general_error_message('Product not saved');
      }

      // save product image
      foreach ($params['image'] as $image) {
        $save_image = $this->productImagesRepository->save($image, $save_product->id);
        if(!$save_image){
          DB::rollBack();
          return general_error_message('Product Image failed to upload');
        }
      }
      DB::commit();
      return $save_product;
    }catch(\Exception $e){
      DB::rollBack();
      throw $e;
    }
  }

  public function update_product($params, $user_id, $product_id)
  {
    DB::beginTransaction();
    try{
      //check if image request exist and it is an array
      if(isset($params['image']) && !is_array($params['image'])){
        DB::rollBack();
        return general_error_message('Image content is not an array');
      }

      //check if product_id exists
      $checkStoreID = $this->productRepository->checkIfIdExists($product_id);
      if(!$checkStoreID){
        DB::rollBack();
        return general_error_message('Store does not exist');
      }

      // update product
      $update_product = $this->productRepository->update($params, $user_id, $product_id);
      if(!$update_product){
        DB::rollBack();
        return general_error_message('Product not updated');
      }

      // save product image if it exist
      if(isset($params['image'])){
        foreach ($params['image'] as $image) {
          $save_image = $this->productImagesRepository->save($image, $update_product->id);
          if(!$save_image){
            DB::rollBack();
            return general_error_message('Product Image failed to upload');
          }
        }
      }
     
      DB::commit();
      return $update_product;
    }catch(\Exception $e){
      DB::rollBack();
      throw $e;
    }
  }

  public function get_product_by_user_id($user_id)
  {
    $products = $this->productRepository->get_by_user_id($user_id);

    if($products == null){
      return general_error_message('products not found');
    }

    return $products;
  }

  public function get_all_products()
  {
    $products = $this->productRepository->get();

    if($products == null){
      return general_error_message('No product found');
    }

    return $products; 
  }

  public function get_by_id($product_id)
  {
    $products = $this->productRepository->get_by_id($product_id);

    if($products == null){
      return general_error_message('Product not found');
    }

    return $products;
  }
}