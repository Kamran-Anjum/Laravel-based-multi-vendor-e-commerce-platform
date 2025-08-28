@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Promotion</a> <a href="#" class="current">View Promotion</a> </div>
    <h1>Promotion</h1>
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
            <h5>View Promotion</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S No.</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Type</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Active</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
              	@foreach($promotions as $data)
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->amount }}</td>
                  <td>{{ $data->type }}</td>
                  <td>{{ $data->from_date }}</td>
                  <td>{{ $data->to_date }}</td>
                  <td>
                    @if($data->isActive == '1')
                        Yes
                      @else
                        No
                      @endif
                  </td>
                  <td class="center">
                    <a href="{{ url('/admin/assign-promotion/'.$data->id.'/0' ) }}" class="btn btn-success btn-mini">Assign Promotion</a>
                    <a href="{{ url('/admin/edit-promotion/'.$data->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                    @if($data->product_count > 0)
                      <a class="btn btn-danger btn-mini sa-confirm-delete-promo" param-id="{{ $data->id }}" param-route="delete-promotion" param-user="admin" param-count="{{ $data->product_count }}" href="javascript:">Delete</a>
                    @else
                      <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $data->id }}" param-route="delete-promotion" param-user="admin" href="javascript:">Delete</a>
                    @endif
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
