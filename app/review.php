<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
  protected $fillable = [
      'review',
  ];
    public function user(){
      return  $this->belongsTo('App\User');
    }
    public function order(){
      return  $this->belongsTo('App\order');
    }
}
