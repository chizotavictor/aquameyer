<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SprayLocation;
use App\drone;
use App\DroneDeployment;

class DeploymentController extends Controller
{
    public function index(Request $request)
    {
        $owners = User::all();
        return view('setup-spray-location')->with(['owners' =>  $owners ]);
    }

    public function loadDeployView(Request $request)
    {
        $owners = User::all();
        $locations = [];
        $drones = [];
        $selected = null;

        if (isset($request->own_id)) {
            $owners = User::where('id', $request->own_id)->get();
            $locations = SprayLocation::where('owner_id', $request->own_id)->get();
            $drones = drone::where('owner_id', $request->own_id)->get();
        }
        return view('drone-deployment')->with([
            'owners' =>  $owners,
            'locations' => $locations,
            'drones' => $drones,
        ]);
    }

    public function setDeployment(Request $request)
    {
        $this->validate($request, [
            'owner_id'  =>  'required|int',
            'drone_code'    =>  'required',
            'location'  =>  'required'
        ]);

        $deployer = new DroneDeployment;
        $deployer->owner_id = $request->owner_id;
        $deployer->drone_code = $request->drone_code;
        $deployer->location = $request->location;
        $deployer->raw = 'NILL';

        if ($deployer->save())
        {
            // set the drone to running..
            drone::where('drone_code', $request->drone_code)->update(['drone_status' => 'Running']);
            \Session::flash('success', "Deployment set successfully!");
        }else{
            \Session::flash('error', "Error occured while initiating deployment!");
        }

        return redirect()->back();
    }

    public function manageDeployment(Request $request)
    {
        $deploys = DroneDeployment::all();
        return view('manage-deployment')->with(['deploys' => $deploys]);
    }

    public function terminateDeployment($owner_id, $drone_code)
    {
        drone::where('drone_code', $drone_code)->where('owner_id', $owner_id)->update(['drone_status' => 'Ready']);
        \Session::flash('success', $drone_code . " session terminated successfully!");
        return redirect()->back();
    }
}
