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
                <li>
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
                <h3> Setup Drone Spray Location </h3>
            </div>
            <hr>

            <div class="col-lg-12">
                <div class="panel panel-bd " style="padding:10px">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Setup Spray location</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('error') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('setup-drone-spraylocation')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Owner</label>
                                <select type="text" class="form-control" name="owner_id" >
                                    @foreach ( $owners as $p => $k )
                                        <option value="{{$k->id}}">{{ $k->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Land size</label>
                                <select type="text" class="form-control" name="land_size" >
                                    <option value="5-plots">5 Plots</option>
                                    <option value="10-plots">10 Plots</option>
                                    <option value="1-hectare">1 Hectare</option>
                                    <option value="1.5-hectare">1.5 Hectare</option>
                                    <option value="2-hectare">2 Hectare</option>
                                    <option value="4-hectare">4 Hectare</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input class="form-control" name="location" placeholder="Accra, Kasoa, Kumasi, Obuasi ...."/>
                                @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Location" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
