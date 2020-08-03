<?php

namespace App\Http\Controllers;
use App\order;
use Illuminate\Http\Request;

class orderController extends Controller
{
  public function ordersdetails($id)
  {
    $order=order::find($id);
    return view('admin/orders/ordersdetails',compact('order'));
  }
}
