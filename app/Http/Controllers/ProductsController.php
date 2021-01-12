<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Traits\ApiResponseMessage;
use App\Services\ProductService;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Response;

/**
 * @group Products
 */
class ProductsController extends Controller
{
  use ApiResponseMessage;

  protected $productService;

  public function __construct(ProductService $productService)
  { 
    $this->productService = $productService;
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      //
  }

  /**
   * Create
   * Store a newly created product.
   * @authenticated
   * @bodyParam name string required The name of the product 
   * @bodyParam description string required The description of the product
   * @bodyParam price integer required The price of the product
   * @bodyParam number_of_stock integer required The number of available products
   * @bodyParam image file required The image(s) of the product, it accepts an array of images (image MIMETYPE, FILEPATH, etc)
   * @bodyParam store_id integer required The id of the store you want to create product for
   * @bodyParam delivery_fee integer required The delivery fee of the product
   * @response {
   *     "status": true,
   *     "message": "Product created successfully",
   *     "data": {
   *         "name": "Perfume",
   *         "description": "This is a nice perfume for your body",
   *         "price": "4000",
   *         "number_of_stock": "80",
   *         "store_id": "1",
   *         "user_id": 4,
   *         "delivery_fee": "800",
   *         "public_reference_id": "5ffc36bdd1b0f",
   *         "updated_at": "2021-01-11T11:30:05.000000Z",
   *         "created_at": "2021-01-11T11:30:05.000000Z",
   *         "id": 1
   *     }
   * }
   */
  public function store(ProductRequest $request)
  {
    try {
      $user_id = $request->user()->id;

      $data = $this->productService->create_product($request->all(), $user_id);

      if(isset($data['status']) && $data['status'] == false ){
        return $this->ErrorResponse("Unable to create product, please try again", 
                $data['message'], 400);
      }

      return $this->SuccessResponse($data, "Product created successfully", 201);
    }catch(\Exception $e) {
      return $this->ExceptionResponse($e);
    }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateProductRequest $request, $product_id)
  {
    try {
      $user_id = $request->user()->id;

      $data = $this->productService->update_product($request->all(), $user_id, $product_id);

      if(isset($data['status']) && $data['status'] == false ){
        return $this->ErrorResponse("Unable to update product, please try again", 
                $data['message'], 400);
      }

      return $this->SuccessResponse($data, "Product updated successfully", 201);
    }catch(\Exception $e) {
      return $this->ExceptionResponse($e);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}
