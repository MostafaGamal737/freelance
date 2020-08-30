<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\user;
use App\forgetPassowrd;
class ResetPassord extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     private $user;
     private $forgetPassowrd;
    public function __construct($user)
    {
        $this->user=$user;
        $this->forgetPassowrd=forgetPassowrd::where('email',$user->email)->first();

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('وصلنا طلبط بأنك قد نسيت كلمة السر الخاصه بك ')
                    //->action('كلمة مرور جديده', ('http://127.0.0.1:8000/ResetPassord/'.$this->forgetPassowrd->token.'/'.$this->forgetPassowrd->email))
                    ->action($this->forgetPassowrd->token,('#'))
                    ->line('نشكر علي استخدامك التطبيق الخاص بنا!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
