<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
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
    $subject = env('APP_NAME').' - Payment Received';
    return (new MailMessage)
            ->subject($subject)
            ->greeting('Hi '. $this->order_data['first_name']. ' '. $this->order_data['last_name'])
            ->line('Payment with order number '. $this->order_data['order_number']. ' has been received and your order is in processing.')
            ->line('Thank you!');
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
