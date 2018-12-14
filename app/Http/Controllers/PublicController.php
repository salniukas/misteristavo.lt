<?php

namespace App\Http\Controllers;

Use Log;
use Auth;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Thedudeguy\Rcon;
use Carbon\Carbon;
use App\Gift;
use Illuminate\Http\Request;
use App\Project;
use App\User;
use App\Point_transactions;

class PublicController extends Controller
{
    public function main()
    {

        $project = Project::where('id', 2)->first();
        return view('welcome')->with('project', $project);
    }

    public function membership()
    {
    		$gift = Gift::find(1);
	        $users = User::has('gifts')->get();
	        foreach ($users as $user) {
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
	        return redirect('/');
        
            
        
    }
}
