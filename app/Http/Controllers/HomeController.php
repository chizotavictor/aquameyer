<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\drone;

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
        $drones = drone::where('owner_id', \Auth::user()->id)->get();
        $rawDrones = drone::all();
        return view('home')->with(['drones' =>  $drones, 'alldrones' => $rawDrones]);
    }

     
}
