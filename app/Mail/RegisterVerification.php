<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class RegisterVerification extends Mailable
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
        return $this->view('email.registeruser')->with([
            // 'jenis_permohonan'=>$this->permohonan->jenis_permohonan,
            'name'=>$this->user['name'],
            'email'=>$this->user['email'],
            'link'=>$this->user['link']
            // 'name'=>$this->user->name,
            // 'doc_no'=>$this->user->doc_no,
        ]);
    }
}
