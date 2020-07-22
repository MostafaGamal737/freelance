<?php

namespace App\Http\Controllers;
use App\role;
use Illuminate\Http\Request;
use App\Http\Requests\rolesValidation;
class roleController extends Controller
{
  public function AddRole(rolesValidation $data)
  {
      $role=new role();
      $role->role=$data->name;
      $role->save();
      return redirect()->back()->with('message','تم الاضافة بنجاح');
  }
  public function DeleteRole($id)
  {
    role::find($id)->delete();
    return redirect()->back()->with('message','تم الحذف بنجاح');
  }
}
