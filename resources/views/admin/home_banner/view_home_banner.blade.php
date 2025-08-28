@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Home Banner</a> <a href="#" class="current">View Home Banner</a> </div>
    <h1>Home Banner</h1>
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
    <a href="{{ url('/admin/add-home-banner' ) }}">
      <button type="button" class="btn btn-success">Add New</button>
    </a>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Home Banner</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Place On</th>
                  <th>Image</th>
                  <th>En Title</th>
                  <th>Ar Title</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
              	@foreach($home_banners as $home_banner)
                  <tr class="gradeX">
                    <td>{{ $i }}</td>
                    <td>
                      @if($home_banner->condition == 1)
                          Full Banner
                      @elseif($home_banner->condition == 2)
                          Side By Side Banner
                      @elseif($home_banner->condition == 3)
                          Bottom Left Banner
                      @endif
                    </td>
                    <td>
                        <img src=" {{ asset('/images/backend_images/home_banner/'.$home_banner->image ) }}" alt="home_banner-image" width="150">
                        @if($home_banner->condition == 2)
                          <br>
                          <img src=" {{ asset('/images/backend_images/home_banner/'.$home_banner->image_2 ) }}" alt="home_banner-image" width="150">
                      @endif
                    </td>
                    <td>
                      {{ $home_banner->en_title }}
                      @if($home_banner->condition == 2)
                          <br>
                          {{ $home_banner->en_title_2 }}
                      @endif
                    </td>
                    <td>
                      {{ $home_banner->ar_title }}
                      @if($home_banner->condition == 2)
                          <br>
                          {{ $home_banner->ar_title_2 }}
                      @endif
                    </td>
                    <td>
                      @if($home_banner->isActive == '1')
                        Yes
                      @else
                        No
                      @endif
                    </td>
                    <td class="center">
                      <a href="{{ url('/admin/edit-home-banner/'.$home_banner->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                      <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $home_banner->id }}" param-route="delete-home-banner" param-user="admin" href="javascript:">Delete</a>
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
