<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AssignmentGradedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $assignment, $submission;
    

    /**
     * Create a new message instance.
     */
    public function __construct($assignment, $submission)
    {
        $this->assignment = $assignment;
        $this->submission = $submission;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '作業成績通知',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.assignment_graded',
            with: [
                'submission' => $this->submission,  // 將標題傳遞給視圖
                'assignment' => $this->assignment,  // 將內容傳遞給視圖
            ],
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
