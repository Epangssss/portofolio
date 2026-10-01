<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    public function __construct($data)
    {
        $this->contactData = $data;
    }

    public function build()
    {
        return $this->subject('Pesan Portofolio Baru dari: ' . $this->contactData['name'])
                    ->view('emails.contact');
    }
}
