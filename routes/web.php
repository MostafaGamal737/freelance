<?php

use Illuminate\Support\Facades\Route;
use App\Events\SendMessageEvent;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (Request $request) {
  //broadcast(new SendMessageEvent("mostafa"));

    return view('welcome');
});
//-------------Authantication--------------
Route::get('Logout',"AuthController@Logout");
Route::get('AdminLogin','AuthController@AdminLogin');
Route::post('AdminLogin','AuthController@Login');
Route::get('ResetPassord','AuthController@ResetPassord');
Route::post('ResetPassord','AuthController@Reset');
Route::get('ResetPassord/{token}/{email}','AuthController@NewPassword');
Route::post('ResetNewPassord','AuthController@ResetNewPassword');
//------------ endAuthantication
//Route::get('AddMessage',"chatController@AddMessage");
//Route::get('chat',"chatController@getchat");
//Route::get('messages',"chatController@messages");
//Route::post('messages',"chatController@AddMessage");
Route::group(['middleware' => AdminMiddleware::class], function(){

//---------------dashboard
Route::get('Dashboard',"dashboardrController@Dashboard");
Route::get('Dashboard/Users',"dashboardrController@Users");
Route::get('Dashboard/Admins',"dashboardrController@Admins");
Route::get('Dashboard/Roles',"dashboardrController@Roles");
Route::get('Dashboard/Skills',"dashboardrController@Skills");
Route::get('Dashboard/Jobs',"dashboardrController@Jobs");

Route::get('Dashboard/SuccessedOrders',"dashboardrController@SuccessedOrders");
Route::get('Dashboard/DelayedOrders',"dashboardrController@DelayedOrders");
Route::get('Dashboard/OngoingOrders',"dashboardrController@OngoingOrders");
Route::get('Dashboard/FailedOrders',"dashboardrController@FailedOrders");

Route::get('Dashboard/Reviews',"dashboardrController@Reviews");
Route::get('Dashboard/Locations',"dashboardrController@Locations");
Route::get('Dashboard/Reports',"dashboardrController@Reports");
Route::get('Dashboard/Chats',"dashboardrController@Chats");

Route::get('Dashboard/Sittings',"dashboardrController@Sittings");
Route::post('Dashboard/Sittings/AddSittings',"dashboardrController@AddSittings");

//----------------Admin-Authantecation-----------
//------------users

Route::get('Dashboard/Users/AddUser',"userController@ShowAddUser");
Route::Post('Dashboard/Users/AddUser',"userController@AddUser");
Route::get('Dashboard/Users/DeleteUser/{id}',"userController@DeleteUser");
Route::get('Dashboard/Users/{id}',"userController@UserProfile");
Route::get('activate/{id}/{name}',"userController@activate");

//----------Roles
Route::post('Dashboard/Roles/AddRole',"roleController@AddRole");
Route::get('Dashboard/Roles/DeleteRole/{id}',"roleController@DeleteRole");


//-------------Skills
Route::post('Dashboard/Skills/AddSkill',"skillController@AddSkill");
Route::get('Dashboard/Skills/DeleteSkill/{id}',"skillController@DeleteSkill");



//---------Jobs
Route::post('Dashboard/jobs/Addjob',"jobController@AddJob");
Route::get('Dashboard/jobs/Deletejob/{id}',"jobController@DeleteJob");

//---------Orders
Route::post('Dashboard/orders/Addorder',"orderController@AddOrder");
Route::get('Dashboard/orders/{id}',"orderController@OrdersDetails");


//---------reviews
Route::post('Dashboard/Reviewsr/AddReview',"orderController@AddReview");

//-----------Locations
Route::post('Dashboard/Locations/AddLocation',"locationController@AddLocation");
Route::get('Dashboard/Locations/DeleteLocation/{id}',"locationController@DeleteLocation");



//------------Reports
Route::post('Dashboard/Reports/AddReport',"reportController@AddReport");



//------------chats
Route::get('Dashboard/Chats/messages/{sender_id}/{receiver_id}',"chatController@GetMessages");

//-----------Sittings
Route::post('Dashboard/Sittings/AddSittings',"SittingsController@AddSittings");

});

//------------
