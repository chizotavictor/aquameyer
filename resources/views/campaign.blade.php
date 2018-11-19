@extends('layouts.app')

@section('content')

<!-- /.Right Sidebar-->
<div id="page-wrapper">
    <div class="content">
        <div class="content-header"></div>
        <div class="row">

            <div style="width:100%">
                <h3>Drone Deployments </h3>
            </div>
            <hr>

            <div class="col-lg-10">
            <h4><a href="/home"><i class="material-icons">keyboard_return</i> Return back</a></h4>
            @if(Auth::user()->usertype == 'admin')
                <div class="panel" style="padding: 10px;border: 1px solid #AAA">
                    <div class="panel-heading">Upload video</div>
                    <form method="post" action="/add-campaign" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <select id="location" placeholder="Region: (Should be the same as the url)" required class="form-control" name="location">  
                                <option value="upper-east">upper-east</option>
                                <option value="upper-west">upper-west</option>
                                <option value="asanti">asanti</option>
                                <option value="greater-accra">greater accra</option>
                                <option value="central-region">central region</option>
                                <option value="eastern-region">eastern region</option>
                                <option value="western-region">western region</option>
                                <option value="brong-ahafo">Brong Ahafo</option>
                                <option value="northern-region">northern region</option>
                                <option value="volta">Volta</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="https://" required class="form-control" name="upload_video" />
                        </div>
                        <div class="form-group">
                            <textarea type="text" placeholder="Description ... " required class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Upload" />
                        </div>
                    </form>
                </div>
            @endif


            <table class="table">
                @foreach ($deploys as $key)
                <tr>
                    <td>
                        <h4>{{$key->description}}</h4>
                        <video class="center-block" src="{{$key->video_link}}" width="500" controls>
                          Your browser does not support the video tag.
                        </video>
                    </td>
                </tr>
                @endforeach
            </table>
            </div>
        </div>
    </div>
</div>

@endsection
