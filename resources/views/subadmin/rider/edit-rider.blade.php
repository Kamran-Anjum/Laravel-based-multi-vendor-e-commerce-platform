@extends('layouts.subadminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/subadmin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a style="cursor: default;" href="javascript:void(0)" class="current">Edit Rider</a> </div>
            <h1>Edit Rider</h1>
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
                            <h5>Edit Rider</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/subadmin/edit-rider/'.$rider->id) }}" name="add_sub_admin" id="add_sub_admin" novalidate="novalidate">
                                {{ csrf_field() }}

                                <div class="control-group">
                                    <label class="control-label">Name<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="name" id="name" required="" value="{{ $rider->name}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Date Of Birth<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="date" name="d_o_b" id="d_o_b" required="" value="{{ $rider->d_o_b}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Email<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="email" name="email" id="email" required="" value="{{ $rider->email}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Contact 1<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="number" name="contact_1" id="contact_1" required="" value="{{ $rider->phone_1}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Contact 2</label>
                                    <div class="controls">
                                        <input type="number" name="contact_2" id="contact_2" value="{{ $rider->phone_2}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Nationality<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="nationality" id="nationality" required="" value="{{ $rider->nationality}}">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label">Rider Image<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="file" name="image" required="">
                                        <input type="hidden" name="current_image" value="{{ $rider->image }}">
                                        @if(!empty( $rider->image ))
                                            <img style="width:50px;" src="{{ asset('/images/backend_images/rider/'.$rider->image) }}">
                                        @endif
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Rider ID Image<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="file" name="id_image" required="">
                                        <input type="hidden" name="current_id_image" value="{{ $rider->id_image }}">
                                        @if(!empty( $rider->id_image ))
                                            <img style="width:50px;" src="{{ asset('/images/backend_images/rider/id/'.$rider->id_image) }}">
                                        @endif
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">License Number<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="text" name="license_number" id="license_number" required="" value="{{ $rider->license_number}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">License Expiry<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="date" name="license_expiry" id="license_expiry" required="" value="{{ $rider->license_expiry}}">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">License Image<span style="color: red;">*</span></label>
                                    <div class="controls">
                                        <input type="file" name="license_image" required="">
                                        <input type="hidden" name="current_license_image" value="{{ $rider->license_image }}">
                                        @if(!empty( $rider->image ))
                                            <img style="width:50px;" src="{{ asset('/images/backend_images/rider/license/'.$rider->license_image) }}">
                                        @endif
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Address</label>
                                    <div class="controls">
                                        <textarea class="form-control" rows="3" id="address" name="address">{{ $rider->address}}</textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Is Active</label>
                                    <div class="controls">
                                        <select name="isActive" id="city_id">
                                            @if($rider->isActive == 0)
                                                <option selected="" value="0">No</option>
                                                <option value="1">Yes</option>
                                            @else
                                                <option value="0">No</option>
                                                <option selected="" value="1">Yes</option>
                                            @endif
                                        </select>
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
                                            <option value="{{ $city->id }}">{{ $city->name}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Edit Rider" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection