<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeploymentInformation;

class DeploymentInformationController extends Controller
{
    public function viewDeploymentInfo($drone_code, $deploy_id, $owner_id)
    {

        return view('view-information-deployment')->with(['deploys' => DeploymentInformation::all()]);
    }

    public function uploadinfo(Request $request)
    {
        // $this->validate($request, [
        //     'owner_id'          =>  'required',
        //     'deploy_id'         =>  'required',
        //     'drone_code'        =>  'required',
        //     'upload_video'      =>  'required|file'
        // ]);

        // $video_name = time() . '_' . $request->drone_code;
        // $request->upload_video->move(public_path('reports'), $video_name);

        $model = new DeploymentInformation;
        $model->owner_id = $request->owner_id;
        $model->deploy_id = $request->deploy_id;
        $model->drone_code = $request->drone_code;
        $model->report_video_link = $request->upload_video; //$video_name;
        $model->raw = 'NILL';
        $model->save();

        return redirect()->back();

    }
}
