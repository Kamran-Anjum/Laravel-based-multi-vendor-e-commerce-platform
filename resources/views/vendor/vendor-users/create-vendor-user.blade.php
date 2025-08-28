@extends('layouts.vendorLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/vendor/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a style="cursor: default;" href="javascript:void(0)" class="current">Add Vendor User</a> </div>
            <h1>Vendor User</h1>
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
                            <h5>Add Vendor User</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/vendor/create-vendor-user') }}" name="add_vendor_user" id="add_vendor_user" novalidate="novalidate">
                                {{ csrf_field() }}

                                <div class="control-group">
                                    <label class="control-label">First Name*</label>
                                    <div class="controls">
                                        <input type="text" name="first_name" id="first_name">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Last Name</label>
                                    <div class="controls">
                                        <input type="text" name="last_name" id="last_name">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input type="email" name="email" id="email">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                        <input type="password" name="password" id="password">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Confirm Password</label>
                                    <div class="controls">
                                        <input type="password" name="cpassword" id="cpassword">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Contact</label>
                                    <div class="controls">
                                        <input type="number" name="contact" id="contact">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="image">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <textarea class="form-control" rows="3" id="address" name="address"></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Active</label>
                                    <div class="controls">
                                        <select id="isActive" name="isActive" class="Active">
                                            <option value="0"> No </option>
                                            <option value="1" selected="true"> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                                    <h5>Add Privilege</h5>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Country<span class="alert-danger">*</span></label>
                                    <div class="controls">
                                        <select class="select2 form-control custom-select ven_user_privilege_country_class" name="country_id" id="country_id">
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
                                    <label class="control-label">Accounts Setup</label>
                                    <div class="controls">
                                        <select id="isAccount" name="isAccount" class="Active">
                                            <option value="0"> No </option>
                                            <option value="1" selected="true"> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Add Vendor User" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection