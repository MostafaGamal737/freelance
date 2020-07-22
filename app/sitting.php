<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sitting extends Model
{
  protected $fillable = [
      'email','phone','card_number','description','terms'
  ];

}
