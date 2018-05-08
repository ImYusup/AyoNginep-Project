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
        $email = $this->ask("Insert the admin's email address you wish to delete: ");
        $confirmation = $this->ask("Are You Sure? (Y/N)");
        $confirmation = strtolower($confirmation);

        if ($confirmation === 'y'){
            $admin = Admin::where('email', $email);
            if ($admin) {
                $admin -> delete();
                $this->comment("It's done.");
            } else {
                $this->comment("Invalid email address.");                
            }
        } else {
            $this->comment("You cancelled the admin's account deletion.");            
        }
    }
}
