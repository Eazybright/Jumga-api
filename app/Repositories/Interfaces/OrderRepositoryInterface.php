<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
  public function save($params);

  public function get_order($order_number);

  public function get_seller_email_address($order_id);
}