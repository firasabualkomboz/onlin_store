<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    public $data;
    use Queueable, SerializesModels;


    public function __construct($data)
    {
        $this->data = $data;
    }


    public function build()
    {
        return $this->from('feras.out@gmail.com')
        ->subject('New Customer Equiry')
        ->view('front.template_email')->with('data', $this->data);
    }
}
