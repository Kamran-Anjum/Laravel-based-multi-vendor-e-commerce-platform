<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/frontend_images/lilac2express-logo.png') }}">
        <title>Lilac2xpress</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/backend_css/matrix-login.css') }}" />
        <link href="{{ asset('fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">
        @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
                </div>

        @endif
        @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
                </div>

        @endif

        @if(!empty($check_email))
            <form id="lost_password_form" method="post" class="form-vertical" action="{{ url('admin/lost-password/updated') }}">
                {{ csrf_field() }}
                 <div class="control-group normal_text"> 
                    <h3>
                        <img src="{{ asset('images/backend_images/Logo-Admin-5.png') }}" alt="Logo" />
                    </h3>
                </div>
                <p class="normal_text">Enter your new password.</p>
                <input type="hidden" name="user_id" value="{{ $check_email->id }}">
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                            <input type="email" name="email" disabled="" placeholder="E-mail" value="{{ $check_email->email }}"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                            <input type="password" name="password" placeholder="New Password" id="newPassword"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                            <input type="password" name="Cpassword" placeholder="Confirm Password" id="confirmPassword"/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="{{ url('admin') }}" class="flip-link btn btn-info" id="to-recover">Back To Login</a></span>
                    <span class="pull-right"><input type="submit" value="Update" class="btn btn-success" /></span>
                </div>
            </form>
        @else
            <form id="loginform" method="post" class="form-vertical" action="{{ url('admin/lost-password') }}">
                {{ csrf_field() }}
				 <div class="control-group normal_text"> 
                    <h3>
                        <img src="{{ asset('images/backend_images/Logo-Admin-5.png') }}" alt="Logo" />
                    </h3>
                </div>
                <p class="normal_text">Enter your e-mail address below.</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                            <input type="email" name="email" placeholder="E-mail" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="{{ url('admin') }}" class="flip-link btn btn-info" id="to-recover">Back To Login</a></span>
                    <span class="pull-right"><input type="submit" value="Submit" class="btn btn-success" /></span>
                </div>
            </form>
        @endif

        </div>
        <script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script>
        <script src="{{ asset('js/backend_js/matrix.login.js') }}"></script>
    </body>

</html>
