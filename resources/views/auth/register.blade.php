


<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="shortcut icon" href="/assets/dist/img/ico/favicon.png" type="image/x-icon">
    <script src="/assets/webfont/1.6.26/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i', 'Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i', 'Open Sans']
            }
        });
    </script>
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css">
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/dist/css/component_ui.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/dist/css/custom.css" rel="stylesheet" type="text/css">
</head>
<div class="login-wrapper">
    <div class="container-center">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon"><i class="pe-7s-unlock"></i></div>
                    <div class="header-title">
                        <h3>Register</h3><br><small><strong>.</strong></small></div>
                </div>
            </div>
            <div class="panel-body">
                <form id="loginForm" method="POST" action="{{ route('register') }}" >
                    @csrf
                    <div class="form-group">
                        <label class="control-label">Fullname</label>
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus><span class="help-block small"> </span>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif   
                    </div>

                    <div class="form-group">
                        <label class="control-label">E-mail</label>
                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus><span class="help-block small"> </span>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif   
                    </div>

                    {{-- <div class="form-group">
                        <label class="control-label">Phone Number</label>
                        <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" required ><span class="help-block small"> </span>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div> --}}
                       
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required ><span class="help-block small"> </span>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required ><span class="help-block small"> </span>
                    </div>
                    <div><input class="btn btn-success pull-right" type="submit" value="Register"></div>
                </form>
            </div>
        </div>
        {{-- <div id="bottom_text">Don&apos;t have an account? <a href="/signup">Sign Up</a><br> Remind <a href="#">Password</a></div> --}}
    </div>
</div>
<script src="assets/plugins/jQuery/jquery-1.12.4.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
