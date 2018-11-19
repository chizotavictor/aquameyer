<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SprayCampaign;

class CampaignController extends Controller
{
    public function index($region, Request $request)
    {
        $model = SprayCampaign::where('location', $region)->orderBy('id', 'DESC')->get();
        return view('campaign')->with(['deploys' => $model ]);
    }

    public function addCampaign(Request $request)
    {
        // return $request;
        $model = new SprayCampaign;
        $model->location = $request->location;
        $model->video_link = $request->upload_video;
        $model->type = 'NILL';
        $model->description = $request->description;
        $model->raw = 'NILL';

        if ($model->save())
        {
            // set the drone to running..
            \Session::flash('success', "Deployment set successfully!");
        }else{
            \Session::flash('error', "Error occured while initiating deployment!");
        }

        return redirect()->back();
    
    }
}
