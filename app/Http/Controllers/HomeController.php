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
        $transactions = Point_transactions::where('username', $user->name)->get();
        $grouped = $transactions->groupBy('project');
        $grouped->toArray(); 
        Log::info($grouped);
        $projects = Project::all();
        
        return view('home')->with('grouped', $grouped)->with('projects', $projects);
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
            Point_transactions::Create(['project' => $project->display_name, 'username' => $user->name, 'amount' => $request->amount]);
            $user->save();
            $project->save();
            if($project->id == 1) {
                $client = new Client();
                $URI = 'https://visata.tryskubai.lt/whitelist/'. $user->email;
                $params['headers'] = ['Content-Type' => 'application/json'];
                $params['form_params'] = array('Adress' => $user->email);
                $response = $client->post($URI, $params);
            }
            return redirect('/home');
        }else{
            return "Nepakanka taškų";
        }

    }
}
