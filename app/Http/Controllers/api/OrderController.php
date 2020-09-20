<?php

namespace App\Http\Controllers\api;

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
use App\Notifications\OrderNotification;

class OrderController extends Controller
{
  public function Orders()
  {
    $success=order::where('provider_id',Auth::id())->where('status',2)->get();
    $padding=order::where('provider_id',Auth::id())->where('status',0)->get();
    $failed=order::where('provider_id',Auth::id())->where('status',-1)->get();
    $processing=order::where('provider_id',Auth::id())->where('status',1)->get();
    return response(['data'=>['success'=>$success,'failed'=>$failed,'padding'=>$padding,'processing'=>$processing]]);
  }
  //-----------MakeOrder
  public function MakeOrder(Request $data){
    $sitting=sitting::first();
    $provider=user::where('phone',$data->provider_phone)->first();
    if (!empty($provider)) {


    $payout=new payout();
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
            $order->approved_status='قيد الانتظار';
            $order->status=0;
            $order->code = mt_rand(10000000,99999999);
            $notification=new notification();
            $order->save();
            
          $provider->notify(new OrderNotification(Auth::user(),'لديك عرض جديد',$order));
          //$notification->SendNotification($provider->firetoken,'لديك عرض جديد');
          return response(['response'=>'تم تقديم الطلب بنجاح','code'=>$order->code,'iban'=>$sitting->iban,'card_number'=>$sitting->card_number]);
        }
        else {
          return(['response'=>'حدث خطء في تقديم الطلب تأكد من البيانات المدخله']);
        }
      }
      else {
        return(['response'=>'حدث خطء في تقديم الطلب تأكد من البيانات المدخله']);
      }
    }


    else {

      $payout->user_id=Auth::id();
      $payout->transaction_id=$data->transaction_id;
      $payout->cost=$data->price;
      $payout->status=$data->status;
      $payout->save();
      return response(['error'=>'قم بتحويل الاموال اولا']);
    }
    }
    else {
      return response(['error'=>'بيانات مقدم الخدمه ليست صحيحه']);
    }
  }
  //-----------End-MakeOrder------------

  //-----------Start-GetOrder---
  public function GetOrder(Request $data)
  {
    if (Auth::user()->role='منفذ خدمات') {
      $order=order::where('code',$data->code)->where('provider_id', Auth::id())->with('invoice')->first();
      if ($order) {

        return response(['order'=>$order]);
      }
      return response(['response'=>' هذا العرض ليس لك']);
    }
    return response(['response'=>'انتا لت منفذ خدمات']);
  }
  //------------End-GetOrder-------

  //-----------Start-AcceptOrder---
  public function AcceptOrder(Request $data)
  {
     $notification=new notification();
    $order=order::find($data->order_id);
    $user=user::find($order->user_id);
    if ($order) {
      if ($order->status!=0) {
        return response(['response'=>'تم قبول هذ العرض بالفعل وهو قيد التنفيذ الان']);
      }
      else{
        $order->start_time=Carbon::now();
        $order->end_time=Carbon::now()->addDays($order->invoice->duration);
        $order->status=1;
        $order->save();
        $chat=new chat();
    
        if ($chat->findChat($order->user_id,$order->provider_id)=='true') {
          //$notification->SendNotification($user->firetoken,'لقدم تم قبول الطلب');
         $user->notify(new OrderNotification(user::find($order->provider_id),'لقد قام بقبول العرض',$order));
          return response(['success'=>'تم قبول العرض بنجاح ','order'=>$order]);
        }
        else {

          $chat->sender_id=$order->user_id;
          $chat->receiver_id=$order->provider_id;
          $chat->sender_name=$order->invoice->client_name;
          $chat->receiver_name=$order->invoice->provider_name;
          $chat->chat='chat'.($order->user_id+$order->provider_id+'500');
          $chat->save();
          $user->notify(new OrderNotification(user::find($order->provider_id),'لقد قام بقبل العرض',$order));
          //$notification->SendNotification($user,'لقدم تم قبول الطلب');
          return response(['success'=>'تم قبول العرض بنجاح ','order'=>$order]);

        }

      }
    }
    return response(['response'=>'لا يوجد بيانات متوفره']);
  }
  //------------End-AcceptOrder-------

  //-----------Start-AcceptOrder---
  public function CanceledOrder(Request $data)
  {
    $notification=new notification();
    $order=order::find($data->order_id);
    $user=user::find($order->user_id);
   //return $order::with('invoice');
    if ($order) {

      if ($order->status!=0) {

        return response(['success'=>'تم رفض الطلب']);
      }
      else {
        $order->start_time=Carbon::now();
        $order->end_time=Carbon::now()->addDays($order->invoice->duration);
        $order->status=-1;
        $order->cancel=$data->cancel;
        $order->save();
        $notification->SendNotification($user,'لقدم تم رفض الطلب');
        $user->notify(new OrderNotification(user::find($order->provider_id),'لقد قام برفض العرض',$order));
        return response(['success'=>'تم رفض الطلب بنجاح','order'=>$order]);
      }
    }
    return response(['error'=>'هذا الطلب غير موجود']);
  }
  //------------End-AcceptOrder-------

  public function GetOrderUsingStatus(Request $status){
    $SuccessedOreders;
    if (Auth::user()->role=='منفذ خدمات') {
      $SuccessedOreders=order::where('provider_id',Auth::id())->where('status', $status->status)->with('invoice')->get();
    }
    else {
      $SuccessedOreders=order::where('user_id',Auth::id())->where('status', $status->status)->with('invoice')->get();
    }
    if (count($SuccessedOreders)>0) {
      return response(['response'=>'success','data'=>$SuccessedOreders]);
    }
    else {
      return response(['response'=>'ليس لديك شئ']);
    }

  }
  public function Rating(Request $data)
  {
    $order=order::where('user_id',Auth::id())
    ->orwhere('provider_id',$data->id)->get();
    if (count($order)>0) {
      $user=user::find($data->id);
      return ('$user->rating=$data->rating');
    }
    return $data;
  }

}
