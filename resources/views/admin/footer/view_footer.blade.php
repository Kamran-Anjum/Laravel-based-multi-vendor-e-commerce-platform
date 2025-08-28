@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#">Footer Items</a> 
      <a href="#" class="current">Footer Itemss</a> 
    </div>
    <h1>Footer Items</h1>
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
  <style>
    .form-horizontal .control-label {
      text-align: left !important;
      padding-left: 10px !important;
    }
  </style>
  <div class="container-fluid">
    @if($footer_count == 0)
      <div class="button-group">
          <a href="{{ url('admin/add-footer-item') }}"><button type="button" class="btn waves-effect waves-light btn-success"> Add Footer Item</button></a>
      </div>
    @endif
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> 
            <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Footer Items</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="" action="" > 
              {{ csrf_field() }}
              
              @if($footer_count > 0)
                  <div class="row-fluid">
                    <div class="span1">
                      <h6 style="margin-left: 10px;">E-mail</h6>
                    </div>
                    <div class="span8 text-secondary">
                      @if(!empty($footer->email))
                        {{ $footer->email }}
                      @endif
                    </div>  
                    @if(!empty($footer->email))
                      <div class="span1">
                        <a href="{{ url('/admin/edit-footer-item/email/'.$footer->id)}}" class="btn btn-primary">Edit</a>
                      </div>
                      <div class="span1">
                        <a class="btn btn-danger sa-confirm-delete" param-id="{{ $footer->id }}" param-route="delete-footer-item/email" param-user="admin" href="javascript:">Delete</a>
                      </div>
                    @else
                      <div class="span1">
                        <a href="{{ url('/admin/add-footer-item/email/'.$footer->id)}}" class="btn btn-success">Add</a>
                      </div>
                    @endif
                  </div>
                  <hr>
                  <div class="row-fluid">
                    <div class="span1">
                      <h6 style="margin-left: 10px;">Phone 1</h6>
                    </div>
                    <div class="span8 text-secondary">
                      @if(!empty($footer->phone_1))
                        {{ $footer->phone_1 }}
                      @endif
                    </div>  
                    @if(!empty($footer->phone_1))
                      <div class="span1">
                        <a href="{{ url('/admin/edit-footer-item/phone_1/'.$footer->id)}}" class="btn btn-primary">Edit</a>
                      </div>
                      <div class="span1">
                        <a class="btn btn-danger sa-confirm-delete" param-id="{{ $footer->id }}" param-route="delete-footer-item/phone_1" param-user="admin" href="javascript:">Delete</a>
                      </div>
                    @else
                      <div class="span1">
                        <a href="{{ url('/admin/add-footer-item/phone_1/'.$footer->id)}}" class="btn btn-success">Add</a>
                      </div>
                    @endif
                  </div>
                  <hr>
                  <div class="row-fluid">
                    <div class="span1">
                      <h6 style="margin-left: 10px;">Phone 2</h6>
                    </div>
                    <div class="span8 text-secondary">
                      @if(!empty($footer->phone_2))
                        {{ $footer->phone_2 }}
                      @endif
                    </div>  
                    @if(!empty($footer->phone_2))
                      <div class="span1">
                        <a href="{{ url('/admin/edit-footer-item/phone_2/'.$footer->id)}}" class="btn btn-primary">Edit</a>
                      </div>
                      <div class="span1">
                        <a class="btn btn-danger sa-confirm-delete" param-id="{{ $footer->id }}" param-route="delete-footer-item/phone_2" param-user="admin" href="javascript:">Delete</a>
                      </div>
                    @else
                      <div class="span1">
                        <a href="{{ url('/admin/add-footer-item/phone_2/'.$footer->id)}}" class="btn btn-success">Add</a>
                      </div>
                    @endif
                  </div>
                  <hr>
                  <div class="row-fluid">
                    <div class="span1">
                      <h6 style="margin-left: 10px;">Address</h6>
                    </div>
                    <div class="span8 text-secondary">
                      @if(!empty($footer->address))
                        {{ $footer->address }}
                      @endif
                    </div> 
                    @if(!empty($footer->address))
                      <div class="span1">
                        <a href="{{ url('/admin/edit-footer-item/address/'.$footer->id)}}" class="btn btn-primary">Edit</a>
                      </div>
                      <div class="span1">
                        <a class="btn btn-danger sa-confirm-delete" param-id="{{ $footer->id }}" param-route="delete-footer-item/address" param-user="admin" href="javascript:">Delete</a>
                      </div>
                    @else
                      <div class="span1">
                        <a href="{{ url('/admin/add-footer-item/address/'.$footer->id)}}" class="btn btn-success">Add</a>
                      </div>
                    @endif
                  </div>
                  <hr>
                  <div class="row-fluid">
                    <div class="span1">
                      <h6 style="margin-left: 10px;">Facebook</h6>
                    </div>
                    <div class="span8 text-secondary">
                      @if(!empty($footer->facebook))
                        {{ $footer->facebook }}
                      @endif
                    </div>  
                    @if(!empty($footer->facebook))
                      <div class="span1">
                        <a href="{{ url('/admin/edit-footer-item/facebook-link/'.$footer->id)}}" class="btn btn-primary">Edit</a>
                      </div>
                      <div class="span1">
                        <a class="btn btn-danger sa-confirm-delete" param-id="{{ $footer->id }}" param-route="delete-footer-item/facebook-link" param-user="admin" href="javascript:">Delete</a>
                      </div>
                    @else
                      <div class="span1">
                        <a href="{{ url('/admin/add-footer-item/facebook-link/'.$footer->id)}}" class="btn btn-success">Add</a>
                      </div>
                    @endif
                  </div>
                  <hr>
                  <div class="row-fluid">
                    <div class="span1">
                      <h6 style="margin-left: 10px;">Google</h6>
                    </div>
                    <div class="span8 text-secondary">
                      @if(!empty($footer->google))
                        {{ $footer->google }}
                      @endif
                    </div>  
                    @if(!empty($footer->google))
                      <div class="span1">
                        <a href="{{ url('/admin/edit-footer-item/google-link/'.$footer->id)}}" class="btn btn-primary">Edit</a>
                      </div>
                      <div class="span1">
                        <a class="btn btn-danger sa-confirm-delete" param-id="{{ $footer->id }}" param-route="delete-footer-item/google-link" param-user="admin" href="javascript:">Delete</a>
                      </div>
                    @else
                      <div class="span1">
                        <a href="{{ url('/admin/add-footer-item/google-link/'.$footer->id)}}" class="btn btn-success">Add</a>
                      </div>
                    @endif
                  </div>
                  <hr>
                  <div class="row-fluid">
                    <div class="span1">
                      <h6 style="margin-left: 10px;">Instagram</h6>
                    </div>
                    <div class="span8 text-secondary">
                      @if(!empty($footer->instagram))
                        {{ $footer->instagram }}
                      @endif
                    </div>  
                    @if(!empty($footer->instagram))
                      <div class="span1">
                        <a href="{{ url('/admin/edit-footer-item/instagram-link/'.$footer->id)}}" class="btn btn-primary">Edit</a>
                      </div>
                      <div class="span1">
                        <a class="btn btn-danger sa-confirm-delete" param-id="{{ $footer->id }}" param-route="delete-footer-item/instagram-link" param-user="admin" href="javascript:">Delete</a>
                      </div>
                    @else
                      <div class="span1">
                        <a href="{{ url('/admin/add-footer-item/instagram-link/'.$footer->id)}}" class="btn btn-success">Add</a>
                      </div>
                    @endif
                  </div>
                  <hr>
                  <div class="row-fluid">
                    <div class="span1">
                      <h6 style="margin-left: 10px;">Linkedin</h6>
                    </div>
                    <div class="span8 text-secondary">
                      @if(!empty($footer->linkedin))
                        {{ $footer->linkedin }}
                      @endif
                    </div>  
                    @if(!empty($footer->linkedin))
                      <div class="span1">
                        <a href="{{ url('/admin/edit-footer-item/linkedin-link/'.$footer->id)}}" class="btn btn-primary">Edit</a>
                      </div>
                      <div class="span1">
                        <a class="btn btn-danger sa-confirm-delete" param-id="{{ $footer->id }}" param-route="delete-footer-item/linkedin-link" param-user="admin" href="javascript:">Delete</a>
                      </div>
                    @else
                      <div class="span1">
                        <a href="{{ url('/admin/add-footer-item/linkedin-link/'.$footer->id)}}" class="btn btn-success">Add</a>
                      </div>
                    @endif
                  </div>
                  <hr>
                  <div class="row-fluid">
                    <div class="span1">
                      <h6 style="margin-left: 10px;">Twitter</h6>
                    </div>
                    <div class="span8 text-secondary">
                      @if(!empty($footer->twitter))
                        {{ $footer->twitter }}
                      @endif
                    </div>  
                    @if(!empty($footer->twitter))
                      <div class="span1">
                        <a href="{{ url('/admin/edit-footer-item/twitter-link/'.$footer->id)}}" class="btn btn-primary">Edit</a>
                      </div>
                      <div class="span1">
                        <a class="btn btn-danger sa-confirm-delete" param-id="{{ $footer->id }}" param-route="delete-footer-item/twitter-link" param-user="admin" href="javascript:">Delete</a>
                      </div>
                    @else
                      <div class="span1">
                        <a href="{{ url('/admin/add-footer-item/twitter-link/'.$footer->id)}}" class="btn btn-success">Add</a>
                      </div>
                    @endif
                  </div>
                  <hr>
                  <div class="row-fluid">
                    <div class="span1">
                      <h6 style="margin-left: 10px;">Youtube</h6>
                    </div>
                    <div class="span8 text-secondary">
                      @if(!empty($footer->youtube))
                        {{ $footer->youtube }}
                      @endif
                    </div>  
                    @if(!empty($footer->youtube))
                      <div class="span1">
                        <a href="{{ url('/admin/edit-footer-item/youtube-link/'.$footer->id)}}" class="btn btn-primary">Edit</a>
                      </div>
                      <div class="span1">
                        <a class="btn btn-danger sa-confirm-delete" param-id="{{ $footer->id }}" param-route="delete-footer-item/youtube-link" param-user="admin" href="javascript:">Delete</a>
                      </div>
                    @else
                      <div class="span1">
                        <a href="{{ url('/admin/add-footer-item/youtube-link/'.$footer->id)}}" class="btn btn-success">Add</a>
                      </div>
                    @endif
                  </div>
                @else
                  <h5 class="text-center">No Footer Items Added Yet</h5>
                @endif

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
