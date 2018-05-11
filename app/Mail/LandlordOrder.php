<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TableData\Users;

class LandlordOrder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $landlord; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Users $landlord)
    {
        $this->subject('Kalau ini buat landlord');
        $this -> landlord = $landlord;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.LandlordOrder');
    }
}
