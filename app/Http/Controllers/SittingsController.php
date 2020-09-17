<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\sittingsrequest;
use App\sitting;
class SittingsController extends Controller
{
    public function AddSittings(sittingsrequest $data)
    {
      if (($sitting=sitting::get()->first())) {
        $sitting->phone=$data->phone;
        $sitting->email=$data->email;
        $sitting->card_number=$data->card_number;
        $sitting->description=$data->description;
        $sitting->terms=$data->terms;
        $sitting->iban=$data->iban;
        //$image_name=time().'.'.$data->image->getClientOriginalExtension();
        //$sitting->image=$image_name;
        //$data->image->move('images',$image_name);
        $sitting->save();
        return redirect()->back()->with('message','لقد تم حفظ البيانات بنجاح');
      }
      $sitting=new sitting();
      $sitting->phone=$data->phone;
      $sitting->email=$data->email;
      $sitting->card_number=$data->card_number;
      $sitting->description=$data->description;
      $sitting->terms=$data->terms;
      $sitting->iban=$data->iban;
      //$image_name=time().'.'.$data->image->getClientOriginalExtension();
      //$sitting->image=$image_name;
      //$data->image->move('images',$image_name);
      $sitting->save();
      return redirect()->back()->with('message','لقد تم حفظ البيانات بنجاح');
    }
}
