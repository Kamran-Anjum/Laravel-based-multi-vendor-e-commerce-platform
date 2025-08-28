@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Brands</a> <a href="#" class="current">View Brands</a> </div>
    <h1>Brands</h1>
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
            <h5>View Brands</h5>
            <h5 style="float: right; margin: 0; padding: 0 22px 0 0;">
              Language : <a href="{{ url('/admin/view-en-brands' ) }}"><button style="height: 36px; width: 43px;" type="button" class="btn btn-info">En</button></a> &nbsp; <a href="{{ url('/admin/view-ar-brands' ) }}"><button style="height: 36px; width: 43px;" type="button" class="btn btn-info">Ar</button></a>
            </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Brand Name</th>
                  <th>Short Name</th>
                  <th>Description</th>
                  <th>Language</th>
                  <th>Image</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
              	@foreach($brands as $brand)
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $brand->name }}</td>
                  <td>{{ $brand->short_name }}</td>
                  <td>{{ $brand->description }}</td>
                  <td>{{ $brand->lang }}</td>
                  <td>
                    @if(!empty($brand->image))
                      @if($brand->lang == 'en')
                        <img src=" {{ asset('/images/backend_images/brands/en/tiny/'.$brand->image ) }}">
                      @elseif($brand->lang == 'ar')
                        <img src=" {{ asset('/images/backend_images/brands/ar/tiny/'.$brand->image ) }}">
                      @endif
                    @endif
                  </td>
                  @if($brand->isActive == '1')
                    <td>Yes</td>
                  @else
                    <td>No</td>
                  @endif
                  <td class="center"><a href="{{ url('/admin/edit-brand/'.$brand->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $brand->id }}" param-route="delete-brand" param-user="admin" href="javascript:">Delete</a>
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
