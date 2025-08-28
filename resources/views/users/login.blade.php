@extends('layouts.frontLayout.front_design')
@section('content')
<div>
<div style="padding-top: 30px;padding-bottom: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-top: 55px;padding-bottom: 55px;background-color: rgba(191,68,158,0.08);">
                @if(Session::has('flash_message_error'))
                  <div class="alert alert-danger alert-block" style="top: 0px; position: absolute; width:95%;">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{!! session('flash_message_error') !!}</strong>
                  </div>
                @endif
                <div class="card text-center" style="margin-right: auto;margin-left: auto;width: 50%;background-color: #ffffff;height: 324px;border-radius: 20px !important;border: 2px solid #c452a3 !important;">
                    <div class="card-body text-center" style="padding-top: 20px;">
                        <i class="icon-lock" style="color: #c452a3;font-size: 65px;"></i>
                        <h1 class="text-uppercase" style="font-size: 17px;color: rgb(191,68,158);">Login</h1>
                        <form id="loginForm" name="loginForm" action="{{ url('/login') }}" method="post" style="margin-top: 30px;"> {{ csrf_field() }}
                            <div class="form-group"><!-- <input class="form-control" type="text" placeholder="Username" name="username"> -->
                                <input class="form-control" type="text" name="email" id="email" placeholder="Email" required="yes" inputmode="email">
                            </div>
                            <div class="form-group"><!-- <input class="form-control" type="password" placeholder="Password" name="login-pass"> -->
                                <input class="form-control" type="password" placeholder="Password" id="loginPassword" name="password" required="yes">
                                <p class="text-right">
                                    <a href="password/reset" style="color: rgb(98,36,86);">Forgot &nbsp;Password?</a>
                                </p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm" type="submit" style="background-color: #c452a3;border: none;border-radius: 20px;padding-left:20px;padding-right: 20px;font-size: smaller;">SIGN IN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


