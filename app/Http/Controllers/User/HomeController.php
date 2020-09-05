<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
  public function __construct()
   {
    Session::put('website', 'Home');
     }
  public function Home()
  {
    return view('users/Home');
  }
  public function AddOrder()
  {
    return view('users/Orders/NewOrder');
  }
}
