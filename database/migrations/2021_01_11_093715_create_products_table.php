<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->longText('description');
      $table->string('price');
      $table->string('number_of_stock');
      $table->string('public_reference_id');
      $table->string('delivery_fee');
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('store_id');
      $table->timestamps();
    });

    Schema::table('products', function(Blueprint $table){
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('products');
  }
}
