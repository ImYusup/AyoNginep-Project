<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Auth;
use Illuminate\Console\Command;
use App\Admin;


class CreateAdminCommand extends Command
{
    protected $signature = 'admin:create';

    protected $description = "Create an admin's account.";

    public function handle()
    {
        $email = $this->ask("Insert the new admin's email: ");
        $password = $this->secret("Insert the new admin's password: ");

        $admin = Admin::create([
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        $success['token'] = $admin->createToken('Admin')->accessToken;
        
        $this->comment(response()->json($success, 200));
    }
}
