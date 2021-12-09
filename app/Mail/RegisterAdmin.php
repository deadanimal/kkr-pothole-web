<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class RegisterAdmin extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $user)
    {
        //dd($user);
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //($this->user['name'] );
        return $this->subject('Pengesahan Pendaftaran Admin Aplikasi MyPotholes')->view('email.registeradmin')->with([
            'name'=>$this->user['name'],
            'email'=>$this->user['email'],
            'role'=>$this->user['role'],
            'password'=>$this->user['password'],
            'link'=>$this->user['link']
        ]);
    }
}
