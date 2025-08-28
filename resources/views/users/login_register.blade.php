@extends('layouts.frontLayout.front_design')
@section('content')
<div>
<div style="padding-top: 30px;padding-bottom: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" style="padding-top: 20px;padding-bottom: 20px;">

              @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{!! session('flash_message_success') !!}</strong>
                </div>
              @endif


                  <h5 style="font-weight:700;">Create Account</h5>
                  <hr style="margin-top: 1rem; margin-bottom: 1rem;  border-top: 2px solid #c452a3;">
                  <p style="color: rgb(157,52,140);">New Member? Register Now!</p>


                <form name="registerForm" id="registerForm" action="{{ url('/user-register') }}" method="post" >
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
                        <div class="form-group col-md-4">
                            <select onchange ="stateSelect(event)" class="form-control country" style="" id="country" name="country" placeholder="Country" required="true">
                                <option value="">Select Country</option>
                                @foreach($country as $countries)
                                    <option value="{{$countries->id}}">{{$countries->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select disabled onchange ="citySelect(event)" class="form-control" style="" name="state" id="state" required="true">
                                <option>Select State</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <select disabled class="form-control" style="" name="city" id="city" placeholder="City" required="true">
                                <option>Select City</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <textarea class="form-control" name="address" id="address" placeholder="Address" rows="2" spellcheck="true" required=""></textarea>
                        </div>
                        <div class="form-group" style="margin-left: 5px;">
                            <button class="btn btn-primary" type="submit" style="border:none; border-radius: 20px; font-size: smaller; background-color: #c452a3 !important;">REGISTER NOW!</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" style="padding-top: 55px;padding-bottom: 55px;background-color: rgba(191,68,158,0.08);">
              @if(Session::has('flash_message_error'))
                  <div class="alert alert-danger alert-block" style="top: 0px; position: absolute; width:95%;">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{!! session('flash_message_error') !!}</strong>
                  </div>
              @endif
                                <!-- @if(Session::has('flash_message_errorlogin'))
                    <div class="alert alert-error alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_errorlogin') !!}</strong>
                    </div>
                @endif -->
                <div class="card text-center" style="margin-right: auto;margin-left: auto;width: 50%;background-color: #ffffff;height: 324px;border-radius: 20px !important;border: 2px solid #c452a3 !important;">
                    <div class="card-body text-center" style="padding-top: 20px;">
                        <i class="icon-lock" style="color: #c452a3;font-size: 65px;"></i>
                        <h1 class="text-uppercase" style="font-size: 17px;color: rgb(191,68,158);">Login</h1>
                        <form id="loginForm" name="loginForm" action="{{ url('/user-login') }}" method="post" style="margin-top: 30px;"> {{ csrf_field() }}
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>

function citySelect(evtc){
//debugger;
var test= evtc.target.value;
//var id= evtc.target.value;
var Cid=$("select.country").children("option:selected").val();
console.log(Cid);
    $('#city').empty()
        $.ajax({
            url: '/city/'+Cid+'/'+test,
            success: data => {
                //debugger;
                var citydd = $("#city").html();
             //   $(citydd).empty();
                console.log(data + citydd);
                $("#city").append('<option value="">Select City</option>');
                for(var option =0; option<data.length; option++)
                {
                var newOption = document.createElement("option");
                newOption.value = data[option]['id'];
                newOption.innerHTML = data[option]['name'];
                //citydd.options.add(newOption);
                $("#city").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
                }
                $("#city").prop("disabled", false);
            }
        })
}


function stateSelect(evt){
debugger;
var test=evt.target.value;
console.log(test);
    $('#state').empty()
        $.ajax({
            url: '/statename/'+test,
            success: data => {
                //debugger;
                var statedd = $("#state").html();
             //   $(citydd).empty();
                console.log(data + statedd);
                $("#state").append('<option value="">Select State</option>');
                for(var option =0; option<data.length; option++)
                {
                var newOption = document.createElement("option");
                newOption.value = data[option]['id'];
                newOption.innerHTML = data[option]['name'];
                //citydd.options.add(newOption);
                $("#state").append('<option value='+data[option].id+'>'+ data[option].name +'</option>');
                }
                $("#state").prop("disabled", false);
                $("#city").prop("disabled", true);
            }
        })
}

</script>
