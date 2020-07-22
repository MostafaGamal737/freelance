<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class report extends Model
{
  protected $fillable = [
      'report',
  ];

      public function user(){
        return  $this->belongsTo('App\user');
      }
}
