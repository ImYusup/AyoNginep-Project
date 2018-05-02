<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TableData\Users;

class TenantOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $tenant; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Users $tenant)
    {
        $this->subject('Coba ini buat Tenant');
        $this -> tenant = $tenant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.TenantOrder');
    }
}
