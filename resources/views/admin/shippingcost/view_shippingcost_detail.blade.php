@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Zone Details</a> <a href="#" class="current">View Zone Details</a> </div>
    <h1>Zone Details</h1>
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
            <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Zone Details</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="" action="" > 
              {{ csrf_field() }}
              <style>
                .form-horizontal .control-label {
                  text-align: left !important;
                  padding-left: 10px !important;
                }
              </style>

              <div class="control-group">
                <label class="control-label"><strong>Zone Name:</strong></label>
                <label class="control-label">{{ $shippingcost->zone_name }}</label>
              </div>
              <!-- <div class="control-group">
                <label class="control-label"><strong>Charges:</strong></label>
                <label class="control-label">{{ $shippingcost->shippingCost }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Amount Limit:</strong></label>
                <label class="control-label">{{ $shippingcost->amountLimit }}</label>
              </div> -->
              <!-- <br> -->
            </form>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title"> 
            <a href="{{ url('/admin/add-zone-areas/'.$shippingcost->id)}}" class="btn btn-success" style="float: right;">Add More Area</a>
            <span class="icon"><i class="icon-th"></i></span>
            <h5>View Zone Areas</h5>
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
                  <th>Country</th>
                  <th>State</th>
                  <th>City</th>
                  <th>Area</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($zone_cities as $zone_citie)
                <tr class="gradeX">
                  <td>{{ $zone_citie->id }}</td>
                  <td>{{ $zone_citie->country_name }}</td>
                  <td>
                    @if(!$states->isEmpty())
                        @foreach($states as $stat)
                            @if($stat->id == $zone_citie->state_id)
                                {{$stat->name}}
                            @endif
                        @endforeach
                    @endif
                  </td>
                  <td>{{ $zone_citie->city_name }}</td>
                  <td>{{ $zone_citie->area_name }}</td>
                  <td class="center">
                    <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $zone_citie->id }}" param-route="delete-zone-area" param-user="admin" href="javascript:">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title"> 
            <a href="{{ url('/admin/add-zone-charges/'.$shippingcost->id)}}" class="btn btn-success" style="float: right;">Add More Area Charges</a>
            <span class="icon"><i class="icon-th"></i></span>
            <h5>View Zone Charges</h5>
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
                  <th>Weight Upto</th>
                  <th>Chaeges</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($zone_charges as $zone_charge)
                <tr class="gradeX">
                  <td>{{ $zone_charge->id }}</td>
                  <td>{{ $zone_charge->weight_up_to }} Gram</td>
                  <td>{{ $zone_charge->cost }}</td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-zone-charges/'.$zone_charge->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $zone_charge->id }}" param-route="delete-zone-charges" param-user="admin" href="javascript:">Delete</a>
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
