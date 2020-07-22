<?php

namespace App\Http\Controllers;
use App\order;
use Illuminate\Http\Request;

class orderController extends Controller
{
  public function AddOrder(Request $data)
  {

  $order=new order();
  $order->client_id='5';
  $order->provider_id='2';
  $order->status=0;
  $order->discription=$data->name;
  $order->save();
  return redirect()->back();
}
}
