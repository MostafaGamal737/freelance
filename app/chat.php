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
      ->orwhere('receiver_id', $user_id)
      ->first();
      if ($chat) {
        return 'true';
      }
      return 'false';
    }

}


/*
/json_decode  د
  //ده مثال عامل ل ارراي اهو encode و بعدين عملتلها ديكود و شغاله
//  $data= array("email"=>$request->email, "password"=>$request->password, "firebase_token"=>$request->firebase_token);
//  $x=json_encode($data);
//  $w= json_decode($request); //لو هتبعت هنا json يبقي هيتبدل ب مكان السطر ده
    $validator = Validator::make($request->all(), [//لو باعت json و عملتله decode هتبدل القيمه الي عملتها ب الريكوست ده
    */
