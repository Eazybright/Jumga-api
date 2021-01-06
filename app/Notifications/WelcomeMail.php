<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeMail extends Notification
{
  use Queueable;

  public $username;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct($username)
  {
    $this->username = $username;
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
    $url = env('FRONTEND_URL');
    return (new MailMessage)
      ->subject('Welcome to JUMGA FLUTTERWAVE SOLUTION')
      ->greeting('Hi '.$this->username)
      ->line('Welcome to JUMGA FLUTTERWAVE SOLUTION. Your one-stop e-commerce market place.')
      ->line('We have some amazing features tailored for you on our dashboard:')
      ->action('Go to dashboard', $url)
      ->line('We look forward to having you on board!');
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
