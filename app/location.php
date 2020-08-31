<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class location extends Model
{
  protected $fillable = [
      'location',
  ];
    public function user(){
      return $this->hasMany('App\User');
    }
}
