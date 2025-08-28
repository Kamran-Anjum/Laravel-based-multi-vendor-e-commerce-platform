@extends('layouts.vendorLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/vendor/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a style="cursor: default;" href="javascript:void(0)" class="current">Edit Privilege</a> </div>
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
        </div>
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Privilege</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/vendor/edit-vendor-user-privilege/'.$privilege->id) }}" name="edit_vendor_user" id="edit_vendor_user" novalidate="novalidate">
                                {{ csrf_field() }}

                                <div class="control-group">
                                    <label class="control-label">Country<span class="alert-danger">*</span></label>
                                    <div class="controls">
                                        <select class="select2 form-control custom-select ven_user_privilege_country_class" name="country_id" id="country_id">
                                            <option value='' disabled>Select</option>
                                            @foreach($countries as $cont1)
                                                <option @if($cont1->id == $privilege->country_id) selected="true" @endif  value="{{$cont1->id}}">{{$cont1->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">City<span class="alert-danger">*</span></label>
                                    <div class="controls">
                                        <select name="city_id" id="city_id">
                                            @foreach($cities as $cont2)
                                                <option @if($cont2->id == $privilege->city_id) selected="true" @endif  value="{{$cont2->id}}">{{$cont2->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Products Setup</label>
                                    <div class="controls">
                                        <select id="isProduct" name="isProduct" class="Active">
                                            <option value="0" @if($privilege->products == 0) selected="true" @endif > No </option>
                                            <option value="1" @if($privilege->products == 1) selected="true" @endif> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Orders Setup</label>
                                    <div class="controls">
                                        <select id="isOrder" name="isOrder" class="Active">
                                            <option value="0" @if($privilege->orders == 0) selected="true" @endif > No </option>
                                            <option value="1" @if($privilege->orders == 1) selected="true" @endif> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Accounts Setup</label>
                                    <div class="controls">
                                        <select id="isAccount" name="isAccount" class="Active">
                                            <option value="0" @if($privilege->accounts == 0) selected="true" @endif > No </option>
                                            <option value="1" @if($privilege->accounts == 1) selected="true" @endif> Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="Edit Privilege" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection