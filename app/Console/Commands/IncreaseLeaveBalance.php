<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Parametre;

class IncreaseLeaveBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
     * @return int
     */
    public function handle()
    {
        $parametre= Parametre::all()->first();
        $users=User::all();  
        foreach ($users as $user){
                $user->leave_balance=$user->leave_balance +$parametre->rate_leave_balance;
                $user->save();
               

        }
    }
}
