<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;

class TransactionController extends Controller
{
  protected $paymentService;

  public function __construct(PaymentService $paymentService)
  {
    $this->paymentService = $paymentService;
  }

  public function getAllTransactions(){
    return $this->paymentService->get_all_transactions();
  }
}
