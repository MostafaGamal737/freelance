<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
  protected $fillable = [
      'message',
  ];
    public function user(){
      return $this->belongsTo('App\User');
    }
    public function chat(){
      return $this->belongsTo('App\chat');
    }
}
