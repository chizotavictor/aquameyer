@extends('layouts.app')

@section('content')

<!-- /.Right Sidebar-->
<div id="page-wrapper">
    <div class="content">
        <div class="content-header"></div>
        <div class="row">

            <div style="width:100%">
                <h3>Operations information </h3>
            </div>
            <hr>

            <div class="col-lg-10">
            <h4><a href="/manageDeployment"><i class="material-icons">keyboard_return</i> Return back</a></h4>
            @if(Auth::user()->usertype == 'admin')
                <div class="panel" style="padding: 10px;border: 1px solid #AAA">
                    <div class="panel-heading">Upload video</div>
                    <form method="post" action="/upload-information" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" id="drone_code" required class="form-control" name="drone_code" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="deploy_id" required class="form-control" name="deploy_id" />
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="owner_id" required class="form-control" name="owner_id" />
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="https://" required class="form-control" name="upload_video" />
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
                        <video src="{{$key->report_video_link}}" controls>
                          Your browser does not support the video tag.
                        </video>
                    </td>
                    <td>Map</td>

                </tr>
                @endforeach
            </table>
            </div>
        </div>
    </div>
</div>
<script>
    var res = window.location.pathname;
    var o = res.split('/');
    var owner_id = o[o.length - 1],
        deploy_id = o[o.length - 2],
        drone_code = o[o.length - 3];

    document.getElementById('owner_id').value = owner_id + "";
    document.getElementById('deploy_id').value = deploy_id + "";
    document.getElementById('drone_code').value = drone_code + "";
</script>
@endsection
