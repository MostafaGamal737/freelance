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
  public function searchorder(Request $term)
  {
    $orders=order::where("code","like",'%'.$term->search.'%')
    ->orwhere('created_at',"like",'%'.$term->search.'%')
    ->paginate();
    return view('admin/orders/search',compact('orders'));
  }
}
