@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{ url('/admin/dashboard') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a style="cursor: default;" href="javascript:void(0)" class="current">View Sub Admin</a> </div>
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
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Sub Admin</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Created By</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($users as $user)
                                    <tr class="gradeX center">
                                        <td>{{ $i }}</td>
                                        <td>{{ $user->first_name." ".$user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->contact }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->userName }}</td>

                                        @if($user->isActive == '1')
                                        <td>Yes</td>
                                        @else
                                        <td>No</td>
                                        @endif

                                        <td class="center">
                                            <a href="{{ url('/admin/view-sub-admin-privileges/'.$user->userId ) }}" class="btn btn-info btn-mini">Privileges</a>
                                            <a href="{{ url('/admin/edit-sub-admin/'.$user->userId ) }}" class="btn btn-primary btn-mini">Edit</a>
                                            <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $user->userId }}" param-route="delete-sub-admin" param-user="admin" href="javascript:">Delete</a>
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