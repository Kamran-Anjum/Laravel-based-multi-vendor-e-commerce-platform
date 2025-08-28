@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">View Categories</a> </div>
    <h1>Categories</h1>
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
            <h5>View Categories</h5>
            <h5 style="float: right; margin: 0; padding: 0 22px 0 0;">
              Language : <a href="{{ url('/admin/view-en-categories' ) }}"><button style="height: 36px; width: 43px;" type="button" class="btn btn-info">En</button></a> &nbsp; <a href="{{ url('/admin/view-ar-categories' ) }}"><button style="height: 36px; width: 43px;" type="button" class="btn btn-info">Ar</button></a>
            </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Parent Name</th>
                  <th>Description</th>
                  <th>Language</th>
                  <th>Image</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
              	@foreach($categories as $category)
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $category->name }}</td>
                  <td>
                    @foreach($parentCategories as $parentCategory)
                      @if( $category->parent_id == $parentCategory->category_id )
                        @if( $category->lang == $parentCategory->lang )
                          {{ $parentCategory->name }}
                        @endif
                      @endif
                    @endforeach
                  </td>
                  <td>{{ $category->description }}</td>
                  <td>{{ $category->lang }}</td>
                  <td>
                    @if(!empty($category->image))
                      @if($category->lang == 'en')
                        <img src=" {{ asset('/images/backend_images/category/en/'.$category->image ) }}" width="50">
                      @elseif($category->lang == 'ar')
                        <img src=" {{ asset('/images/backend_images/category/ar/'.$category->image ) }}" width="50">
                      @endif
                    @endif
                  </td>
                  @if($category->isActive == '1')
                    <td>Yes</td>
                  @else
                    <td>No</td>
                  @endif
                  
                  <td class="center"><a href="{{ url('/admin/edit-category/'.$category->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                    <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $category->id }}" param-route="delete-category" param-user="admin" href="javascript:">Delete</a>
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
