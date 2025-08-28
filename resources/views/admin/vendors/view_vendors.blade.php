@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#">Vendors</a> 
      <a href="#" class="current">View Vendors</a> 
    </div>
    <h1>Vendors</h1>
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
          <div class="widget-title"> 
            <span class="icon"><i class="icon-th"></i></span>
              <h5>View Vendors</h5>
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
                  <th>Store Name</th>
                  <th>Company Legal Name</th>
                  <th>E-Mail</th>
                  <th>Country</th>
                  <th>City</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Active</th>
                  <th>City Request</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($users as $viewstore)

                <?php $chk_req = 0; ?>
                  @foreach($vendor_requests as $vendor_request)
                    @if($vendor_request->user_id == $viewstore->user_id)
                      @php $chk_req = 1; @endphp
                    @endif
                  @endforeach

                <?php $chk_req1=0; $requestedCountry=""; $requestedCity=""; $requestedReason=""; ?>
                  @foreach($vendor_city_requests as $vendor_city_request)
                    @if($vendor_city_request->user_id == $viewstore->user_id)
                      @php
                        $chk_req1 = 1;
                        $requestedCountry = $vendor_city_request->countryName;
                        $requestedCity = $vendor_city_request->cityName;
                        $requestedReason = $vendor_city_request->reason;
                      @endphp
                    @endif
                  @endforeach

                <tr class="gradeX"
                @if($cityReq == 1 && $chk_req1 == 1)
                  style="background-color:lightskyblue";
                @elseif($approvalReq == 1 && $chk_req == 1)
                  style="background-color:lightgreen";
                @endif
                >
                  <td>{{ $i }}</td>
                  <td>{{ $viewstore->store_name }}</td>
                  <td>{{ $viewstore->company_legal_name }}</td>
                  <td>{{ $viewstore->email }}</td>
                  <td>{{ $viewstore->countryName }}</td>
                  <td>{{ $viewstore->cityName }}</td>
                  <td>{{ $viewstore->full_address }}</td>

                  <td>
                    @if($chk_req == 1)
                      Requested
                    @else
                      Approved
                    @endif
                  </td>
                  
                  <td>
                    @if($viewstore->isActive == 0) No @else Yes @endif
                  </td>

                  <td>
                    @if($chk_req1 == 1)
                      <a href="#myModal{{ $viewstore->user_id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a>
                    @else
                      None
                    @endif
                  </td>
                  <td class="center">
                    @if($viewstore->isActive == 0) 
                      <a href="{{ url('/admin/active-vendor/'.$viewstore->user_id) }}" class="btn btn-success btn-mini" style="margin:1px;">Activate</a>
                    @else 
                      <a href="{{ url('/admin/deactive-vendor/'.$viewstore->user_id) }}" class="btn btn btn-mini" style="margin:1px;">De-Activate</a>
                    @endif
                    
                    <a href="{{ url('/admin/vendor-details/'.$viewstore->user_id) }}" class="btn btn-primary btn-mini" style="margin:1px;">View Details</a>

                    <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $viewstore->user_id }}" param-route="delete-vendor" param-user="admin" href="javascript:">Delete</a>
                  </td>
                </tr>
                <div id="myModal{{ $viewstore->user_id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>City Request Detail</h3>
                  </div>
                  <div class="modal-body">
                    <label><strong>Store Name:</strong> {{ $viewstore->store_name }} </label>
                    <label><strong>Country:</strong> {{$requestedCountry}} </label>
                    <label><strong>Requested City:</strong> {{$requestedCity}} </label>
                    <label><strong>Reason:</strong> {{$requestedReason}} </label>
                  </div>
                </div>
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
