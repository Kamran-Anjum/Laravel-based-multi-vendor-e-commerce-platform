@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a style="cursor: default;" href="javascript:void(0)" class="current">Add Privilege</a> </div>
            <h1>Privilege</h1>
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
            <h1>
                <div class="button-group">
                    <a href="{{ url('admin/view-sub-admin-privileges/'.$userid) }}"><button style="margin-top: -45px" type="button" class="btn btn-mini waves-effect waves-light btn-info">&#60; Back</button></a>
                </div>
            </h1>
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Add Privilege</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/create-sub-admin-privilege/'.$userid) }}" name="add_sub_admin_privilege" id="add_sub_admin_privilege" novalidate="novalidate">
                                {{ csrf_field() }}

                                <div class="control-group">
                                    <label class="control-label">Country<span class="alert-danger">*</span></label>
                                    <div class="controls">
                                        <input type="hidden" name="user_id" value="{{$userid}}">
                                        <select class="select2 form-control custom-select admin_privilege_country_class" name="country_id" id="country_id">
                                            {!! $countries_dropdown !!}
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">City<span class="alert-danger">*</span></label>
                                    <div class="controls">
                                        <select name="city_id" id="city_id">
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Chat Supports</label>
                                    <div class="controls">
                                        <select id="isChat" name="isChat" class="Active">
                                            <option value="0"> No </option>
                                            <option value="1" selected="true"> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Products Setup</label>
                                    <div class="controls">
                                        <select id="isProduct" name="isProduct" class="Active">
                                            <option value="0"> No </option>
                                            <option value="1" selected="true"> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Orders Setup</label>
                                    <div class="controls">
                                        <select id="isOrder" name="isOrder" class="Active">
                                            <option value="0"> No </option>
                                            <option value="1" selected="true"> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Vendors Setup</label>
                                    <div class="controls">
                                        <select id="isVendor" name="isVendor" class="Active">
                                            <option value="0"> No </option>
                                            <option value="1" selected="true"> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Add Privilege" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection