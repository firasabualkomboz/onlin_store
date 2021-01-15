<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SignupEmail extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct($data)
    {
        $this->email_data = $data;
    }


    public function build()
    {
        return $this->from(env('MAIL_USERNAME'), 'coder aweso.me')->subject("Welcome to Coderaweso.me!")->view('mail.signup-email', ['email_data' => $this->email_data]);
    }
}
