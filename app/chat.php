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


    public function findChat($user_id,$provider_id){
      $chat=chat::where('sender_id', $user_id)
      ->where('receiver_id', $provider_id)
      ->orwhere('sender_id', $provider_id)
      ->where('receiver_id', $user_id)
      ->first();
      if ($chat) {
        return 'true';
      }
      return 'false';
    }
}
