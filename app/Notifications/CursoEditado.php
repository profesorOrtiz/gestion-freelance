<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CursoEditado extends Notification
{
    use Queueable;

    // El curso del cual queremos mostrar la info en la notificacion
    protected $curso;

    /**
     * Create a new notification instance.
     */
    public function __construct($curso)
    {
        $this->curso = $curso;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => "El curso {$this->curso->nombre} ha sido editado",
            'curso_id' => $this->curso->id,
            'edited_at' => now(),
        ];
    }
}
