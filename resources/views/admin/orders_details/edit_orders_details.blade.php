@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders Details</a> <a href="#" class="current">Edit Order Details</a> </div>
            <h1>Orders Details</h1>
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
                            <h5>Edit Order Details</h5>
                        </div>

                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-order-detail/'.$orderdetails->id) }}" name="edit_order_detail" id="edit_order" novalidate="novalidate">
                                {{ csrf_field() }}
{{--{!! dd($orderdetails) !!}--}}

                                <div class="control-group">
                                    <label class="control-label">Order Id</label>
                                    <div class="controls">
                                        <input type="text" name="order_id" id="order_id" value="{{ $orderdetails->order_id }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product ID</label>
                                    <div class="controls">
                                        <input type="text" name="product_id" id="product_id" value="{{ $orderdetails->product_id }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Quantity</label>
                                    <div class="controls">
                                        <input type="text" name="qty" id="qty" value="{{ $orderdetails->qty }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Unit Price</label>
                                    <div class="controls">
                                        <input type="text" name="unit_price" id="unit_price" value="{{ $orderdetails->unit_price }}">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Total Price</label>
                                    <div class="controls">
                                        <input type="text" name="total_price" id="total_price" value="{{ $orderdetails->total_price }}">
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <input type="submit" value="Edit Order Detail" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection