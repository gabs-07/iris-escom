<?php

namespace App\Notifications;

use App\Models\ProfessionalCredential;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCredentialSubmissionAdmin extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        private ProfessionalCredential $credential,
        private User $user
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
            ->subject('Nueva solicitud de credencial profesional para revisar')
            ->view('emails.new_credential_submission_admin', [
                'admin' => $notifiable,
                'credential' => $this->credential,
                'user' => $this->user,
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
            'credential_id' => $this->credential->id,
            'user_id' => $this->user->id,
        ];
    }
}
