@extends('layouts.app')

@section('content')
<div class="sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-heading"></li>
            <li><a class="material-ripple" href="/home"><i class="material-icons">home</i> Dashboard</a></li>
            @if (Auth::user()->usertype == 'admin')
                <li class="active">
                    <a class="material-ripple" href="#"><i class="material-icons">bubble_chart</i> Operations Manager<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li><a href="/spraylocation">Setup Spraying Location</a></li>
                    <li><a href="/droneDeployment">Drone Deployment Setup</a></li>
                    <li><a href="/manageDeployment">Manage Deployment</a></li>
                    </ul>
                </li>
                <li >
                    <a class="material-ripple" href="#"><i class="material-icons">bubble_chart</i> Drone Setup<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li><a href="/addnewdrone">Setup New Drone</a></li>
                    <li><a href="/manageclientdrone">Manage Client Drone</a></li>
                    </ul>
                </li>
                <li>
                    <a class="material-ripple" href="#"><i class="material-icons">bubble_chart</i> Manage Client<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li><a href="#">Browse Client List</a></li>
                    </ul>
                </li>
                <li>
                    <a class="material-ripple" href="#"><i class="material-icons">bubble_chart</i> User Account Setup<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li><a href="#">Setup New User Account</a></li>
                    </ul>
                </li>
            @else

            @endif

        </ul>
    </div>
    <!-- /.sidebar-collapse-->
</div>

<!-- /.Right Sidebar-->
<div id="page-wrapper">
    <div class="content">
        <div class="content-header"></div>
        <div class="row">
            <div style="width:100%">
                <h3> Manage Deployments </h3>
            </div>
            <hr>

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif


            @if (count($deploys) > 0)
                <div class="col-lg-12">
                    <div class="panel panel-bd " style="padding:10px">

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" style="font-family:courier">
                                    <thead>
                                        <tr>
                                            <th>Owner</th>
                                            <th>Drone code</th>
                                            <th>location</th>
                                            <th>Information</th>
                                            <th><center>Termination</center></th>
                                            <th>Last deployment</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deploys as $k)
                                            <tr>
                                                <td>{{App::make("App\Http\Controllers\DroneController")->getOwnerName( $k->owner_id ) }}</td>
                                                <td>{{ $k->drone_code }}</td>
                                                <td>{{ $k->location }}</td>
                                                <td> <a href="/deployment-information/{{ $k->drone_code }}/{{$k->id}}/{{$k->owner_id }}"target="_blank">view info</a> </td>
                                                <td><center><a href="deployed/terminate/{{$k->id}}/{{$k->drone_code}}"><img src="images/reset.png"  alt=""></a></center></td>
                                                <td>{{$k->updated_at->diffForHumans()}}</td>
                                             </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h3>Sorry! No record of on-going deployments is found in our system</h3>
            @endif

        </div>
    </div>
</div>
@endsection
