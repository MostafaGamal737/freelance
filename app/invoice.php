<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
  protected $fillable = [
      'client_name','client_phone','provider_name','provider_phone','transaction_id','price','duration','tax','paid'
  ];
  public function order()
  {
    return $this->belongsTo('App\order');
  }
}
