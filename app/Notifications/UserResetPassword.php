<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserResetPassword extends Notification
{
    use Queueable;

    protected $token;
    protected $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $url)
    {
        $this->token = $token;
        $this->url = $url;
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
                    ->subject('Reinici de contrasenya')
                    ->greeting('Hola!')
                    ->line('Hem rebut un missatge de reinici de contrasenya.')
                    ->action('Reiniciar contrasenya', url($this->url.$this->token))
                    ->line('Gracies per utilitzar la nostra aplicació!')
                    ->salutation('INS Camí de Mar');
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
