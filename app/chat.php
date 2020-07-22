<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
  protected $fillable = [
      'chat',
  ];
    public function messages(){
      return $this->hasMany('App\message');
    }
}
