<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
use App\http\Requests\adminValidation;
use Laravel\Passport\HasApiTokens;
use App\jobs\activate;
use App\Http\Requests\loginvalidation;
use Auth;
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

    if ($user->save()) {
      dispatch(new activate($user))->delay(2);
    }
    $token=$user->createToken('authToken')->accessToken;
    return response(['success'=>'تم الاضافه بنجاح','user'=>$user,'token'=>$token]) ;
  }
  public function Login(loginvalidation $data){
    if (!Auth::attempt(['email'=>$data->email,'password'=>$data->password])) {
      return response(['error'=>'البيانات غير صحيحه']);
    }
    $token=Auth()->user()->createToken('authToken')->accessToken;
    return response(['success','user'=>Auth()->user(),'token'=>$token]) ;
  }
}
