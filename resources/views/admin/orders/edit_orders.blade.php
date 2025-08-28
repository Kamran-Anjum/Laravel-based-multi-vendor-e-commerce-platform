@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">Edit order</a> </div>
            <h1>Orders</h1>
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
        <div class="container-fluid"><hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                            <h5>Edit Order</h5>
                        </div>
                        <div class="widget-content nopadding">

                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-order/'.$orderDetail->id) }}"  novalidate="novalidate">
                              <style>
                                .form-horizontal .control-label {
                                    text-align: left !important;
                                    padding-left: 10px !important;
                                  }
                                  </style>
                                {{ csrf_field() }}
                                <div class="control-group">
                                    <label class="control-label"><strong>Customer Name :</strong></label>

                                        <label class="control-label">{{ $orderDetail->firstName }} {{ $orderDetail->lastName }}</label>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Contact No :</strong></label>

                                        <label class="control-label">{{ $orderDetail->contact }}</label>

                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Email Address :</strong></label>

                                    <label class="control-label">{{ $orderDetail->email  }}</label>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Shipping Address :</strong></label>

                                        <label class="control-label">{{$orderDetail->shipToAddress}}</label>

                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Billing Address :</strong></label>
                                        <label class="control-label">{{$orderDetail->billToAddress}}</label>

                                </div>

                                <div class="control-group">
                                    <label class="control-label"><strong>Country Name :</strong></label>
                                        <label class="control-label">{{ $orderDetail->co_name }}</label>

                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>City Name :</strong></label>

                                         <label class="control-label">{{ $orderDetail->c_name }}</label>

                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Total Amount :</strong></label>

                                         <label class="control-label">{{ $orderDetail->total }}</label>

                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Created Date :</strong></label>

                                         <label class="control-label">{{ $orderDetail->created_at }}</label>

                                </div>
                                <div class="control-group">
                                    <label class="control-label"><strong>Schedule Date :</strong></label>

                                         <label class="control-label">{{ $orderDetail->deliverySchedualDate }}</label>

                                </div>

                                <div class="control-group">
                                   <label class="control-label"><strong>Status :</strong></label>
                                   <div class="controls">
                                       <select class="status" name="o_status_id" id="status_id"style="width: 220px;">
                                           @foreach($status as $st)
                                               < <option @if($st->id == $orderDetail->s_id) selected="true" @endif  value="{{$st->id}}">{{$st->name}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                               </div>

                                <div class="form-actions">
                                    <input type="submit" value="Edit Order" class="btn btn-success">
                                </div>
                            </form>

                            <div class="alert-success">
                                <h5 style="margin: 0px 10px; padding:10px 0px;">ORDER DETAILS</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <table class="table">
                                  <style>
                                  .table th, .table td {
                                      text-align: center;
                                    }
                                    .table thead th {
                                      vertical-align: top;
                                    }
                                  </style>
                                  <thead>
                                    <tr>
                                      <th style="text-align:left; width:20%;"><strong>ITEM</strong></th>
                                      <th style="width:15%;"><strong>UNIT PRICE</strong></th>
                                      <th style="width:15%;"><strong>QTY</strong></th>
                                      <th style="width:15%;"><strong>TOTAL</strong></th>
                                      <th style="width:35%;"><strong>ACTION</strong></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($orderDetails as $od)
                                      <tr>
                                        <td style="text-align:left;"><label name="total_price" id="total_price"><img style="width:40px; padding-right:10px;" src="{{ asset('/images/backend_images/products/en/small/'.$od->image) }}">{{ $od->p_name }}</label></td>
                                        <td><label name="unit_price" id="total_price"  >{{ $od->unit_price }}</label></td>
                                        <td><label name="qty" id="qty"  >{{$od->qty }}</label></td>
                                        <td><label name="total_price" id="total_price"  >{{ $od->total_price }}</label></td>
                                        <td>
                                          <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-order/'.$orderDetail->id) }}"  novalidate="novalidate">
                                            {{ csrf_field() }}
                                            <div class="">
                                               <div class="">
                                                   <select class="status" name="o_p_status_id" id="status_id">
                                                       @foreach($status as $st)
                                                           < <option @if($st->id == $od->status) selected="true" @endif  value="{{$st->id}}">{{$st->name}}</option>
                                                       @endforeach
                                                   </select>
                                                   <input type="hidden" name="order_detail_id" value="{{$od->o_d_id}}">
                                                   <!-- <div class=""> -->
                                                      <input type="submit" value="Edit Order" class="btn btn-success">
                                                  <!-- </div> -->
                                               </div>
                                           </div>
                                          </form>
                                        </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
