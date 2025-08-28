@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">About</a> <a href="#" class="current">View About</a> </div>
    <h1>About</h1>
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
    @if($about_count == 0)
    <a href="{{ url('/admin/add-about' ) }}">
      <button type="button" class="btn btn-success">Add New</button>
    </a>
    @endif
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View About</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Image</th>
                  <th>En Title</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
              	@foreach($abouts as $data)
                  <tr class="gradeX">
                    <td>{{ $i }}</td>
                    <td>
                        <img src=" {{ asset('/images/backend_images/about/'.$data->image ) }}" alt="home_banner-image" width="100">
                    </td>
                    <td>
                      {{ $data->en_title }}
                    </td>
                    <td>
                      @if($data->isActive == '1')
                        Yes
                      @else
                        No
                      @endif
                    </td>
                    <td class="center">
                      <a href="{{ url('/admin/view-about-detail/'.$data->id ) }}" class="btn btn-info btn-mini">Detail</a>
                      <a href="{{ url('/admin/edit-about/'.$data->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                      <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $data->id }}" param-route="delete-about" param-user="admin" href="javascript:">Delete</a>
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
