@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">City Areas</a> <a href="#" class="current">View City Areas</a> </div>
            <h1>City Areas</h1>
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
                            <h5>View City Areas</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                              <style>
                              .table th, .table td {
                                  text-align: center;
                                }
                                .table thead th {
                                  vertical-align: top;
                                }
                              </style>
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Country name</th>
                                    <th>State name</th>
                                    <th>City Name</th>
                                    <th>Area Name</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($city_areas as $city_area)
                                    <tr class="gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $city_area->country_name }}</td>
                                        <td>
                                            @if(!$states->isEmpty())
                                                @foreach($states as $stat)
                                                    @if($stat->id == $city_area->state_id)
                                                        {{$stat->name}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $city_area->city_name }}</td>
                                        <td>{{ $city_area->name}}</td>
                                        <td> @if($city_area->isActive==1)
                                                Yes</td>
                                        @elseif($city->isActive==0)
                                            No
                                        @endif

                                        <td class="center">
                                            <a href="{{ url('/admin/edit-city-area/'.$city_area->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                                            <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $city_area->id }}" param-route="delete-city-area" param-user="admin" href="javascript:">Delete</a>
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
