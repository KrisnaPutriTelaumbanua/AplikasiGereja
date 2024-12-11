<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    public function __construct($user)
    {
        $this->user = $user;
    }
    public function build()
    {
        return $this->from('superadmin@gmail.com', 'PWL UKRIM')
            ->subject('Registrasi User')
            ->view('mail/register')
            ->with([
                'user' => $this->user
            ]);
    }
}
