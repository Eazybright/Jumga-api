<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Constants\Role;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      [
        'name' => 'Dispatch Rider 1',
        'email' => 'doneazy1@gmail.com',
        'email_verified_at' => now(),
        'password' => Hash::make('pass!1word@'), // password
        'remember_token' => Str::random(10),
        'role' => Role::DISPATCH_RIDER,
        'phone_number' => '08135306038',
        'account_number' => '0228415513',
        'account_name' => 'Kolawole Ezekiel Damilare',
        'account_bank_code' => '058',
        'country' => 'Nigeria',
        'flutterwave_subaccount_id' => 'RS_BBA8FFC88A34288F014FB7BAE3BC383C',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'name' => 'Dispatch Rider 2',
        'email' => 'doneazy2@gmail.com',
        'email_verified_at' => now(),
        'password' => Hash::make('pass!1word@'), // password
        'remember_token' => Str::random(10),
        'role' => Role::DISPATCH_RIDER,
        'phone_number' => '08135306035',
        'account_number' => '0228415513',
        'account_name' => 'Kolawole Ezekiel Damilare',
        'account_bank_code' => '058',
        'country' => 'Nigeria',
        'flutterwave_subaccount_id' => 'RS_88EC378EA6D88A38D7F67B0B913E9052',
        'created_at' => now(),
        'updated_at' => now()
      ],
      [
        'name' => 'Dispatch Rider 3',
        'email' => 'doneazy3@gmail.com',
        'email_verified_at' => now(),
        'password' => Hash::make('pass!1word@'), // password
        'remember_token' => Str::random(10),
        'role' => Role::DISPATCH_RIDER,
        'phone_number' => '08135306033',
        'account_number' => '0228415513',
        'account_name' => 'Kolawole Ezekiel Damilare',
        'account_bank_code' => '058',
        'country' => 'Nigeria',
        'flutterwave_subaccount_id' => 'RS_FEB5F23BEE9810D482222668C757F1A8',
        'created_at' => now(),
        'updated_at' => now()
      ]
    ]);
  }
}
