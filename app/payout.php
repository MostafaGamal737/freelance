<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payout extends Model
{
  protected $fillable = [
    'status','transaction_id'
  ];

  public function user(){
    return $this->belongsTo('App\user');
  }
}
