@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#">Sell With Us</a> 
      <a href="#" class="current">View Stores</a> 
    </div>
    <h1>Stores</h1>
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
              <h5>View Stores</h5>
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
                  <th>Store Name</th>
                  <th>Company Legal Name</th>
                  <th>E-Mail</th>
                  <th>Country</th>
                  <th>City</th>
                  <th>Address</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($viewstores as $viewstore)
                <tr class="gradeX">
                  <td>{{ $viewstore->store_name }}</td>
                  <td>{{ $viewstore->company_legal_name }}</td>
                  <td>{{ $viewstore->email }}</td>
                  <td>{{ $viewstore->country }}</td>
                  <td>{{ $viewstore->city }}</td>
                  <td>{{ $viewstore->full_address }}</td>
                  <td>
                    @if($viewstore->isActive == 0) No @else Yes @endif
                  </td>
                  <td class="center">
                    @if($viewstore->isActive == 0) 
                      <a href="{{ url('/admin/active-store/'.$viewstore->user_id) }}" class="btn btn-success btn-mini" style="margin:1px;">Activate</a>
                    @else 
                      <a href="{{ url('/admin/deactive-store/'.$viewstore->user_id) }}" class="btn btn btn-mini" style="margin:1px;">De-Activate</a>
                    @endif
                    
                    <a href="{{ url('/admin/store-details/'.$viewstore->id) }}" class="btn btn-primary btn-mini" style="margin:1px;">View Details</a>

                    <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $viewstore->user_id }}" param-route="delete-store" param-user="admin" href="javascript:">Delete</a>
                  </td>
                </tr>
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
