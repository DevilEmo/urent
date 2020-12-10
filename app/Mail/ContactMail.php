<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        
        // return $this->subject('URent Inquiries')
        // ->from('johnallendechavez23@gmail.com')
        // ->to($to_email,$to_name)
        // ->body($body)
        // ->view('auth.email.contactmail');

        return $this->from('johnallendechavez23@gmail.com')->subject('URent Inquiries')
        ->view('auth.email.contactmail')->with('data', $this->data);
    
    }
}
