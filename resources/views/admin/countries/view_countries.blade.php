@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Countries</a> <a href="#" class="current">View Countries</a> </div>
            <h1>Countries</h1>
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
                            <h5>View Countries</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Country Name</th>
                                    <th>Code</th>
                                    <th>Short Name</th>
                                    <!-- <th>Lattitude</th>
                                    <th>Longitude</th> -->
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($countries as $country)
                                    <tr class="gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $country->name }}</td>
                                        <td>{{ $country->code }}</td>
                                        <td>{{ $country->shortName }}</td>
                                        <!-- <td>{{-- $country->lat --}}</td>
                                        <td>{{-- $country->long --}}</td> -->
                                       <td> @if($country->isActive==1)
                                            Yes</td>
                                        @elseif($country->isActive==0)
                                            No
                                        @endif
                                        <td class="center">
                                            <!-- <a href="#myModal{{ $country->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a> -->
                                            <a href="{{ url('/admin/edit-country/'.$country->id ) }}" class="btn btn-primary btn-mini">Edit</a><!--  <a href="{{ url('/admin/delete-country/'.$country->id ) }}" class="btn btn-danger btn-mini delPod">Delete</a> -->
                                        <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $country->id }}" param-route="delete-country" param-user="admin" href="javascript:">Delete</a>
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