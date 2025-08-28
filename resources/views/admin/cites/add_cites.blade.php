@extends('layouts.adminLayout.admin_design')
@section('content')


    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Cites
                </a> <a href="#" class="current">Add City</a> </div>
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
                            <h5>Add City</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-city') }}" name="add_city" id="add_city" novalidate="novalidate">
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
                                        <input type="text" name="name" id="name">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Code:</strong></label>
                                    <div class="controls">
                                        <input type="text" name="code" id="code">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Short Name:</strong></label>
                                    <div class="controls">
                                        <input type="text" name="shortName" id="shortName">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Country:<span style="color:red;">*</span></strong></label>
                                    <div class="controls">
                                        <select class="country admin_privilege_country_class" name="country_id" id="country_id">
                                            <option value="0" disabled="true" selected="true" >--select country--</option>
                                            @foreach($countries as $cont)
                                                <option value="{{$cont->id}}">{{$cont->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>State:<small> (optional)</small></strong></label>
                                    <div class="controls">
                                        <select class="statename"  id="state_id" name="state_id">
                                            <option value="" disabled="false" selected="true" >--select state--</option>

                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="control-group">
                                    <label class="control-label"><strong>Latitude:</strong></label>
                                    <div class="controls">
                                        <input style="width:50%; height:30px;" type="text" name="lat" id="lat">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Longitude:</strong></label>
                                    <div class="controls">
                                        <input style="width:50%; height:30px;" type="text" name="long" id="long">
                                    </div>
                                </div> -->
                                <div class="control-group">
                                    <label class="control-label"><strong>Active:</strong></label>
                                    <div class="controls">
                                       <select id="isActive" name="isActive" class="Active">
                                           <option value="0" selected="true"> No </option>
                                           <option value="1" selected="true"> Yes </option>
                                       </select>
                                    </div>
                                </div>



                                <div class="form-actions">
                                    <input type="submit" value="Add City" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        </div>
@endsection
