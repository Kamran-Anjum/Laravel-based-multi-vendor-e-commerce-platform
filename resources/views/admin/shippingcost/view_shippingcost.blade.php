@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Delivery Zone</a> <a href="#" class="current">View Delivery Zone</a> </div>
    <h1>Delivery Zone</h1>
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
            <h5>View Delivery Zone</h5>
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
                  <th>S.NO</th>
                  <th>Zone Name</th>
                  <!-- <th>Shipping Charges</th>
                  <th>Amount Limit</th> -->
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($shippingcosts as $shippingcost)
                <tr class="gradeX">
                  <td>{{ $shippingcost->id }}</td>
                  <td>{{ $shippingcost->zone_name }}</td>
                  <!-- <td>{{ $shippingcost->shippingCost }}</td>
                  <td>{{ $shippingcost->amountLimit }}</td> -->
                  <td class="center">
                    <a href="{{ url('/admin/add-zone-charges/'.$shippingcost->id ) }}" class="btn btn-success btn-mini">Add Charges</a>
                    <a href="{{ url('/admin/view-zone-detail/'.$shippingcost->id ) }}" class="btn btn-info btn-mini">View Details</a>
                    <a href="{{ url('/admin/edit-zone/'.$shippingcost->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $shippingcost->id }}" param-route="delete-zone" param-user="admin" href="javascript:">Delete</a>
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
