<?php

namespace App\Http\Controllers;

Use Log;


use Illuminate\Http\Request;
use App\Project;
use Auth;
use App\User;
use App\Point_transactions;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Thedudeguy\Rcon;
use Carbon\Carbon;
use App\Gift;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();
        $transactions = Point_transactions::where('username', $user->id)->get();
        $grouped = $transactions->groupBy('project')->take(5);
        $grouped->toArray(); 
        $projects = Project::all();
        $gifts = Auth::user()->gifts()->orderBy('created_at', 'DESC')->get()->take(5);
        return view('home')->with('grouped', $grouped)->with('projects', $projects)->with('gifts', $gifts);
    }

    public function donate(Request $request)
    {
        $user = Auth::user();
        $project = Project::where('id', $request->project_id)->first();
        $amount = $request->amount;
        $current = $project->current;
        $this->validate(request(), [
            'amount' => 'required',
            'username' => 'required',
            'project_id' => 'required',
        ]);
        if ($user->points >= $amount) {
            $user->points = $user->points - $amount;
            $project->current = $current + $amount;
            Point_transactions::Create(['project' => $project->display_name, 'username' => $user->id, 'amount' => $request->amount]);
            $user->save();
            $project->save();
            if ($project->id === 1 && $amount >= 3) {
                $giftID = 1;
                $user->gifts()->attach($giftID);
            }
            return redirect('/home');
        }else{
            return "Nepakanka taškų";
        }

    }
    public function redeem(Request $request)
    {
        $pivo = Auth::user()->gifts()->wherePivot('id', $request->id)->first()->pivot->isUsed;
        log::info($pivo);
        if ($pivo === 1) {
            return "Dovana jau aktyvuota";
        }else{
            $host = '54.36.108.140'; // Server host name or IP
            $port = 25702;                      // Port rcon is listening on
            $password = 'salnikas321'; // rcon.password setting set in server.properties
            $timeout = 3;                       // How long to timeout.

            $rcon = new Rcon($host, $port, $password, $timeout);

            if ($rcon->connect())
            {
                    $rcon->sendCommand("lp user ".$request->name." parent switchprimarygroup player");
                    $piva = Auth::user()->gifts()->wherePivot('id', $request->id)->first()->pivot;

                    $piva->isUsed = 1;
                    $piva->until = Carbon::now('Europe/Vilnius')->addMonth()->format('Y-m-d'); 
                    $piva->username = $request->name;
                    $piva->save();
                    return redirect('/');

            }else{
                return 500;
            }
    }

    }
}
