@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">States</a> <a href="#" class="current">Edit State</a> </div>
            <h1>States</h1>
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
                            <h5>Edit State</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-state/'.$statesDetails->id) }}" name="edit_state" id="edit_state" novalidate="novalidate">
                                {{ csrf_field() }}
                                <style>
                                .form-horizontal .control-label {
                                    text-align: left !important;
                                    padding-left: 10px !important;
                                  }
                                </style>
                                <div class="control-group">
                                    <label class="control-label"><strong>Name:<span style="color:red;">*</span></strong></label>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" value="{{ $statesDetails->name }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Code:</strong></label>
                                    <div class="controls">
                                        <input type="text" name="code" id="code" value="{{ $statesDetails->code }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Short Name:</strong></label>
                                    <div class="controls">
                                        <input type="text" name="shortName" id="shortName" value="{{ $statesDetails->shortName }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Country:<span style="color:red;">*</span></strong></label>
                                    <div class="controls">
                                        <select name="country_id" id="country_id">
                                            @foreach($countries as $cont)
                                                <option @if($cont->id == $statesDetails->country_id) selected="true" @endif  value="{{$cont->id}}">{{$cont->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="control-group">
                                    <label class="control-label">Longitude</label>
                                    <div class="controls">
                                        <input type="text" name="long" id="long" value="{{-- $statesDetails->long --}}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Lattitude</label>
                                    <div class="controls">
                                        <input type="text" name="lat" id="lat" value="{{-- $statesDetails->lat --}}">
                                    </div>
                                </div> -->
                                <div class="control-group">
                                    <label class="control-label"><strong>Active:</strong></label>
                                    <div class="controls">
                                        <select id="isActive" name="isActive" class="Active">
                                            <option value="0" @if($statesDetails->isActive == 0) selected="true" @endif > No </option>
                                            <option value="1" @if($statesDetails->isActive == 1) selected="true" @endif> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Edit State" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection