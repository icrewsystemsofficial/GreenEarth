<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class UpdatedRole extends Mailable
{
    use Queueable, SerializesModels;

    public $role;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($role)
    {
        $this->role = $role;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = Auth::user();
        $role = ucfirst($this->role);
        return $this->markdown('emails.updated_role', compact('user', 'role'))
        ->subject($role.' role has been edited, project GREEN EARTH');
    }
}
