@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Product Units</a> <a href="#" class="current">View Product Units</a> </div>
    <h1>Product Units</h1>
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
            <h5>View Product Units</h5>
            <h5 style="float: right; margin: 0; padding: 0 22px 0 0;">
              Language : <a href="{{ url('/admin/view-en-prod-units' ) }}"><button style="height: 36px; width: 43px;" type="button" class="btn btn-info">En</button></a> &nbsp; <a href="{{ url('/admin/view-ar-prod-units' ) }}"><button style="height: 36px; width: 43px;" type="button" class="btn btn-info">Ar</button></a>
            </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Code</th>
                  <th>Short Name</th>
                  <th>Language</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
              	@foreach($product_units as $product_unit)
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $product_unit->name }}</td>
                  <td>{{ $product_unit->code }}</td>
                  <td>{{ $product_unit->shortName }}</td>
                  <td>{{ $product_unit->lang }}</td>
                  @if($product_unit->isActive == '1')
                    <td>Yes</td>
                  @else
                    <td>No</td>
                  @endif
                  
                  <td class="center"><a href="{{ url('/admin/edit-prod-unit/'.$product_unit->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $product_unit->id }}" param-route="delete-prod-unit" param-user="admin" href="javascript:">Delete</a>
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
