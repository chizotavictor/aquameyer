<?php

namespace App\Http\Controllers;

use App\SprayLocation;
use Illuminate\Http\Request;

class SprayController extends Controller
{
    public function addSprayLocation(Request $request)
    {
        $this->validate($request, [
            'location'  =>  'required',
            'owner_id'  =>  'required|int',
            'land_size' =>  'required'
        ]);

        $model = new SprayLocation;
        $model->owner_id = $request->owner_id;
        $model->location = $request->location;
        $model->land_size = $request->land_size;
        $model->raw = 'NILL';

        if ($model->save())
        {
            \Session::flash('success', "Location successfully added!");
        }else{
            \Session::flash('error', "Error occured while adding new location!");
        }

        return redirect()->back();
    }
}
