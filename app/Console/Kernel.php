<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Project;
use App\User;
use App\Point_transactions;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Thedudeguy\Rcon;
use Carbon\Carbon;
use App\Gift;
Use Log;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
    	$schedule->call(function(){
	        $gift = Gift::find(1);
	        $users = User::has('gifts')->get();
            Log::info("-*-*-AUTO REMOVER TEST-*-*-");
	        Foreach ($users as $user) {
	            $asd = $user->gifts()->wherePivot('gift_id', 1)->first();
	            if ($asd->pivot->username == "") { 
	            	//
	            }else{
	              $now = Carbon::now('Europe/Vilnius')->format('Y-m-d');
	              if ($now == $asd->pivot->until) {
		                $host = '54.36.108.140'; // Server host name or IP
		                $port = 25702;                      // Port rcon is listening on
		                $password = 'salnikas321'; // rcon.password setting set in server.properties
		                $timeout = 3;                       // How long to timeout.

	                	$rcon = new Rcon($host, $port, $password, $timeout);

		                if ($rcon->connect())
		                {
		                    $rcon->sendCommand("lp user ".$asd->pivot->username." parent remove player");
		                	$rcon->sendCommand("lp user ".$asd->pivot->username." parent switchprimarygroup default");
		                    $user->gifts()->detach(1);
		                    Log::info("-*-*-AUTO REMOVER-*-*-");
		                    Log::info($asd->pivot->username." Was removed");
		                    Log::info("-*-*-AUTO REMOVER-*-*-");
		                	// $rcon->sendCommand("broadcast OPA!");
						}
	              } 
	            }

	        }
        
            
        })->dailyAt('23:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
