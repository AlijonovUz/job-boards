<?php

namespace App\Listeners;

use App\Events\VacancyCreated as VacancyCreatedEvent;
use App\Models\User;
use App\Notifications\VacancyCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendVacancyCreatedNotification implements ShouldQueue
{

    use InteractsWithQueue;

    public function handle(VacancyCreatedEvent $event): void
    {
        User::where('role', 'job_seeker')
            ->chunk(100, function ($users) use ($event) {
                foreach ($users as $user) {
                    $user->notify(
                        new VacancyCreated($event->vacancy)
                    );
                }
            });
    }
}
