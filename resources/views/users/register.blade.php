@extends('layouts.frontLayout.front_design')
@section('content')
<div>
<div style="padding-top: 30px;padding-bottom: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-top: 20px;padding-bottom: 20px;">

                @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{!! session('flash_message_success') !!}</strong>
                </div>
                @endif


                  <h5 style="font-weight:700;">Create Account</h5>
                  <hr style="margin-top: 1rem; margin-bottom: 1rem;  border-top: 2px solid #c452a3;">
                  <p style="color: rgb(157,52,140);">New Member? Register Now!</p>


                <form name="registerForm" id="registerForm" action="{{ url('/register') }}" method="post" >
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input class="form-control" type="text" name="fname" id="fname" placeholder="First Name" required="" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" type="text" name="lname" id="lname" placeholder="Last Name" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input class="form-control" type="text" placeholder="Username" id="username" name="username">
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" type="text" name="cell" id="cell" placeholder="Cell e.g: 00923451122334" required="" inputmode="tel" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input class="form-control" type="text" name="email" id="email" placeholder="Email" required="" inputmode="email" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" type="password" placeholder="Password" id="myPassword" name="password1" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select class="form-control country_class" style="" id="country_id" name="country_id" placeholder="Country" required="true">
                                {!! $countries_dropdown !!}
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control" name="city_id" id="city_id" placeholder="City" required="true">
                                <option>Select City</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea class="form-control" name="address" id="address" placeholder="Address" rows="5" spellcheck="true" required=""></textarea>
                        </div>
                        <div class="form-group" style="margin-left: 5px;">
                            <button class="btn btn-primary" type="submit" style="border:none; border-radius: 20px; font-size: smaller; background-color: #c452a3 !important;">REGISTER NOW!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


