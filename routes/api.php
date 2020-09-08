<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\user;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('user', function (Request $request) {
    return response(['data',Auth::user()]);
})->middleware('auth:api');


Route::group(['middleware' => 'auth:api'], function(){

Route::post('SendMessage','api\ChatController@AddMessage');
Route::get('GetMessages','api\ChatController@GetMessages');
Route::get('orders','api\OrderController@Orders');
Route::post('MakeOrder','api\OrderController@MakeOrder');
Route::post('AcceptOrder','api\OrderController@AcceptOrder');
Route::post('CanceledOrder','api\OrderController@CanceledOrder');
Route::post('Rating','api\OrderController@Rating');
Route::post('GetOrder','api\OrderController@GetOrder');
Route::post('GetOrderUsingStatus','api\OrderController@GetOrderUsingStatus');
Route::get('GetMyChats','api\ChatController@GetMyChats');
Route::get('GetNotifications','api\NotificationController@GetNotifications');
Route::get('NotificationsCount','api\NotificationController@GetUnreadNotificationsCount');


});
Route::post('Register','api\AuthController@Register');
Route::post('Login','api\AuthController@Login');
Route::post('ResetPassord','api\AuthController@Reset');
