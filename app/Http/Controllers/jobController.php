<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\job;
use App\User;
use DB;
use App\Http\Requests\jobsValidation;

class jobController extends Controller
{
  public function Addjob(jobsValidation $data)
  {
      $job=new job();
      $job->job=$data->name;
      $job->save();
      return redirect()->back();
  }
  public function Deletejob($id)
  {

    if (job::find($id)->delete()) {
       DB::table('job_user')->where('job_id',$id)->delete();
    }

    return redirect()->back()->with('message','تم الحذف بنجاح');
  }
}
