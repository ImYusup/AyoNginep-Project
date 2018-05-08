<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Auth;
use Illuminate\Console\Command;
use App\Admin;


class CreateAdminCommand extends Command
{
    protected $signature = 'admin:create';

    protected $description = "Create a new admin's account.";

    public function handle()
    {
        $email = $this->ask("Insert the new admin's email: ");
        $password = $this->secret("Insert the new admin's password: ");
        $c_password = $this->secret("Type the password again: ");

        if ($password === $c_password) {
            $admin = Admin::create([
                'email' => $email,
                'password' => bcrypt($password)
            ]);

            $success['token'] = $admin->createToken('Admin')->accessToken;
            
            if ($success){
                $this->comment("You're successfully added new admin account.");
            }
        } else {
            $this->comment("Your Password is invalid.");
        }
    }
}