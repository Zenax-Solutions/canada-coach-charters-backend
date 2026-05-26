<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public QuoteRequest $quote,
        public bool $isAutoReply = false
    ) {}

    public function envelope(): Envelope
    {
        $subject = $this->isAutoReply
            ? "Thank you for your quote request — Canada Coach Charters"
            : "New Quote Request: " . ucfirst($this->quote->service_type) . " — " . $this->quote->name;

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        return new Content(
            view: $this->isAutoReply ? "emails.quote-auto-reply" : "emails.quote-admin",
        );
    }

    public function attachments(): array
    {
        return [];
    }
}