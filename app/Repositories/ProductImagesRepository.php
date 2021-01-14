<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductImagesRepositoryInterface;
use JD\Cloudder\Facades\Cloudder;
use App\Models\ProductImages;

class ProductImagesRepository implements ProductImagesRepositoryInterface
{
  public function save($image, $product_id)
  {
    $photo = new ProductImages;

		$image_name = $image->getRealPath();  
		
		//upload image file to cloudinary 
		try{
      Cloudder::upload($image_name, null, [
          'folder' => 'JUMGA_FOR_FLUTTERWAVE - Product Images', 
          'overwrite' => TRUE, 
          'resource_type' => 'image',
          "quality" => "auto", 
          "fetch_format" => "auto"
      ]);
      $cloundary_upload = Cloudder::getResult();

      $photo->image = $cloundary_upload['secure_url'];
      $photo->product_id = $product_id;
      return $photo->save(); 
		}catch(\Exception $e){
      return $e->getMessage();
		}	

  }
}