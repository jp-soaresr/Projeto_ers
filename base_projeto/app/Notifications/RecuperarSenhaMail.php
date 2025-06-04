<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RecuperarSenhaMail extends Notification implements ShouldQueue
{
    use Queueable;

    public $token;
    public $email;

    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        // Link correto com token na URL
        $url = url('/senha/redefinir/' . $this->token . '?email=' . urlencode($this->email));
        return (new MailMessage)
            ->subject('Recuperação de Senha')
            ->greeting('Olá!')
            ->line('Você solicitou a redefinição de senha.')
            ->action('Redefinir Senha', $url)
            ->line('Se você não solicitou, ignore este e-mail.');
    }
}
