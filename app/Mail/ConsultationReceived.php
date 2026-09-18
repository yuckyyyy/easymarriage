<?php

namespace App\Mail;

use App\Models\Consultation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConsultationReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Consultation $consultation)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New consultation request — Easy Marriage Georgia',
            replyTo: [$this->consultation->email],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.consultation-received',
        );
    }
}
