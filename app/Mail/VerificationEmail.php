<?php

// namespace App\Mail;

// use Illuminate\Bus\Queueable;
// use Illuminate\Mail\Mailable;
// use Illuminate\Queue\SerializesModels;
// use Illuminate\Contracts\Queue\ShouldQueue;

// class VerificationEmail extends Mailable
// {
//     use Queueable, SerializesModels;

//     /**
//      * Create a new message instance.
//      *
//      * @return void
//      */
//     public function __construct($data)
//     {
//         $this->email_data = $data;
//     }

//     /**
//      * Build the message.
//      *
//      * @return $this
//      */
//     public function build()
//     {
//         return $this-> from(env('MAIL_USERNAME'), 'Grey Hat Cyber Solutions')->subject('Welcome to Grey Hat Cyber Solutions')->view('mail.verificationEmail.blade.php', ['email_data' => $this->email_data]);
//     }
// }
