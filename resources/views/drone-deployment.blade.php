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
                <h3> Drone deployment setup </h3>
            </div>
            <hr>

            <div class="col-lg-12">
                <div class="panel panel-bd " style="padding:10px">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Deployment Setup</h4>
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
                        <form action="/droneDeployment" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select owner</label>
                                <select required class="form-control" name="owner_id" onchange="javascript:handleSelect(this)">
                                    @foreach ( $owners as $p => $k )
                                        <option value="{{$k->id}}">{{ $k->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Select drone</label>
                                <select required type="text" class="form-control" name="drone_code">
                                    @foreach ( $drones as $p => $k )
                                        <option value="{{$k->drone_code}}">{{$k->drone_code}} - <b>{{$k->drone_status}}</b> </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select location</label>
                                <select required type="text" class="form-control" name="location" >
                                    @foreach ( $locations as $p => $k )
                                        <option value="{{$k->location}}">{{ $k->location }} -  <b>{{$k->land_size}}</b> </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Deploy" />
                                <a href="/droneDeployment"class="btn btn-default">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function handleSelect(elm)
{
window.location = "/droneDeployment?own_id="+elm.value;
}
</script>
@endsection
