<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function Home()
  {
    return view('users/Home');
  }
  public function AddOrder()
  {
    return view('users/Orders/NewOrder');
  }
}
