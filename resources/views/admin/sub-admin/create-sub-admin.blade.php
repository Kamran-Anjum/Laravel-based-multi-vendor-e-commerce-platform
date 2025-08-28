@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a style="cursor: default;" href="javascript:void(0)" class="current">Add Sub Admin</a> </div>
            <h1>Sub Admin</h1>
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
                            <h5>Add Sub Admin</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/create-sub-admin') }}" name="add_sub_admin" id="add_sub_admin" novalidate="novalidate">
                                {{ csrf_field() }}

                                <div class="control-group">
                                    <label class="control-label">First Name*</label>
                                    <div class="controls">
                                        <input type="text" name="first_name" id="first_name" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Last Name</label>
                                    <div class="controls">
                                        <input type="text" name="last_name" id="last_name" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input type="email" name="email" id="email" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                        <input type="password" name="password" id="password" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Confirm Password</label>
                                    <div class="controls">
                                        <input type="password" name="cpassword" id="cpassword" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Contact</label>
                                    <div class="controls">
                                        <input type="number" name="contact" id="contact" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input type="file" name="image" required=""><strong><small> (Just JPG/JPEG/PNG Allowed)</small></strong>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <textarea class="form-control" rows="3" id="address" name="address" ></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Active</label>
                                    <div class="controls">
                                        <select id="isActive" name="isActive" class="Active" required="">
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
                                        <select class="select2 form-control custom-select admin_privilege_country_class" name="country_id" id="country_id" required="">
                                            {!! $countries_dropdown !!}
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">City<span class="alert-danger">*</span></label>
                                    <div class="controls">
                                        <select name="city_id" id="city_id" required="">
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
                                    <input type="submit" value="Add Sub Admin" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection