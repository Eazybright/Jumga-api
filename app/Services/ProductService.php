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
        return $this->error_message('Image content is not an array');
      }

      //check if store_id exists
      $checkStoreID = $this->storeRepository->checkIfIdExists($params['store_id']);
      if(!$checkStoreID){
        DB::rollBack();
        return $this->error_message('Store does not exist');
      }

      // save product
      $save_product = $this->productRepository->save($params, $user_id);
      if(!$save_product){
        DB::rollBack();
        return $this->error_message('Product not saved');
      }

      // save product image
      foreach ($params['image'] as $image) {
        $save_image = $this->productImagesRepository->save($image, $save_product->id);
        if(!$save_image){
          DB::rollBack();
          return $this->error_message('Product Image failed to upload');
        }
      }
      DB::commit();
      return $save_product;
    }catch(\Exception $e){
      DB::rollBack();
      throw $e;
    }
  }

  protected function error_message($message)
  {
    return  array(
      'status' => false,
      'message' => $message
    );
  }
}