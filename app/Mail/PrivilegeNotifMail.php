<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PrivilegeNotifMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $privilege;
    private $master;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $privilege
     */
    public function __construct($user, $privilege, $master)
    {
        $this->user = $user;
        $this->privilege = $privilege;
        $this->master = $master;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Group Privilege Notification')
                    ->view('emails.privilegenotif') // Specify the correct path to your mail view
                    ->with([
                        'user' => $this->user,
                        'privilege' => $this->privilege,
                        'master' => $this->master
                    ]);
    }
    
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
