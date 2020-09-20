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

Route::get('GetMessages','api\ChatController@GetMessages');//done

Route::get('orders','api\OrderController@Orders');//done

Route::post('MakeOrder','api\OrderController@MakeOrder');//done

Route::post('AcceptOrder','api\OrderController@AcceptOrder');//done 

Route::post('CanceledOrder','api\OrderController@CanceledOrder');//done


Route::post('GetOrder','api\OrderController@GetOrder');//done

Route::post('GetOrderUsingStatus','api\OrderController@GetOrderUsingStatus');//done

Route::get('GetMyChats','api\ChatController@GetMyChats');//done

Route::get('GetNotifications','api\NotificationController@GetNotifications');//done

Route::get('NotificationsCount','api\NotificationController@GetUnreadNotificationsCount');//done

Route::get('user/Notification/{id}','api\NotificationController@Notification');//done

Route::post('Rating','api\OrderController@Rating');
});


Route::post('Register','api\AuthController@Register');//done
Route::post('Login','api\AuthController@Login');//done
Route::post('ResetPassord','api\AuthController@Reset');//done
