<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AddSuper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:super {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add super admin';

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
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');

        $existUser = User::where('email',$email)->first();
        
        if(  $existUser ) {
            $existUser->role_id = SUPERADMIN;
            $existUser->save();
            $this->info('this user become super admin now');
        } else {
            $this->warn('please enter exist user');
        }
    }
}
