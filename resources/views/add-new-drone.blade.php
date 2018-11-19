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
                <h3> Setup new Drone </h3>
            </div>
            <hr>

            <div class="col-lg-12">
                <div class="panel panel-bd " style="padding:10px">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Add new Drone</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p style="color:green">Add newly purchased drone alongside the owner identity; this will automatically reference the drone information to the owner.</p>
                        @if (Session::has('flash_message'))
                            <div class="alert alert-success" style="font-weight:bold">{{Session::get('flash_message')}}</div>
                        @endif
                        <form action="/addnewdrone" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select owner</label>
                                <select type="text" class="form-control" name="owner_id" >
                                    @foreach ( $owners as $p => $k )
                                        <option value="{{$k->id}}">{{ $k->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Drone Code</label>
                                <input type="text" class="form-control" name="drone_code" aria-describedby="drone_code" placeholder="Enter Drone code">
                                @if ($errors->has('drone_code'))
                                    <span style="color: red" role="alert">
                                        <strong>{{ $errors->first('drone_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="drone_specification">Drone specification</label>
                                <textarea class="form-control" name="drone_specification" placeholder="Drone specification ...."></textarea>
                                @if ($errors->has('drone_specification'))
                                    <span style="color: red" role="alert">
                                        <strong>{{ $errors->first('drone_specification') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Drone" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
