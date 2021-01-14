<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('stores', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('image');
      $table->string('location');
      $table->text('description');
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('dispatch_rider_id');
      $table->timestamps();
    });

    Schema::table('stores', function(Blueprint $table){
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('dispatch_rider_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::dropIfExists('stores');
  }
}
