<?php

use Illuminate\Support\Facades\Route;
use App\Events\SendMessageEvent;
use App\Http\Middleware\AdminMiddleware;
use App\user;

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
//return  user::find(1)->Notifications[0]->data['message'];

    return 'taameed.app domain';
});
//-------------Authantication--------------
Route::get('Logout',"AuthController@Logout");
Route::get('AdminLogin','AuthController@AdminLogin');
Route::post('AdminLogin','AuthController@Login');
Route::get('ResetPassord','AuthController@ResetPassord');
Route::get('CodeValidation','AuthController@CodeValidation');
Route::post('ResetPassord','AuthController@Reset');
Route::post('NewPassword','AuthController@NewPassword');
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

Route::get('Dashboard/UsreMoney',"dashboardrController@UsreMoney");
Route::get('Dashboard/Locations',"dashboardrController@Locations");
Route::get('Dashboard/Reports',"dashboardrController@Reports");
Route::get('Dashboard/Chats',"dashboardrController@Chats");

Route::get('Dashboard/Sittings',"dashboardrController@Sittings");
Route::post('Dashboard/Sittings/AddSittings',"dashboardrController@AddSittings");

//----------------Admin-Authantecation-----------
//------------users

Route::get('Dashboard/Users/AddUser',"userController@ShowAddUser");
//Route::get('Dashboard/Users/admin/profile',"userController@ShowAddUser");
Route::Post('Dashboard/Users/AddUser',"userController@AddUser");
Route::get('Dashboard/Users/DeleteUser/{id}',"userController@DeleteUser");
Route::get('Dashboard/Users/{id}',"userController@UserProfile");
Route::get('Dashboard/Users/Update/{id}',"userController@ShowUpdate");
Route::post('Dashboard/Users/Update/{id}',"userController@Update");
Route::get('activate/{id}/{name}',"userController@activate");

Route::post('Dashboard/Users/Update/admin/{id}',"userController@adminUpdate");

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

Route::get('Dashboard/orders/Approved/{id}',"orderController@Approved");
Route::get('Dashboard/orders/returnMoney/{id}',"orderController@returnMoney");
//---------reviews
Route::post('Dashboard/Reviewsr/AddReview',"orderController@AddReview");

//-----------Locations
Route::post('Dashboard/Locations/AddLocation',"locationController@AddLocation");
Route::get('Dashboard/Locations/DeleteLocation/{id}',"locationController@DeleteLocation");



//------------Reports
Route::post('Dashboard/Reports/AddReport',"reportController@AddReport");

//------------chats
Route::get('Dashboard/Chats/Chat/{chat_id}/',"chatController@GetMessages");
Route::get('chat',"chatController@findChat");

//Route::get('search','chatController@search');
Route::get('search/action','chatController@action')->name('search.action');
Route::post('search/user','userController@searchuser');
Route::get('Dashboard/search/order','orderController@searchorder');

//-----------Sittings
Route::post('Dashboard/Sittings/AddSittings',"SittingsController@AddSittings");

});

//------------


//user------------------------------------
//-----------------Auth-----------
Route::get('Login','User\AuthController@Login')->name('Login');
Route::Post('Login','User\AuthController@UserLogin');
Route::get('Register','User\AuthController@Register');
Route::Post('Register','User\AuthController@AddUser');
Route::get('UserType','User\AuthController@UserType');
Route::Post('UserType','User\AuthController@AddUserType');

//------------------End-Auth----------
Route::group(['middleware' => "auth"], function(){


Route::get('Home','User\HomeController@Home');
Route::get('AddOrder','User\HomeController@AddOrder');


//------------Order-Controller-------------
Route::get('Home/Orders','User\OrderController@Orders');
Route::get('Home/Orders/OrdersDetails/{id}','User\OrderController@OrdersDetails');
Route::post('Home/Orders/OrdersDetails/{id}/cancel','User\OrderController@CancelOrder');
Route::get('Home/Orders/OrdersDetails/{id}/accept','User\OrderController@AcceptOrder');
Route::get('Home/MakeOrder','User\OrderController@ShowMakeOrder');
Route::post('Home/MakeOrder','User\OrderController@MakeOrder');
Route::get('Home/ExcuteOrder','User\OrderController@ShowExcute');
Route::post('Home/ExcuteOrder','User\OrderController@ExcuteOrder');
Route::get('Home/Orders/FailedOrders','User\OrderController@FailedOrders');
Route::get('Home/Orders/PandingOrders','User\OrderController@PandingOrders');
Route::get('Home/Orders/SuccessedOrders','User\OrderController@SuccessedOrders');
Route::get('Home/Orders/UnderWayOrders','User\OrderController@UnderWayOrders');
Route::get('Home/payment/{id}','User\OrderController@payment');

//messages-------------
Route::get('Home/chats','User\MessageController@chats');
Route::get('Home/chats/{id}','User\MessageController@Messages');
Route::get('Home/chats/{id}/messages','User\MessageController@GetMessages');
Route::post('sendmessage','User\MessageController@sendmessage');
/////notifications
Route::get('/user/notifications','User\UserController@Notification');

});
