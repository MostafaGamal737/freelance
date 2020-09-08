<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skill extends Model
{
  protected $fillable = [
      'skill',
  ];
  public function Users()
  {
    return $this->belongsToMany('App\User')
    ->using('App\user_has_skill')
    ->withPivot([
      'created_by',
      'updated_by',
    ]);
  }
}
