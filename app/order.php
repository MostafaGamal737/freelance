<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
  protected $fillable = [
      'status','jop_name'
  ];
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  public function invoice()
  {
    return $this->belongsTo('App\invoice');
  }
  public function chat(){
    return $this->belongsTo('App\chat');
  }
  public function review(){
    return  $this->belongsTo('App\review');
  }

  public function usermoney()
  {
    $money=0;
    $orders=(order::where('customers_money_status',0)->get());
    foreach ($orders as $order) {
      $money+=(($order->invoice->price));
    }
    return $money;
  }
}
