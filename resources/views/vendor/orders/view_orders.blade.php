@extends('layouts.vendorLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">View Orders</a> </div>
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
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                            <h5>View Orders</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                  <!-- Align columns data to center -->
                              <style>
                              .table th, .table td {
                                  text-align: center;
                                }
                                .table thead th {
                                  vertical-align: top;
                                }
                              </style>
                                  <tr>
                                      <th>S.No</th>
                                      <th>ORDER ID</th>
                                      <th>CUSTOMER NAME</th>
                                      <th>SHIPPING ADDRESS</th>
                                      <th>BILLING ADDRESS</th>
                                      <th>E-MAIL</th>
                                      <th>COUNTRY</th>
                                      <th>CITY</th>
                                      <th>TOTAL</th>
                                      <th>ADDED ON</th>
                                      <th>SCHEDULE</th>
                                      <th>STATUS</th>
                                      <th>ACTIONS</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    
                                  <?php $i = 1; ?>
                                @foreach($orders as $order)

                                    <tr class="gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->firstName }} {{ $order->lastName }}</td>
                                        <td>{{ $order->shipToAddress }}</td>
                                        <td>{{ $order->billToAddress }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->co_name }}</td>
                                        <td>{{ $order->c_name }}</td>
                                        <td>{{ $order->total_amount }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->deliverySchedualDate }}</td>
                                        <td>{{$order->s_name}}</td>

                                        <td class="center" style="text-align:left;">
                                            <a href="{{ url('/vendor/order-detail/'.$order->id ) }}" style="margin:2px 0px;" class="btn btn-primary btn-mini">Detail</a>
                                            <a href="#myModal{{ $order->id }}" data-toggle="modal" style="margin:2px 0px;" class="btn btn-success btn-mini">View</a>
                                            <a href="{{ url('/vendor/edit-order/'.$order->id ) }}" style="margin:2px 0px;" class="btn btn-info btn-mini">Edit</a>
                                            <!-- <a style="margin:2px 0px;" class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $order->id }}" param-route="delete-order" param-user="vendor" href="javascript:">Delete</a> -->
                                        </td>

                                    </tr>

                                    <div id="myModal{{ $order->id }}" class="modal hide">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close" type="button">×</button>
                                            <h3>ORDER DETAILS</h3>
                                        </div>
                                        <div class="modal-body">
                                          <style>
                                            label{
                                              font-size: 12px;
                                            }
                                          </style>
                                            <label> <strong>ORDER ID:</strong> 000{{$order->id}}</label>
                                            <label> <strong>STATUS:</strong> <span class="text-danger">{{ $order->s_name  }}</span></label>
                                            @if(!empty($order->deliverdDate))
                                              <label><strong>DELIVERED ON:</strong>{{ $order->deliverdDate }}</label>
                                            @endif
                                            <label> <strong>CUSTOMER NAME:</strong> {{ $order->firstName }} {{ $order->lastName }}</label>
                                            <label> <strong>EMAIL:</strong> {{ $order->email  }}</label>
                                            <label> <strong>CONTACT NO:</strong> {{ $order->contact  }}</label>
                                            <label> <strong>SHIPPING ADDRESS:</strong> {{ $order->shipToAddress  }}</label>
                                            <label> <strong>BILLING ADDRESS:</strong> {{ $order->billToAddress  }}</label>
                                            <label> <strong>COUNTRY:</strong> {{ $order->co_name  }}</label>
                                            <label> <strong>CITY:</strong> {{ $order->c_name  }}</label>
                                            <label> <strong>AREA:</strong> {{ $order->area_name  }}</label>
                                            <label> <strong>TOTAL WEIGHT:</strong> {{ $order->total_weight  }}</label>
                                            <label> <strong>SUB TOTAL:</strong> {{ $order->total  }}</label>
                                            <label> <strong>SHIPPING FEE:</strong> {{ $order->shippingFee  }}</label>
                                            <label> <strong>TOTAL AMOUNT:</strong> {{$order->total_amount}}</label>
                                            <label> <strong>PAYMENT METHOD:</strong> {{$order->payment_method}}</label>
                                            <label> <strong>PRODUCTS</strong></label>
                                            @foreach($orderdetails as $orderdetail)
                                                @if($order->id == $orderdetail->order_id)

                                                <label>
                                                  <img style="width:40px;" src="{{ asset('/images/backend_images/products/en/small/'.$orderdetail->image) }}"> {{ $orderdetail->p_name }}
                                                  </br>
                                                 <strong>UNIT PRICE: </strong>{{$orderdetail->unit_price}}<br>
                                                 <strong>UNIT WEIGHT: </strong>{{$orderdetail->unit_weight}}<br>
                                                 <strong>QUANTITY: </strong>{{$orderdetail->qty}}<br>
                                                 <strong>TOTAL PRICE: </strong>{{$orderdetail->total_price}}<br>
                                                 <strong>TOTAL WEIGHT: </strong>{{$orderdetail->total_weight}}<br>
                                                </label>
                                                 <hr style="margin:5px 0px !important">
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
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
