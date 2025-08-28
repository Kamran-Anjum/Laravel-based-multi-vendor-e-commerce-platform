@extends('layouts.vendorLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">City Request</a> <a href="#" class="current">View City Requests</a> </div>
            <h1>City Requests</h1>
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
                            <h5>View City Requests</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                  <!-- Align columns data to center -->
                              <style>
                              .table th, .table td {
                                  text-align: center;
                                }
                                .table thead th {
                                  vertical-align: top;
                                }
                              </style>
                                  <tr>
                                      <th>S.No</th>
                                      <th>Country</th>
                                      <th>City</th>
                                      <th>Reason</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    
                                  <?php $i = 1; ?>
                                @foreach($cities as $citi)
                                    <tr class="gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $citi->countryName }}</td>
                                        <td>{{ $citi->cityName }}</td>
                                        <td>{{ $citi->reason }}</td>
                                        <td>Requested</td>

                                        <td class="center" style="text-align:center;">
                                            <a style="margin:2px 0px;" class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $citi->user_id }},{{ $citi->cityId }}" param-route="delete-city-request" param-user="vendor" href="javascript:">Delete</a>
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
