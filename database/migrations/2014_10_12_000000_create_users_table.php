<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('email')->unique();
      $table->string('role');
      $table->string('phone_number');
      $table->string('password');
      $table->string('account_number')->nullable();
      $table->string('account_name')->nullable();
      $table->string('account_bank_code')->nullable();
      $table->string('country')->nullable();
      $table->string('flutterwave_subaccount_id')->nullable();
      $table->timestamp('email_verified_at')->nullable();
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}
