<?php

namespace App\Http\Controllers;

Use Log;


use Illuminate\Http\Request;
use App\Project;
use Auth;
use App\User;
use App\Point_transactions;

class PublicController extends Controller
{
    public function main()
    {

        $projects = Project::All();
        return view('welcome')->with('projects', $projects);
    }
}
