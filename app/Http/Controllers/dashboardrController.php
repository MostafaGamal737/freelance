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
class dashboardrController extends Controller
{
  public function Users()
  {
   $users=user::all();
   return view('admin\users\users',compact('users'));
  }
  public function Dashboard()
  {
   return view('admin\dashboard');
  }
  public function roles()
  {
    $roles=role::get();
   return view('admin\roles\role',compact('roles'));
  }
  public function Skills()
  {
    $skills=skill::get();
   return view('admin\skills\skill',compact('skills'));
  }
  public function Jobs()
  {
    $jobs=job::get();
   return view('admin\jobs\jobs',compact('jobs'));
  }
  public function Orders()
  {
    $orders=order::get();
   return view('admin\Orders\orders',compact('orders'));
  }
  public function Reviews()
  {
    $reviews=review::get();
   return view('admin\reviews\reviews',compact('reviews'));
  }
  public function Locations()
  {
    $locations=location::get();
   return view('admin\locations\locations',compact('locations'));
  }
  public function Reports()
  {
    $reports=report::get();
   return view('admin\reports\reports',compact('reports'));
  }
  public function Chats()
  {

    $chats=chat::get();
   return view('admin\chats\chats',compact('chats'));
  }
  public function Sittings()
  {

    $sitting=sitting::get()->first();
    return view('admin\sittings\sittings',compact('sitting'));
  }
  public function AddSittings(Request $data)
  {

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
