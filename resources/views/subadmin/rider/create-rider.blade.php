@extends('layouts.subadminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/subadmin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a style="cursor: default;" href="javascript:void(0)" class="current">Add Rider</a> </div>
            <h1>Add Rider</h1>
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
                            <h5>Add Rider</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/subadmin/create-rider') }}" name="add_sub_admin" id="add_sub_admin" novalidate="novalidate">
                                {{ csrf_field() }}

                                <div class="control-group">
                                    <label class="control-label">Name<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Date Of Birth<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="date" name="d_o_b" id="d_o_b" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Email<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="email" name="email" id="email" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Password<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="password" name="password" id="password" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Confirm Password<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="password" name="cpassword" id="cpassword" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Contact 1<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="number" name="contact_1" id="contact_1" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Contact 2</label>
                                    <div class="controls">
                                        <input type="number" name="contact_2" id="contact_2">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Nationality<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="nationality" id="nationality" required="">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">Rider Image<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="file" name="image" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Rider ID Image<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="file" name="id_image" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">License Number<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="license_number" id="license_number" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">License Expiry<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="date" name="license_expiry" id="license_expiry" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">License Image<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="file" name="license_image" required="">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <textarea class="form-control" rows="3" id="address" name="address"></textarea>
                                    </div>
                                </div>

                                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                                    <h5>Assign For</h5>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Country<span class="alert-danger">*</span></label>
                                    <div class="controls">
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

                                <div class="form-actions">
                                    <input type="submit" value="Add Rider" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection