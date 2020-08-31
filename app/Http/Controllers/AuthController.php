<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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
      return view('admin/Auth/Login');
    }
    return redirect('Dashboard');
  }
  public function Login(loginvalidation $data)
  {

    if (Auth::attempt(['email'=>$data->email,'password'=>$data->password])) {
      if (Auth::check()) {
        return redirect('Dashboard');
      }
      Auth::login();
    return redirect('Dashboard');
    }

    return redirect()->back()->with('message','بيانات خاطئه');
  }
  public function Logout()
  {if (Auth::user()->role('مقدم خدمه')||Auth::user()->role('طالب خدمه')) {
    Auth::logout();
    return redirect('Login');
  }
    Auth::logout();
    return redirect('AdminLogin');
  }
  public function ResetPassord()
  {
    if (Auth::check()) {
      return redirect('Dashboard');
    }
    return view('admin/Auth/ResetPassord');
  }
  public function Reset(Request $data)
  {
    $user=User::where('email',$data->email)->first();

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
      //$user->notify(new ResetPassord($user));
      dispatch(new ResetPasswordJob($user));
      return redirect('CodeValidation')->with('success_message','تم ارسال الرابط تفقد البريد الخاص بك');
    }
    return redirect('ResetPassord')->with('message','هذا البريد الالكتروني غير موجود ');
  }

  public function NewPassword(request $token)
  {
    $forgetPassowrd=forgetPassowrd::where('token',$token->token)->first();
    if ($forgetPassowrd) {
      $email=$forgetPassowrd->email;
      $token=$forgetPassowrd->token;
      return view('admin/Auth/NewPassword',compact('token','email'));
    }
    else {
      return redirect('Login')->with('message','هذا الكود خاطئ ');
    }
  }


 public function ResetNewPassword(Request $data){

if (strlen($data->password)<6||($data->password)!=($data->password_confirmation)) {
  return redirect('Login')->with('message','تأكد من كلمة المرور جيدا ');
}

    $user=User::where('email',$data->email)->first();
    $user->password=bcrypt($data->password);
    $user->save();
    $forgetPassowrd=forgetPassowrd::where('token',$data->token)->first()->delete();
    if ($user->role=='مقدم خدمه'||$user->role=='طالب خدمه') {
      return redirect('Login')->with('message','تم تغير كلمة السر بنجاح');
    }
    return redirect('AdminLogin')->with('message','تم تغير كلمه السر بنجاح');
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

  public function CodeValidation()
  {
    return view('admin\Auth\CodeValidation');
  }
}
