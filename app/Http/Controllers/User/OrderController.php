<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\order;
use App\invoice;
use App\payout;
use App\User;
use App\chat;
use App\sitting;

use Auth;
use Carbon\Carbon;
use App\notification;
use Session;
use App\Http\Requests\OrderRequest;

use App\Notifications\OrderNotification;

class OrderController extends Controller
{
  public function __construct()
   {
   // Session::put('website', 'Order');
     }

    public function Orders()
    { Session::put('website', 'Order');
      return view('users/Orders/Orders');
    }
    public function OrdersDetails($id)
    {Session::put('website', 'Order');
      $order=order::where('id',$id)->first();
      if (!empty($order)) {
      if($order->provider_id==Auth::id()||$order->client_id==Auth::id()){
        return view('users/Orders/OrderDetails',compact('order'));
      }
      return redirect('Home'); 
      }

      return redirect('Home');
    }
    public function ShowMakeOrder()
    {Session::put('website', 'Order');
      return view('users/Orders/MakeOrder');
    }
    public function FailedOrders()
    {Session::put('website', 'Order');

      $orders=order::where('user_id',Auth::id())->where('status',-1)->orwhere('provider_id',Auth::id())->where('status',-1)->get();
      return view('users/Orders/FailedOrders',compact('orders'));

    }
    public function PandingOrders()
    {
      Session::put('website', 'Order');
      $orders=order::where('user_id',Auth::id())->where('status',0)->orwhere('provider_id',Auth::id())->where('status',0)->get();
      return view('users/Orders/PandingOrders',compact('orders'));

    }
    public function SuccessedOrders()
    {Session::put('website', 'Order');
      $orders=order::where('user_id',Auth::id())->where('status',2)->orwhere('provider_id',Auth::id())->where('status',2)->get();

      return view('users/Orders/SuccessedOrders',compact('orders'));

    }
    public function UnderWayOrders()
    {  
      Session::put('website', 'Order');
      $orders=order::where('user_id',Auth::id())->where('status',1)->orwhere('provider_id',Auth::id())->where('status',1)->get();
        return view('users/Orders/UnderWayOrders',compact('orders'));

    }
    public function payment($id)
    {
      $order=order::find($id);
      return view('users/Orders/payment',compact('order'));
    }

    public function CancelOrder(Request $data,$id)
    {Session::put('website', 'Order');
      $notification=new notification();
      $order=order::find($id);
      $user=User::find($order->user_id);
       if ((Auth::user()->phone)==($order->invoice->provider_phone)) {
         $order->start_time=Carbon::now();
         $order->end_time=Carbon::now()->addDays($order->invoice->duration);
         $order->status=-1;
         $order->cancel=$data->cancel;
         $order->save();
         $notification->SendNotification($user,'لقدم تم رفض الطلب');
         $user->notify(new OrderNotification(User::find($order->provider_id),'تم رفض الطلب المقدم ل ',$order));
         return redirect()->back()->with('message','تم رفض الطلب المقدم ل ');
       }
       return redirect('Home');
    }

    public function AcceptOrder($id)
    {
      Session::put('website', 'Order');
      $notification=new notification();
      $order=order::find($id);
      $user=User::find($order->user_id);
       
       if ((Auth::user()->phone)==($order->invoice->provider_phone)&&$order->status==0) {
         $order->start_time=Carbon::now();
         $order->end_time=Carbon::now()->addDays($order->invoice->duration);
         $order->status=1;
         $order->save();
         $notification->SendNotification($user,'لقد تم قبول الطلب');
         $user->notify(new OrderNotification(User::find($order->provider_id),'تم قبول العرض المقدم ل ',$order));
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




    public function MakeOrder(OrderRequest $data){
      Session::put('website', 'Order');
      $sitting=sitting::first('tax');
      
      $payout=new payout();
      $data['status']=1;
      $provider=User::where('phone',$data->provider_phone)->where('role','منفذ خدمات')->first();
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
        $invoice->tax=$sitting->tax;
        $invoice->transaction_id=$data->transaction_id;
        $invoice->status=$data->status;
        $invoice->app_money=$data->price*($data->tax/100);
        $invoice->total_price=$invoice->app_money+$invoice->price;
        if ($invoice->save()) {
          $payout->user_id=Auth::id();
          $payout->transaction_id=$data->transaction_id;
          $payout->cost=$data->price+$invoice->app_money;
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
            $order->approved_status='قيد الانتظار';
            $order->status=0;
            $order->code = mt_rand(10000000,99999999);
            $notification=new notification();
            $order->save();
            $provider->notify(new OrderNotification(Auth::user(),'لديك عرض جديد من',$order));
            $notification->SendNotification($provider->firetoken,'لديك عرض جديد من');
            return redirect('Home/payment/'.$order->id)->with('message','لقت تم طلب الخدمه بنجاح انتظر رد مقدم الخدمه ');
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
      if (auth::user()->role=='منفذ خدمات') {

        return view('users/Orders/ExcuteOrder');
      }
      return redirect('Home');
    }
    public function ExcuteOrder(Request $data)
    {
      Session::put('website', 'Order');
      $data->validate([
        'provider_phone'=>"numeric",
        'client_phone'=>"numeric",
        'account_number'=>'numeric',
        'IBAN'=>'numeric',
        'code'=>'numeric'

      ]);
      if (auth::user()->role=='منفذ خدمات'&&auth::user()->phone==$data->provider_phone) {
        if(User::where('phone',$data->client_phone)->first()){
          if ($order=order::where('code',$data->code)->first()) {
            return view('users/Orders/OrderDetails',compact('order'));
          }
          return redirect()->back()->with('error','هناك خطأ في البيانات المدخله');
     
        }
        
      return redirect()->back()->with('error','هناك خطأ في البيانات المدخله');
      }
      return redirect()->back()->with('error','هناك خطأ في البيانات المدخله');
    }

}
