<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Auth;
use Illuminate\Console\Command;
use App\Admin;


class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->ask("Insert the new admin's email: ");
        $password = $this->secret("Insert the new admin's password: ");

        $admin = Admin::create([
            'email' => $email,
            'password' => bcrypt($password)
        ]);

        $success['token'] = $admin->createToken('Admin')->accessToken;
        
        return response()->json(['success'=>$success], 200); 
    }
}
