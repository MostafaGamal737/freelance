<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\order;
use App\invoice;
use App\payout;
use App\user;
use App\chat;
use Auth;
use Carbon\Carbon;
use App\notification;
use App\Notifications\OrderNotification;

class OrderController extends Controller
{
    public function Orders()
    {
      return view('users/Orders/Orders');
    }
    public function OrdersDetails($id)
    {
      $order=order::find($id);
      if (!empty($order)) {
        return view('users/Orders/OrderDetails',compact('order'));
      }
      return redirect('Home');
    }
    public function ShowMakeOrder()
    {
      return view('users/Orders/MakeOrder');
    }
    public function FailedOrders()
    {

      $orders=order::where('user_id',Auth::id())->where('status',-1)->orwhere('provider_id',Auth::id())->where('status',-1)->get();
      return view('users/Orders/FailedOrders',compact('orders'));

    }
    public function PandingOrders()
    {

      $orders=order::where('user_id',Auth::id())->where('status',0)->orwhere('provider_id',Auth::id())->where('status',0)->get();
      return view('users/Orders/PandingOrders',compact('orders'));

    }
    public function SuccessedOrders()
    {
      $orders=order::where('user_id',Auth::id())->where('status',2)->orwhere('provider_id',Auth::id())->where('status',2)->get();

      return view('users/Orders/SuccessedOrders',compact('orders'));

    }
    public function UnderWayOrders()
    {  $orders=order::where('user_id',Auth::id())->where('status',1)->orwhere('provider_id',Auth::id())->where('status',1)->get();
        return view('users/Orders/UnderWayOrders',compact('orders'));

    }
    public function payment()
    {
      return view('users/Orders/payment');
    }

    public function CancelOrder(Request $data,$id)
    {
      $notification=new notification();
      $order=order::find($id);
      $user=user::find($order->user_id);
       if ((Auth::user()->phone)==($order->invoice->provider_phone)) {
         $order->start_time=Carbon::now();
         $order->end_time=Carbon::now()->addDays($order->invoice->duration);
         $order->status=-1;
         $order->cancel=$data->cancel;
         $order->save();
         $notification->SendNotification($user,'لقدم تم رفض الطلب');
         $user->notify(new OrderNotification(user::find($order->provider_id),'تم رفض الطلب المقدم ل ',$order));
         return redirect()->back()->with('message','تم رفض الطلب المقدم ل ');
       }
       return redirect('Home');
    }

    public function AcceptOrder($id)
    {
      $notification=new notification();
      $order=order::find($id);
      $user=user::find($order->user_id);
       $order=order::find($id);

       if ((Auth::user()->phone)==($order->invoice->provider_phone)&&$order->status==0) {
         $order->start_time=Carbon::now();
         $order->end_time=Carbon::now()->addDays($order->invoice->duration);
         $order->status=1;
         $order->save();
         $notification->SendNotification($user,'لقد تم قبول الطلب');
         $user->notify(new OrderNotification(user::find($order->provider_id),'تم قبول العرض المقدم ل ',$order));
           $chat=new chat();
             if (($chat->findChat($order->user_id,$order->provider_id))=="false") {
               $chat->sender_id=$order->user_id;
               $chat->receiver_id=$order->provider_id;
               $chat->sender_name=$order->invoice->client_name;
               $chat->receiver_name=$order->invoice->provider_name;
               $chat->chat='chat'.($order->user_id+$order->provider_id+'500');
               $chat->save();
             return redirect()->back()->with('message','لقد تم قبول الطلب');
             }

         return redirect()->back()->with('message','لقد تم قبول الطلب');
       }
       return redirect('Home');
    }




    public function MakeOrder(Request $data){
      $payout=new payout();
      $data['status']=1;
      $provider=user::where('phone',$data->provider_phone)->first();
      if (empty($provider)) {
        return redirect()->back()->with('error','حدث خطء في تقديم الطلب تأكد من البيانات المدخله');
      }
      if ($data->status==1) {
        $invoice=new invoice();
        $invoice->client_name=Auth::user()->name;
        $invoice->client_phone=Auth::user()->phone;
        $invoice->provider_name=$data->provider_name;
        $invoice->provider_phone=$data->provider_phone;
        $invoice->price=$data->price;
        $invoice->duration=$data->duration;
        $invoice->tax=$data->tax;
        $invoice->transaction_id=$data->transaction_id;
        $invoice->status=$data->status;
        $invoice->app_money=$data->price*($data->tax/100);
        if ($invoice->save()) {
          $payout->user_id=Auth::id();
          $payout->transaction_id=$data->transaction_id;
          $payout->cost=$data->price;
          $payout->status=$data->status;

          if ($payout->save()) {
            $order=new order();
            $order->user_id=Auth::id();
            $order->provider_id=$provider->id;
            $order->invoice_id=$invoice->id;
            $order->payout_id=$payout->id;
            $order->job_name=$data->job_name;
            $order->description=$data->description;
            $order->customers_money_status=0;
            $order->status=0;
            $order->code = mt_rand(10000000,99999999);
            $notification=new notification();
            $order->save();
            $provider->notify(new OrderNotification(Auth::user(),'لديك عرض جديد من',$order));
            $notification->SendNotification($provider->firetoken,'لديك عرض جديد من');
            return redirect()->back()->with('message','لقت تم طلب الخدمه بنجاح انتظر رد مقدم الخدمه ');
          }
          else {
            return redirect()->back()->with('error','حدث خطء في تقديم الطلب تأكد من البيانات المدخله');
          }
        }
        else {
  return redirect()->back()->with('error','حدث خطء في تقديم الطلب تأكد من البيانات المدخله');        }
      }


      else {

        $payout->user_id=Auth::id();
        $payout->transaction_id=$data->transaction_id;
        $payout->cost=$data->price;
        $payout->status=$data->status;
        $payout->save();
        return redirect()->back()->with('error','قم بتحويل الاموال اولا');
      }
      return redirect()->back()->with('error','حدث خطء في تقديم الطلب تأكد من البيانات المدخله');
    }

    public function ShowExcute()
    {
      if (auth::user()->role=='مقدم خدمه') {

        return view('users/Orders/ExcuteOrder');
      }
      return redirect('Home');
    }
    public function ExcuteOrder(Request $data)
    {
      if (auth::user()->role=='مقدم خدمه') {
        if ($order=order::where('code',$data->code)->first()) {
          return view('users/Orders/OrderDetails',compact('order'));
        }
        return view('users/Orders/ExcuteOrder');
      }
   return redirect('Home');
    }

}
