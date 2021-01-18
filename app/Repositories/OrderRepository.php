<?php

namespace App\Repositories;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
use App\Models\OrderItem;
use App\Constants\OrderStatus;
use App\Constants\PaymentStatus;
use Illuminate\Support\Facades\DB;

class OrderRepository implements OrderRepositoryInterface
{
  public function save($params)
  {
    $new_order = new Order;
    $new_order->order_number = 'JUMGA-'.strtoupper(generateReferenceId()); 
    $new_order->status = OrderStatus::PENDING;
    $new_order->grand_total = $params['grand_total'];
    $new_order->item_count = $params['item_count'];
    $new_order->payment_status = PaymentStatus::PENDING;
    $new_order->first_name = $params['first_name'];
    $new_order->last_name = $params['last_name'];
    $new_order->address = $params['address'];
    $new_order->city = $params['city'];
    $new_order->country = $params['country'];
    $new_order->state = $params['state'];
    $new_order->email = $params['email'];
    $new_order->post_code = $params['post_code'];
    $new_order->phone_number = $params['phone_number'];

    if(isset($params['company_name'])){
      $new_order->company_name = $params['company_name'];
    }

    if(isset($params['notes'])){
      $new_order->notes = $params['notes'];
    }

    $save_new_order = $new_order->save();
    if($save_new_order){
      // save item into OrderItem DB
      foreach($params['items'] as $item){
        $new_order_item = new OrderItem;
        $new_order_item->order_id = $new_order->id;
        $new_order_item->product_id = $item['product_id'];
        $new_order_item->quantity = $item['quantity'];
        $new_order_item->price = $item['price'];
        $new_order_item->save();

        // attach each item to the order
        $new_order->items()->save($new_order_item);        
      }
    }
    return $new_order;   
  }

  public function get_order($order_number)
  {
    return Order::where('order_number', $order_number)->first();
  }

  public function get_seller_email_address($order_id)
  {
    $sql_query = "SELECT users.email 
                  FROM orders
                  INNER JOIN products ON orders.id = products.id
                  INNER JOIN users ON products.user_id = users.id
                  WHERE orders.id = $order_id";
    $result = DB::select($sql_query);
    return $result[0];
  }
}