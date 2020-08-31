<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\adminValidation;
use App\User;
use App\Http\Requests\loginvalidation;
use Auth;
class AuthController extends Controller
{
    public function Login()
    {  if (Auth::check()) {
        return redirect('Home');
      }
      return view('users/Auth/Login');
    }
    public function UserLogin(loginvalidation $data)
    {
      if (Auth::attempt(['email'=>$data->email,'password'=>$data->password])) {
        if (Auth::check()) {
          return redirect('Home');
        }
        Auth::login();
      return redirect('Home');
      }
      return redirect()->back()->with('message','بيانات خاطئه');
    }
    public function Registr()
    {
      return view('users/Auth/Registr');
    }
    public function AddUser(adminValidation $data)
    {
      $data['role']='null';
      $image_name='null';
      $user=new User();
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
 $user->save();
      return view('users/Auth/UserType',compact('user'));
    }
    public function UserType()
    {
      return view('users\Auth\UserType');
    }
    public function AddUserType(request $data)
    {

    $user=user::find($data->user);

    $user->role=$data->role;
    $user->save();
      return redirect('Login');
    }

}
