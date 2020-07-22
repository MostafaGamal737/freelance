<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
  protected $fillable = [
      'job',
  ];
  public function Users()
  {
    return $this->belongsToMany('App\user')
    ->using('App\user_has_skill')
    ->withPivot([
      'created_by',
      'updated_by',
    ]);
  }
}
