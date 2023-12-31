<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

use Illuminate\Notifications\Messages\MailMessage;

class PostCreated extends Mailable
{
    use Queueable, SerializesModels;
    private $post;

    /**
     * Create a new message instance.
     */

    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Hi-レポートからの通知',
            from: 'foo@example.net', 
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.test',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }


    public function build()
    {
        return $this
            // ->text('emails.test_text')
            // ->view('emails.test')
            // ->from('foo@example.net', 'ポス太')
            // ->subject('This is a test mail')
            ->with(['post' => $this->post]);
    }
}
