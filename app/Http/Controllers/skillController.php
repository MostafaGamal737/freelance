<?php

namespace App\Http\Controllers;
use App\skill;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests\skillsValidation;

class skillController extends Controller
{
  public function Addskill(skillsValidation $data)
  {
      $skill=new skill();
      $skill->skill=$data->name;
      $skill->save();
      return redirect()->back();
  }
  public function DeleteSkill($id)
  {

    ;
    if (skill::find($id)->delete()) {
      DB::table('skill_user')->where('skill_id',$id)->delete();

    }
    return redirect()->back()->with('message','تم الحذف بنجاح');
  }
}
