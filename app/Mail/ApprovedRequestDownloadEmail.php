<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApprovedRequestDownloadEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $title;
    public $status;
    public $linkfile;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $title, $status, $linkfile)
    {
        //
        $this->user = $user;
        $this->title = $title;
        $this->status = $status;
        $this->linkfile = $linkfile;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notification Request Thesis Download',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.approved_request_download',
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
}
