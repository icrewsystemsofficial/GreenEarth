<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class DeletedRole extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($rolename)
    {
        $this->rolename = $rolename;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = Auth::user();
        $rolename = ucfirst($this->rolename);
        return $this->markdown('emails.deleted_role', compact('user', 'rolename'))
        ->subject($rolename.' role has been deleted, project GREEN EARTH');
    }
}
