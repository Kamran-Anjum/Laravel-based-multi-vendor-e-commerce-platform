@extends('layouts.vendorLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">Add Orders</a> </div>
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
                            <h5>Add Order</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/vendor/add-order') }}" name="add_order" id="add_order" novalidate="novalidate">

                                {{ csrf_field() }}

                                <div class="control-group">
                                    <label class="control-label">Total</label>
                                    <div class="controls">
                                        <input type="text" name="total" id="total">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">User_id</label>
                                    <div class="controls">
                                        <input type="text" name="user_id" id="user_id">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">City_id</label>
                                    <div class="controls">
                                        <input type="text" name="city_id" id="city_id">
                                    </div>
                                </div>



                                <div class="control-group">
                                    <label class="control-label">Country_id</label>
                                    <div class="controls">
                                        <input type="text" name="country_id" id="country_id">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Added On</label>
                                    <div class="controls">
                                        <input type="text" name="addedOn" id="addedOn">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Delivered Date</label>
                                    <div class="controls">
                                        <input type="text" name="deliverdDate" id="deliverdDate">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Shiping Address</label>
                                    <div class="controls">
                                        <input type="text" name="shipToAddress" id="shipToAddress">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Billing Address</label>
                                    <div class="controls">
                                        <input type="text" name="billToAddress" id="billToAddress">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Status</label>
                                    <div class="controls">
                                        <select id="isActive" name="status" class="status">
                                            <option value="0"> Pending </option>
                                            <option value="1"q> Delivered </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-actions">
                                    <input type="submit" value="Add Order" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection