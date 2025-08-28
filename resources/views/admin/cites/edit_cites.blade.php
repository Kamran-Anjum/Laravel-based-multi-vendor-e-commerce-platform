@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Cities</a> <a href="#" class="current">Edit Cities</a> </div>
            <h1>Cities</h1>
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
                            <h5>Edit City</h5>
                        </div>

                        <div class="widget-content nopadding">
                            {{--                            {!! $statesDetails !!}--}}
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-city/'.$citiesDetails->id) }}" name="edit_city" id="edit_city" novalidate="novalidate">
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
                                      <input class="form-control form-control-lg" type="text" name="name" id="name" required="" value="{{ $citiesDetails->name }}">
                                  </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Code:</strong></label>
                                    <div class="controls">
                                        <input type="text" name="code" id="code" value="{{ $citiesDetails->code }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label"><strong>Short Name:</strong></label>
                                  <div class="controls">
                                      <input type="text" name="shortName" id="shortName" value="{{ $citiesDetails->shortName }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Country:<span style="color:red;">*</span></strong></label>
                                    <div class="controls">
                                        <select class="country admin_privilege_country_class" name="country_id" id="country_id" required="">
                                            @foreach($countries as $cont)
                                                <option @if($cont->id == $citiesDetails->country_id) selected="true" @endif  value="{{$cont->id}}">{{$cont->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label"><strong>State:<small> (optional)</small></strong></label>
                                  <div class="controls">
                                      <select class="statename"  id="state_id" name="state_id" required="">
                                            <option value="0" selected="true" >--select state--</option>

                                                    @foreach($states as $state)
                                                    <option @if($state->id == $citiesDetails->state_id) selected="true" @endif  value="{{$state->id}}">{{$state->name}}
                                                        </option>
                                                    @endforeach


                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="control-group">
                                  <label class="control-label"><strong>Longitude:</strong></label>
                                  <div class="controls">
                                      <input style="width:50%; height:30px;" type="text" name="long" id="long" value="{{-- $citiesDetails->long --}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                  <label class="control-label"><strong>Lattitude:</strong></label>
                                  <div class="controls">
                                      <input style="width:50%; height:30px;" type="text" name="lat" id="lat" value="{{-- $citiesDetails->lat --}}">
                                    </div>
                                </div> -->
                                <div class="control-group">
                                  <label class="control-label"><strong>Active:</strong></label>
                                  <div class="controls">
                                      <select id="isActive" name="isActive" class="Active">
                                            <option value="0" @if($citiesDetails->isActive == 0) selected="true" @endif > No </option>
                                            <option value="1" @if($citiesDetails->isActive == 1) selected="true" @endif> Yes </option>
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
