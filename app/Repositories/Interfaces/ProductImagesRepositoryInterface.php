<?php

namespace App\Repositories\Interfaces;

interface ProductImagesRepositoryInterface
{
  public function save($image, $product_id);
}