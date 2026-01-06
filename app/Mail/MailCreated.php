<?php

namespace App\Mail;

use App\Models\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailCreated extends Mailable
{
    use Queueable, SerializesModels;

    public Mail $mail;

    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mail->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mails.simple',
            with: [
                'mail' => $this->mail
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
