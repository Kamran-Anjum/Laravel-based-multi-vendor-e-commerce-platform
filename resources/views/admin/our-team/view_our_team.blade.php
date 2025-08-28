@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Our Team</a> <a href="#" class="current">View Our Team</a> </div>
    <h1>Our Team</h1>
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
    <a href="{{ url('/admin/add-our-team' ) }}">
      <button type="button" class="btn btn-success">Add New</button>
    </a>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Our Team</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Job Post</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
              	@foreach($our_teams as $data)
                  <tr class="gradeX">
                    <td>{{ $i }}</td>
                    <td>
                        <img src=" {{ asset('/images/backend_images/our-team/'.$data->image ) }}" alt="our-team-image" width="100">
                    </td>
                    <td>
                      {{ $data->name }}
                    </td>
                    <td>
                      {{ $data->job_post }}
                    </td>
                    <td>
                      @if($data->isActive == '1')
                        Yes
                      @else
                        No
                      @endif
                    </td>
                    <td class="center">
                      <a href="{{ url('/admin/edit-our-team/'.$data->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                      <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $data->id }}" param-route="delete-our-team" param-user="admin" href="javascript:">Delete</a>
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
