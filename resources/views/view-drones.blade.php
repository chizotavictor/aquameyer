@extends('layouts.app')

@section('content')
<div class="sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-heading"></li>
            <li><a class="material-ripple" href="/home"><i class="material-icons">home</i> Dashboard</a></li>
            @if (Auth::user()->usertype == 'admin')
                <li>
                    <a class="material-ripple" href="#"><i class="material-icons">bubble_chart</i> Operations Manager<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                    <li><a href="/spraylocation">Setup Spraying Location</a></li>
                    <li><a href="/droneDeployment">Drone Deployment Setup</a></li>
                    <li><a href="/manageDeployment">Manage Deployment</a></li>
                    </ul>
                </li>
                <li class="active">
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
                <h3> Manage Drones </h3>
            </div>
            <hr>


            @if (count($drones) > 0)
                <div class="col-lg-12">
                    <div class="panel panel-bd " style="padding:10px">

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" style="font-family:courier">
                                    <thead>
                                        <tr>
                                            <th>Drone Code</th>
                                            <th>Drone Status</th>
                                            <th>Specification</th>
                                            <th>Owner</th>
                                            <th><center>Delete</center></th>
                                            <th><center>Reset Status</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($drones as $k)
                                            @if ($k->drone_status == 'Ready')
                                            <tr style="background:green; color:white">
                                                <td>{{ $k->drone_code }}</td>
                                                <td>{{ $k->drone_status }}</td>
                                                <td>{{ $k->specification}}</td>
                                                <td> {{ App::make("App\Http\Controllers\DroneController")->getOwnerName( $k->owner_id ) }}</td>
                                                <td><center><img src="images/trash-bin.png" style="width:20px" alt=""></center></td>
                                                <td><center><img src="images/reset.png"  alt=""></center></td>
                                            </tr>
                                            @elseif($k->drone_status == 'Running')
                                            <tr style="background:yellow">
                                                <td>{{ $k->drone_code }}</td>
                                                <td>{{ $k->drone_status }}</td>
                                                <td> {{ $k->specification }}</td>
                                                <td> {{ App::make("App\Http\Controllers\DroneController")->getOwnerName( $k->owner_id ) }}</td>
                                                <td><center><img src="images/trash-bin.png" style="width:20px" alt=""></center></td>
                                                <td><center><img src="images/reset.png"  alt=""></center></td>
                                            </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h3>Sorry! No record of drone is found in our system</h3>
            @endif

        </div>
    </div>
</div>
@endsection
