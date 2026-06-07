<?php

namespace App\Notifications;

use App\Models\ComentarioPublicacion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoComentarioEnPublicacion extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        private ComentarioPublicacion $comentario
    ) {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nuevo comentario en tu publicación')
            ->view('emails.nuevo_comentario', [
                'notifiable' => $notifiable,
                'comentario' => $this->comentario,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'comentario_id' => $this->comentario->id,
            'usuario_id' => $this->comentario->user_id,
            'usuario_nombre' => $this->comentario->user->name,
            'usuario_email' => $this->comentario->user->email,
        ];
    }
}
