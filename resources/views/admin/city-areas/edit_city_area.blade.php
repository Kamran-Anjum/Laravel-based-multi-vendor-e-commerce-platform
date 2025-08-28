@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">City Area</a> <a href="#" class="current">Edit City Area</a> </div>
            <h1>City Area</h1>
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
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit City Area</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-city-area/'.$cityareaDetails->id) }}" name="edit_city" id="edit_city" novalidate="novalidate">
                              <style>
                                .form-horizontal .control-label {
                                    text-align: left !important;
                                    padding-left: 10px !important;
                                  }
                                  </style>
                                {{ csrf_field() }}

                                <div class="control-group">
                                  <label class="control-label"><strong>Name:<span style="color:red;">*</span></strong></label>
                                  <div class="controls">
                                      <input class="form-control form-control-lg" type="text" name="name" id="name" required="" value="{{ $cityareaDetails->name }}">
                                  </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Country:<span style="color:red;">*</span></strong></label>
                                    <div class="controls">
                                        <select class="countryname" name="country_id" id="country_id" required="">
                                            @foreach($countries as $cont)
                                                <option @if($cont->id == $cityareaDetails->country_id) selected="true" @endif  value="{{$cont->id}}">{{$cont->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label"><strong>State:</strong></label>
                                  <div class="controls">
                                      <select class="statename"  id="state_id" name="state_id" required="">
                                            <option value="0" selected="true" >--select state--</option>
                                            @foreach($states as $state)
                                            <option @if($state->id == $cityareaDetails->state_id) selected="true" @endif  value="{{$state->id}}">{{$state->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label"><strong>City:</strong></label>
                                  <div class="controls">
                                      <select class="cityname"  id="city_id" name="city_id" required="">
                                            @foreach($cities as $city)
                                            <option @if($city->id == $cityareaDetails->city_id) selected="true" @endif  value="{{$city->id}}">{{$city->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label"><strong>Active:</strong></label>
                                  <div class="controls">
                                      <select id="isActive" name="isActive" class="Active">
                                            <option value="0" @if($cityareaDetails->isActive == 0) selected="true" @endif > No </option>
                                            <option value="1" @if($cityareaDetails->isActive == 1) selected="true" @endif> Yes </option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-actions">
                                    <input type="submit" value="Edit City" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
