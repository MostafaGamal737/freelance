<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\report;
class reportController extends Controller
{
  public function Addreport(Request $data)
  {
      $report=new report();
      $report->report=$data->name;
      $report->provider_id=6;
      $report->save();
      return redirect()->back();
  }
}
