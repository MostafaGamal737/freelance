<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\adminValidation;
use Laravel\Passport\HasApiTokens;
use App\Jobs\activate;
use App\Jobs\ResetPasswordJob;
use App\Http\Requests\loginvalidation;
use Auth;
use App\forgetPassowrd;
use App\Notifications\ResetPassord;

class AuthController extends Controller
{
  public function Register(adminValidation $data){

    $image_name='null';
    $user=new user();
    $user->name=$data->name;
    $user->email=$data->email;
    $user->phone=$data->phone;
    $user->role=$data->role;
    $user->location="السعوديه";
    $user->password=bcrypt($data->password);
    if ($data->image!="") {
      $image_name=time().'.'.$data->image->getClientOriginalExtension();
      $user->image=$image_name;
      $data->image->move('images',$image_name);
    }
    else {
      $user->image='avatar.jpg';
    }
/*
    if ($user->save()) {
      dispatch(new activate($user))->delay(2);
    }

    */
    $user->save();
    $token=$user->createToken('authToken')->accessToken;
    return response(['success'=>'تم الاضافه بنجاح','user'=>$user]) ;
  }

  public function Login(loginvalidation $data){
    if (!Auth::attempt(['email'=>$data->email,'password'=>$data->password])) {
      return response(['error'=>'البيانات غير صحيحه']);
    }

    Auth::user()->fire_token=$data->fire_token;
    Auth::user()->save();
    $token=Auth()->user()->createToken('authToken')->accessToken;
    return response(['success','user'=>Auth()->user(),'toke'=>$token]) ;
  }


  public function Reset(Request $data)
  {
    $user=user::where('email',$data->email)->first();

    if (!empty($user)) {
      if ($this->checkforget($user)) {
        $forgetPassowrd=forgetPassowrd::where('email', $user->email)->first();
        $forgetPassowrd->email=$user->email;
        $forgetPassowrd->token=mt_rand(10000000,99999999);
        $forgetPassowrd->save();

      }
      else {

        $forgetPassowrd=new forgetPassowrd();
        $forgetPassowrd->email=$user->email;
        $forgetPassowrd->token=mt_rand(10000000,99999999);
        $forgetPassowrd->save();
      }
       // $user->notify(new ResetPassord($user));
        dispatch(new ResetPasswordJob($user));
      return response(['response'=>'تم ارسال الرابط تفقد البريد الخاص بك']);
    }
    return response(['response'=>'هذا الاميل غير موجود ']);
  }



  public function NewPassword(request $token)
  {
    $forgetPassowrd=forgetPassowrd::where('token',$token->token)->first();
    if ($forgetPassowrd) {
      $email=$forgetPassowrd->email;
      $token=$forgetPassowrd->token;
      return response(['result'=>true,'message'=>' صحيح']);
    }
    else {
      return response(['result'=>false,'message'=>' هناك خطئ']);
    }
  }
   
 public function ResetNewPassword(Request $data){

  if (strlen($data->password)<6||($data->password)!=($data->password_confirmation)) {
    return response(['result'=>false,'message'=>'تأكد من كلمة المرور جيدا ']);
  }
  
      $user=User::where('email',$data->email)->first();
      $user->password=bcrypt($data->password);
      $user->save();
      $forgetPassowrd=forgetPassowrd::where('token',$data->token)->first()->delete();
      if ($user->role=='منفذ خدمات'||$user->role=='طالب خدمه') {
        return response(['result'=>true,'message'=>'تم تغير كلمة السر بنجاح']);
      }
      return response(['result'=>false,'message'=>'تأكد من كلمة المرور جيدا ']);
   }










  public function checkforget($user)
  {
    $forgetPassowrd=forgetPassowrd::where('email', $user->email)->first();
    if (empty($forgetPassowrd)) {
      return false;
    }
    return true;
  }



  function getToken($length)
  {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet.= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i=0; $i < $length; $i++) {
      $token .= $codeAlphabet[mt_rand(0, $max-1)];
    }

    return $token;
  }



}
