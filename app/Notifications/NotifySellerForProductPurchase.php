<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifySellerForProductPurchase extends Notification
{
  use Queueable;

  public $order_data;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct($order_data)
  {
    $this->order_data = $order_data;
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
    $subject = env('APP_NAME').' - Product Purchased';
    $url = env('FRONTEND_URL');

    return (new MailMessage)
        ->subject($subject)
        ->greeting('Hi, a user just bought product(s) from your store.')
        ->line('The order tracking number is '. $this->order_data['order_number'])
        ->line('For more details please click the button below.')
        ->action('Go To Dashboard', $url);
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
