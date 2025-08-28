@extends('layouts.subadminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/subadmin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a style="cursor: default;" href="javascript:void(0)" class="current">View Riders</a> </div>
            <h1>Riders</h1>
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
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Riders</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Created By</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($riders as $rider)
                                    <tr class="gradeX center">
                                        <td>{{ $i }}</td>
                                        <td>{{ $rider->name }}</td>
                                        <td>{{ $rider->email }}</td>
                                        <td>{{ $rider->phone_1 }}</td>
                                        <td>{{ $rider->countryName }}</td>
                                        <td>{{ $rider->cityName }}</td>
                                        <td>{{ $rider->addedBy_name }}</td>

                                        @if($rider->isActive == '1')
                                        <td>Yes</td>
                                        @else
                                        <td>No</td>
                                        @endif

                                        <td class="center">
                                            <a href="{{ url('/subadmin/view-rider/orders/'.$rider->user_id ) }}" class="btn btn-success btn-mini">View Delivered Orders</a>
                                            <a href="{{ url('/subadmin/view-rider-detail/'.$rider->id ) }}" class="btn btn-info btn-mini">Details</a>
                                            <a href="{{ url('/subadmin/edit-rider/'.$rider->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                                            <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $rider->user_id }}" param-route="delete-rider" param-user="admin" href="javascript:">Delete</a>
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