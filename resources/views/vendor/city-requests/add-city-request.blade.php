@extends('layouts.vendorLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">City Request</a> <a href="#" class="current">Add City Request</a> </div>
            <h1>Orders</h1>
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
                            <h5>Add City Request</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/vendor/add-city-request') }}" name="add_city_request" id="add_city_request" novalidate="novalidate">
                                {{ csrf_field() }}
                                <div class="control-group">
                                  <label class="control-label"><strong>Country<span style="color:red;">*</span></strong></label>
                                  <div class="controls">
                                    <select class="ven_privilege_country_class" name="country_id" id="en_country_id">
                                      {!! $countries_dropdown !!}
                                    </select>
                                  </div>
                                </div>

                                <div class="control-group">
                                  <label class="control-label"><strong>City<span style="color:red;">*</span></strong></label>
                                  <div class="controls">
                                    <select name="city_id" id="city_id"></select>
                                  </div>
                                </div>

                                <div class="control-group">
                                  <label class="control-label"><strong>Reason</strong></label>
                                  <div class="controls">
                                    <textarea name="reason" id="reason"></textarea>
                                  </div>
                                </div>


                                <div class="form-actions">
                                    <input type="submit" value="Add City Request" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection