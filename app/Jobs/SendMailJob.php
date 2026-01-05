<?php

namespace App\Jobs;

use App\Mail\MailCreated;
use App\Models\Mail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendMailJob implements ShouldQueue
{
    use Queueable;

    public Mail $mail;

    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    public function handle(): void
    {
        User::whereNotNull('email')
            ->chunkById(100, function ($users) {
                foreach ($users as $user) {
                    \Illuminate\Support\Facades\Mail::to($user->email)
                        ->queue(new MailCreated($this->mail));
                }
            });

        $this->mail->update([
            'is_completed' => true
        ]);
    }
}
