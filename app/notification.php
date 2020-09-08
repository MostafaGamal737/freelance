<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
class notification extends Model
{
  public function SendNotification($firetoken,$notificationBody){
  $optionBuilder = new OptionsBuilder();
  $optionBuilder->setTimeToLive(60*20);

  $notificationBuilder = new PayloadNotificationBuilder('تعميد');
  $notificationBuilder->setBody($notificationBody)
              ->setSound('default');

  $dataBuilder = new PayloadDataBuilder();
  $dataBuilder->addData(['Notification' => $notificationBody]);

  $option = $optionBuilder->build();
  $notification = $notificationBuilder->build();
  $data = $dataBuilder->build();

  $token = $firetoken;

  //$downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

  //dd($downstreamResponse->numberModification());
}
  public function SendMultiNotification($firetokens,$notificationBody){
  $optionBuilder = new OptionsBuilder();
  $optionBuilder->setTimeToLive(60*20);

  $notificationBuilder = new PayloadNotificationBuilder('تعميد');
  $notificationBuilder->setBody($notificationBody)
              ->setSound('default');
  $dataBuilder = new PayloadDataBuilder();
  $dataBuilder->addData(['Notification' => $notificationBody]);

  $option = $optionBuilder->build();
  $notification = $notificationBuilder->build();
  $data = $dataBuilder->build();

  $tokens = $firetokens;

  $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

  //dd($downstreamResponse->numberModification());
}
}
