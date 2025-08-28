@extends('layouts.vendorLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Cities</a> <a href="#" class="current">View Cities</a> </div>
    <h1>Cities</h1>
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
      <h1>
          <div class="button-group">
              <a href="{{ url('vendor/view-products') }}"><button style="margin-top: -45px" type="button" class="btn btn-mini waves-effect waves-light btn-info">&#60; Back</button></a>
              <a href="{{ url('vendor/add-product-city/'.$productId) }}"><button style="margin-top: -45px" type="button" class="btn btn-mini waves-effect waves-light btn-success">Add New</button></a> 
          </div>
      </h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Cities</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Country Name</th>
                  <th>City Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
              	@foreach($cities as $citi)
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $citi->countryName }}</td>
                  <td>{{ $citi->cityName }}</td>
                  <td class="center">
                    <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $citi->id }}" param-route="delete-product-city" param-user="vendor" href="javascript:">Delete</a>
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
