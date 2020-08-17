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
    return $this->belongsTo('App\user');
  }
  public function invoice()
  {
    return $this->belongsTo('App\invoice');
  }
  public function usermoney()
  {
    $money=0;
    $orders=(order::where('customers_money_status',0)->get());
    foreach ($orders as $order) {
      $money+=(($order->invoice->price)-($order->invoice->app_money));
    }
    return $money;
  }
}
