<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AnnouncementNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $course;
    public $announcement;

    /**
     * Create a new message instance.
     */
    public function __construct($course, $announcement){

        $this->course = $course;
        $this->announcement = $announcement;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope{
        return new Envelope(
            subject: $this->announcement->title,  // 使用公告的標題作為郵件主題
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content{
        return new Content(
            view: 'emails.announcement',  // 指定郵件的顯示視圖
            with: [
                'course' => $this->course,  // 將標題傳遞給視圖
                'announcement' => $this->announcement,  // 將內容傳遞給視圖
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array{
        return [];
    }
}
