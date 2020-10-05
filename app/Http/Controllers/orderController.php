<?php

namespace App\Http\Controllers;
use App\order;
use App\user;

use Auth;
use Illuminate\Http\Request;
use App\notification;
use App\Notifications\OrderNotification;
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
  public function Approved($id){
    if(Auth::user()->role=='مدير عام'){
      $order=order::find($id);
      $order->approved_status='مفعله';
      $order->save();
      $provider=user::find($order->user_id);
      Auth::user()->notify(new OrderNotification($provider,'تم تفعيل العرض ارسل الكود الي مقدم الخدمه ',$order));
     return redirect()->back()->with('message','تم تفعيل الخدمه');
    }
    else{
      return "error";
    }
    
  }
  public function returnMoney($id){
    $order=order::find($id);
    $order->customers_money_status=1;
    $order->save();
    return redirect()->back()->with('message','تم رد الاموال');
  }
}
