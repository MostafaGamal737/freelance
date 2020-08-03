<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\role;
use App\skill;
use App\job;
use App\order;
use App\review;
use App\location;
use App\report;
use App\chat;
use App\message;
use App\sitting;
use session;
class dashboardrController extends Controller
{
  public function Users()
  { session::put('active', 'Users');
   $users=user::where('role','!=','مدير')->where('role','!=', 'مدير عام')->get();
   return view('admin\users\users',compact('users'));
  }
  public function Admins()
  { session::put('active', 'Admins');
   $users=user::where('role','مدير')->get();
   return view('admin\users\Admins',compact('users'));
  }
  public function Dashboard()
  { session::put('active', 'Dashboard');
   return view('admin\dashboard');
  }
  public function roles()
  { session::put('active', 'roles');
    $roles=role::get();
   return view('admin\roles\role',compact('roles'));
  }
  public function Skills()
  { session::put('active', 'Skills');
    $skills=skill::get();
   return view('admin\skills\skill',compact('skills'));
  }
  public function Jobs()
  {
    session::put('active', 'Jobs');
    $jobs=job::get();
   return view('admin\jobs\jobs',compact('jobs'));
  }
  public function SuccessedOrders()
  {
    session::put('active', 'SuccessedOrders');
    $orders=order::where('status','1')->get();
   return view('admin\Orders\orders',compact('orders'));
  }
  public function DelayedOrders()
  {
    session::put('active', 'DelayedOrders');
    $orders=order::where('status','0')->get();
   return view('admin\Orders\orders',compact('orders'));
  }
  public function OngoingOrders()
  {
    session::put('active', 'OngoingOrders');
    $orders=order::where('status','2')->get();
   return view('admin\Orders\orders',compact('orders'));
  }
  public function FailedOrders()
  {
    session::put('active', 'FailedOrders');
    $orders=order::where('status','-1')->get();
   return view('admin\Orders\orders',compact('orders'));
  }
  public function Reviews()
  {
    session::put('active', 'Reviews');
    $reviews=review::get();
   return view('admin\reviews\reviews',compact('reviews'));
  }
  public function Locations()
  {
    session::put('active', 'Locations');
    $locations=location::get();
   return view('admin\locations\locations',compact('locations'));
  }
  public function Reports()
  {
    session::put('active', 'Reports');
    $reports=report::get();
   return view('admin\reports\reports',compact('reports'));
  }
  public function Chats()
  {
session::put('active', 'Chats');
    $chats=chat::get();
   return view('admin\chats\chats',compact('chats'));
  }
  public function Sittings()
  {
session::put('active', 'Sittings');
    $sitting=sitting::first();
    return view('admin\sittings\sittings',compact('sitting'));
  }
  public function AddSittings(Request $data)
  {
session::put('active', 'Sittings');
    $sitting=new sitting();
    $sitting->phone=$data->phone;
    $sitting->email=$data->email;
    $sitting->card_number=$data->card_number;
    $sitting->description=$data->description;
    $sitting->terms=$data->terms;
    if ($data->logo!='') {
      if ($data->image!="") {
        $image_name=time().'.'.$data->logo->getClientOriginalExtension();
        $sitting->logo=$image_name;
        $data->logo->move('public/images',$image_name);
      }
    }
    $sitting->save();
    return redirect()->back()->with('message','تم الاضافه بنجاح');

  }




}
