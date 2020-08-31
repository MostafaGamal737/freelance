<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Jobs\activate;
use DB;
use App\Http\Requests\adminValidation;
use App\Http\Requests\ubdaterequest;
class userController extends Controller
{
  public function UserProfile($id)
  {
    $user=User::find($id);
    return view('admin/users/UserProfile',compact('user'));
  }
  public function ShowAddUser()
  {
    return view('admin.users.AddUser');
  }
  public function AddUser(adminValidation $data)
  {
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

    if ($user->save()) {
       dispatch(new activate($user))->delay(2);
    }
    return redirect()->back()->with('message', 'تم الاضافه بنجاح') ;
  }

    public function activate($id,$name)
    {
      $user=User::where('name', $name)->where('id', $id)->first();

      if ($user) {
        $user->user_verified=1;
        $user->save();
        return redirect('Dashboard')->with('message','تم تفعيل الحساب بنجاح');
      }
      else {
        return null;
      }
    }
    public function DeleteUser($id)
    {

      if ($user=User::find($id)) {
      DB::table('job_user')->where('user_id',$id)->delete();
      DB::table('skill_user')->where('user_id',$id)->delete();
      $user->reviews()->delete();
      $user->reports()->delete();
      $user->delete();
      }
      return redirect()->back()->with('message', 'تم الحذف بنجاح');
    }
    public function ShowUpdate($id)
    {
      $user=user::find($id);
      return view('admin/users/Update',compact('user'));
    }
    public function Update($id,ubdaterequest $data)
    {
      $user=User::find($id);
      if ($data->has('password') and !is_null($data->input('password'))) {
          $data['password'] = bcrypt($data['password']);
      }else {
        unset($data['password']);
      }

       $user->update($data->all());

      return redirect()->back()->with(['message'=>'تم تحديث البيانات بنجاح']);
    }

  }
