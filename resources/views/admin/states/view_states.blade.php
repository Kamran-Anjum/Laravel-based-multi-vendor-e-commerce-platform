@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">States</a> <a href="#" class="current">View States</a> </div>
            <h1>States</h1>
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
                            <h5>View States</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>State Name</th>
                                    <th>Code</th>
                                    <th>Short Name</th>
                                    <th>Country Name</th>
                                    <!-- <th>Lattitude</th>
                                    <th>Longitude</th> -->
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($states as $state)
                                    <tr class="gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $state->name }}</td>
                                        <td>{{ $state->code }}</td>
                                        <td>{{ $state->shortName }}</td>
                                        <td>{{ $state->country_name }}</td>
                                        <!-- <td>{{-- $state->lat --}}</td>
                                        <td>{{-- $state->long --}}</td> -->
                                        <td> @if($state->isActive==1)
                                                Yes</td>
                                        @elseif($state->isActive==0)
                                            No
                                        @endif

                                        <td class="center">
                                            <!-- <a href="#myModal{{ $state->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a> -->
                                            <a href="{{ url('/admin/edit-state/'.$state->id ) }}" class="btn btn-primary btn-mini">Edit</a><!--  <a href="{{ url('/admin/delete-state/'.$state->id ) }}" class="btn btn-danger btn-mini delPod">Delete</a> -->

                                            <!-- <a sta="{{ $state->id }}" staa="delete-state" href="javascript:"
                                               class="btn btn-danger btn-mini deleteState">Delete</a> -->
                                            <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $state->id }}" param-route="delete-state" param-user="admin" href="javascript:">Delete</a>
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