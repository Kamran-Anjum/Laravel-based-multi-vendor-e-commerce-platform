@extends('layouts.subadminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/subadmin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a style="cursor: default;" href="javascript:void(0)" class="current">View Privileges</a> </div>
            <h1>Privileges</h1>
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
                    <a href="{{ url('subadmin/view-vendors') }}"><button style="margin-top: -45px" type="button" class="btn btn-mini waves-effect waves-light btn-info">&#60; Back</button></a>
                    <a href="{{ url('subadmin/create-vendor-privilege/'.$userid) }}"><button style="margin-top: -45px" type="button" class="btn btn-mini waves-effect waves-light btn-success">Add New</button></a> 
                </div>
            </h1>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Privileges</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($privileges as $privilege)
                                    <tr class="gradeX center">
                                        <td>{{ $i }}</td>
                                        <td>{{ $privilege->countryName }}</td>
                                        <td>{{ $privilege->cityName }}</td>

                                        <td class="center">
                                            <a href="{{ url('/subadmin/edit-vendor-privilege/'.$privilege->id ) }}" class="btn btn-primary btn-mini">Edit</a>

                                            @if($privilege->isActive == 1)
                                                <a disabled class="btn btn-danger btn-mini" href="javascript:">Delete</a>
                                            @else
                                                <a class="btn btn-danger btn-mini sa-confirm-delete"  param-id="{{ $privilege->id }}" param-route="delete-vendor-privilege" param-user="subadmin" href="javascript:">Delete</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $i = $i+1; ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection