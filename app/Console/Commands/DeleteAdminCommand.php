<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Auth;
use Illuminate\Console\Command;
use App\Admin;

class DeleteAdminCommand extends Command
{
    protected $signature = 'admin:kill';

    protected $description = "Delete an admin's account.";

    public function handle()
    {
        $email = $this->ask("Insert the admin's email address you wish to delete.");
        $account = Admin::where('email', $email)->first();
        $account -> delete();

        if(response()->json(200)){
            $this->comment("It's done.");
        }
    }
}
