<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Auth;
class OrderNotification extends Notification
{
    use Queueable;
   public $user;
   public $message;
   public $order;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$message,$order)
    {
        $this->user=$user;
        $this->message=$message;
        $this->order=$order;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
          'name' => $this->user->name,
         'role' => $this->user->role,
         'message' => $this->message,
         'code' => $this->order->code,
         'id' => $this->order->id
        ];
    }
}
