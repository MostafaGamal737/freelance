<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\location;
use App\Http\Requests\myvalidation;
class locationController extends Controller
{
  public function AddLocation(myvalidation $data)
  {
      $location=new location();
      $location->location=$data->name;
      $location->save();
      return redirect()->back();
  }
  public function DeleteLocation($id)
  {
    location::find($id)->delete();
    return redirect()->back()->with('message','تم الحذف بنجاح');
  }
}
