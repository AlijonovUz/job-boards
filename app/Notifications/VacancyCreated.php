<?php

namespace App\Notifications;

use App\Models\Vacancy;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class VacancyCreated extends Notification
{
    use Queueable;

    public Vacancy $vacancy;

    /**
     * Create a new notification instance.
     */
    public function __construct(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
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
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id' => $this->vacancy->id,
            'slug' => $this->vacancy->slug,
            'message' => "New vacancy created",
        ];
    }
}
