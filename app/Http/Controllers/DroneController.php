<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\drone;
use App\User;

class DroneController extends Controller
{

    public function addnewDrone(Request $request)
    {
        $owners = User::all();
        return view('add-new-drone')->with(['owners' =>  $owners ]);
    }

    public function viewDrone(Request $request)
    {
        $drones = drone::all();
        return view('view-drones')->with(['drones' =>  $drones ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'drone_code'    =>  'required',
            'drone_specification'   => 'required'
        ]);

        $model = new drone;
        $model->owner_id = $request->owner_id;
        $model->drone_code = $request->drone_code;
        $model->specification = $request->drone_specification;
        $model->raw = 'NILL';
        $model->drone_status = 'Ready';
        $model->save();

        \Session::flash('flash_message', "Drone successfully added!");

        return back();
    }

    public function getOwnerName($id)
    {
        $name = User::where('id', $id)->get()->first();
        return $name->name;
    }
}
