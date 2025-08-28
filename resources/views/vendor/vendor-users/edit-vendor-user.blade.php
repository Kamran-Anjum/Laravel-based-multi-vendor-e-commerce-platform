@extends('layouts.vendorLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/vendor/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a style="cursor: default;" href="javascript:void(0)" class="current">Edit Vendor User</a> </div>
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
                            <h5>Edit Vendor User</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/vendor/edit-vendor-user/'.$user->id) }}" name="edit_vendor_user" id="edit_vendor_user" novalidate="novalidate">
                                {{ csrf_field() }}

                                <div class="control-group">
                                    <label class="control-label">First Name*</label>
                                    <div class="controls">
                                        <input type="text" name="first_name" id="first_name" value="{{ $vendoruser->first_name }}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Last Name</label>
                                    <div class="controls">
                                        <input type="text" name="last_name" id="last_name" value="{{ $vendoruser->last_name }}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Email</label>
                                    <div class="controls">
                                        <input type="email" name="email" id="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Contact</label>
                                    <div class="controls">
                                        <input type="number" name="contact" id="contact" value="{{ $vendoruser->contact }}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Image</label>
                                    <div class="controls">
                                        <input name="image" id="image" type="file">
                                        <input type="hidden" name="current_image" value="{{ $vendoruser->image }}">
                                        @if(!empty( $vendoruser->image ))
                                            <img style="width:50px;" src="{{ asset('/images/backend_images/vendor_users/small/'.$vendoruser->image) }}">
                                        @endif
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <textarea class="form-control" rows="3" id="address" name="address">{{ $vendoruser->address }}</textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Active</label>
                                    <div class="controls">
                                        <select id="isActive" name="isActive" class="Active">
                                            <option value="0" @if($user->isActive == 0) selected="true" @endif > No </option>
                                            <option value="1" @if($user->isActive == 1) selected="true" @endif> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Edit Vendor User" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection