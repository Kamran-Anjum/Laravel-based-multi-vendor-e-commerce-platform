@extends('layouts.vendoruserLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders Details</a> <a href="#" class="current">View Orders Details</a> </div>
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
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View States</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
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
                                  <th>S.No</th>
                                  <th>ORDER DETAIL ID</th>
                                  <th>ORDER ID</th>
                                  <th>PRODUCT NAME</th>
                                  <th>UNIT PRICE</th>
                                  <th>QUANTITY</th>
                                  <th>TOTAL PRICE</th>
                                  <th>ACTIONS</th>
                              </tr>
                                <?php $i = 1; ?>
                                @foreach($orderdetails as $od)
                                    <tr class="gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $od->id }}</td>
                                        <td>{{ $od->order_id }}</td>
                                        <td>{{ $od->name }}</td>
                                        <td>{{ $od->unit_price }}</td>
                                        <td>{{ $od->qty }}</td>
                                        <td>{{ $od->total_price }}</td>
                                        <td>
                                            <a od="{{ $od->id }}" odd="delete-order-detail" href="javascript:"
                                               class="btn btn-danger btn-mini deleteOrderDetail">Delete</a>
                                        </td>

                                    </tr>
                                    <?php $i = $i+1; ?>
                                @endforeach


                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
