<?php

namespace App\Mail;

use App\Models\Story;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewNewsNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $news;

    public function __construct(Story $news)
    {
        $this->news = $news;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->news->title,
            from: new Address(env('MAIL_USERNAME'), 'Ethiopia Nutrition Leaders Network Community')
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.newsletter',
            with: ['news', $this->news]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {

        // store the path of the attachments and check if exists
        // $thumbnail = public_path($this->news->thumbnail);

        // if(Storage::exists($thumbnail)){
        //     return [
        //      Attachment::fromPath()
        //   ];
        // }else{

        // }

        return [];
    }
}
