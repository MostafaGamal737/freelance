<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\user;
use App\forgetPassowrd;
use App\Notifications\ResetPassord;
use App\Http\Requests\newpassrequest;
use App\Http\Requests\loginvalidation;
use App\jobs\ResetPasswordJob;

class AuthController extends Controller
{
  public function AdminLogin()
  {
    if (!Auth::check()) {
      return view('admin\Auth\Login');
    }
    return redirect('Dashboard');
  }
  public function Login(loginvalidation $data)
  {

    if (Auth::attempt(['email'=>$data->email,'password'=>$data->password])) {
      $user=User::where('email','=',$data->email)->first();
      Auth::Login($user);
      return redirect('Dashboard');
    }
    return redirect()->back()->with('message','بيانات خاطئه');
  }
  public function Logout()
  {
    Auth::logout();
    return redirect('AdminLogin');
  }
  public function ResetPassord()
  {
    if (Auth::check()) {
      return redirect('Dashboard');
    }
    return view('admin\Auth\ResetPassord');
  }
  public function Reset(Request $data)
  {
    $user=user::where('email',$data->email)->first();

    if (!empty($user)) {
      if ($this->checkforget($user)) {
        $forgetPassowrd=forgetPassowrd::where('email', $user->email)->first();
        $forgetPassowrd->email=$user->email;
        $forgetPassowrd->token=$this->getToken(60);;
        $forgetPassowrd->save();

      }
      else {

        $forgetPassowrd=new forgetPassowrd();
        $forgetPassowrd->email=$user->email;
        $forgetPassowrd->token=$this->getToken(60);;
        $forgetPassowrd->save();
      }
      //$user->notify(new ResetPassord($user));
      dispatch(new ResetPasswordJob($user));
      return redirect('AdminLogin')->with('success_message','تم ارسال الرابط تفقد البريد الخاص بك');
    }
    return redirect('ResetPassord')->with('message','هذا الاميل غير موجود ');
  }

  public function NewPassword($token,$email)
  {
    $forgetPassowrd=forgetPassowrd::where('token',$token)->first();
    if ($forgetPassowrd) {

      return view('admin\Auth\NewPassword',compact('token','email'));
    }
    else {
      return redirect('AdminLogin');
    }
  }


 public function ResetNewPassword(newpassrequest $data){
    $user=user::where('email',$data->email)->first();
    $user->password=bcrypt($data->password);
    $user->save();
    $forgetPassowrd=forgetPassowrd::where('token',$data->token)->first()->delete();
    return redirect('AdminLogin');;
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
