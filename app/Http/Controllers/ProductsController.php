<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Traits\ApiResponseMessage;
use App\Services\ProductService;

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
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
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
  public function update(Request $request, $id)
  {
      //
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
