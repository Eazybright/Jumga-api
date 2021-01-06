<?php

namespace App\Services;

use App\Constants\Role;
use Illuminate\Support\Facades\DB;
use App\Services\PaymentService;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WelcomeMail;
use App\Models\User;
use App\Repositories\Interfaces\StoreRepositoryInterface;

class AuthService
{
  protected $paymentService;
  protected $storeRepo;

  public function __construct(PaymentService $paymentService,
                  StoreRepositoryInterface $storeRepo)
  {
    $this->paymentService = $paymentService;
    $this->storeRepo = $storeRepo;
  }

  public function register_user($params)
  {
    DB::beginTransaction();
    try{
      $new_user = new user;
      $new_user->name = $params['name'];
      $new_user->email = $params['email'];
      $new_user->password = app('hash')->make($params['password']);
      $new_user->phone_number = $params['phone_number'];
      $new_user->role = $params['role'];
      $new_user->account_number = $params['account_number'];
      $new_user->account_bank_name = $params['account_bank_name'];
      $new_user->account_bank_code = $params['account_bank_code'];
      $new_user->country = $params['country'];
      $new_user->save();
      // $new_user->
      // $new_user->
      // $new_user->
     
       
      if($params['role'] == Role::SELLER){
        if(!isset($params['image']) || !isset($params['transaction_id']) 
          || !isset($params['location']) || !isset($params['description']) 
          || !isset($params['name_of_store'])
        ){
          return  array(
            'status' => false,
            'message' => "image or transaction_id or location or name_of_store or description params is required"
          );
        }

        // verify seller payment evidence
        $verify_payment = $this->paymentService->verify_payment($params['transaction_id']);
        if(isset($verify_payment['status']) && $verify_payment['status'] == false ){
          DB::rollback();
          return $verify_payment;
        }
        
        // upload image of the store to cloudinary
        $image_name = $params['image']->getRealPath();  
        
        Cloudder::upload($image_name, null, [
            'folder' => 'JUMGA_FOR_FLUTTERWAVE - Shop Images', 
            'overwrite' => TRUE, 
            'resource_type' => 'image',
            "quality" => "auto", 
            "fetch_format" => "auto"
        ]);
        $cloundary_upload = Cloudder::getResult();
        
        $params['image_url'] = $cloundary_upload['secure_url']; 
        // save the shop details  
        $this->storeRepo->save($params, $new_user->id);
      }
      
      //create a payment subaccount for seller and rider
      $subaccount = $this->paymentService->create_subaccount($params);
      if(isset($subaccount['status']) && $subaccount['status'] == false ){
        DB::rollback();
        return $subaccount;
      }
      $new_user->flutterwave_subaccount_id = $subaccount;
      // this might be need later
      // $params['verify_payment'] = $verify_payment;

      //create account into the database
      $new_user->save();
      Notification::send($new_user, new WelcomeMail($params['name']));

      DB::commit();
      return "Registration successfull";
    }catch(\Exception $e){
      DB::rollback();
      throw $e;
    }
  }
}