@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Meta Tags</a> <a href="#" class="current">View Meta Tags</a> </div>
    <h1>Meta Tags</h1>
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
            <h5>View Meta Tags</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S No.</th>
                  <th>Title</th>
                  <th>Keywords</th>
                  <th>Description</th>
                  <th>Slug URL</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
              	@foreach($meta_tags as $data)
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $data->title }}</td>
                  <td>{{ $data->keywords }}</td>
                  <td>{!! html_entity_decode($data->description) !!}</td>
                  <td>{{ $data->url_slug }}</td>
                  <td class="center"><a href="{{ url('/admin/edit-meta-tag/'.$data->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $data->id }}" param-route="delete-meta-tag" param-user="admin" href="javascript:">Delete</a>
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
