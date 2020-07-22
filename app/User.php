<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;


    protected $fillable = [
        'name', 'email', 'password','image','phone','job_title','hourly_rate','user_verified',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function Role()
    {
      return $this->belongsTo('App\role');
    }
    public function Skills()
    {
      return $this->belongsToMany('App\skill');
    }
    public function jobs()
    {
      return $this->belongsToMany('App\job');
    }
    public function location()
    {
      return $this->belongsTo('App\location');
    }
    public function messages()
    {
      return $this->hasMany('App\message');
    }
    public function reports()
    {
      return $this->hasMany('App\report');
    }
    public function reviews()
    {
      return $this->hasMany('App\review');
    }
    public function payouts()
    {
      return $this->hasMany('App\payout');
    }
    public function orders()
    {
      return $this->hasMany('App\order');
    }





}
