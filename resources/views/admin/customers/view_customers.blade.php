@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Customers</a> <a href="#" class="current">View Customers</a> </div>
            <h1>Customers</h1>
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
                            <h5>View Customers</h5>
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

                                    <th>User Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>E-Mail</th>
                                    <th>Country Name</th>
                                    <th>State Name</th>
                                    <th>City Name</th>
                                    <th>Address</th>
                                    <th>Shipping Address</th>
                                    <th>Billing Address</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                                <tbody>
                                @foreach($customers as $customer)

                                    <tr class="gradeX">
                                        <td>{{ $customer->username }}</td>
                                        <td>{{ $customer->firstname }}</td>
                                        <td>{{ $customer->lastname }}</td>
                                       <td>{{ $customer->email }}</td>
                                       <td>{{ $customer->country }}</td>
                                       <td>{{ $customer->state }}</td>
                                       <td>{{ $customer->city }}</td>
                                       <td>{{ $customer->Address1 }}</td>
                                       <td>{{ $customer->billToAddress }}</td>
                                        <td>{{ $customer->shipToAddress }}</td>

                                        <td>
                                            @if($customer->status == 1)
                                            {{ 'Yes' }}
                                            @else
                                            {{ 'No' }}
                                            @endif
                                        </td>

                                        <td class="center">

                                          <a href="#myModal{{ $customer->id }}" data-toggle="modal" class="btn btn-success btn-mini" style="margin:1px;">View</a>
                                          <a href="{{ url('/admin/edit-customer/'.$customer->id ) }}" class="btn btn-success btn-mini" style="margin:1px;">Edit</a>
                                          <a style="margin:1px;" class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $customer->id }}" param-route="delete-customer" param-user="admin" href="javascript:">Delete</a>
                                        </td>

                                    </tr>

                                    <div id="myModal{{ $customer->id }}" class="modal hide">
                                        <div class="modal-header">
                                            <button data-dismiss="modal" class="close" type="button">×</button>
                                            <h3> Customer Details</h3>
                                        </div>
                                        <div class="modal-body">
                                          <label><strong>Username:</strong> {{$customer->username}}</label>
                                          <label><strong>First Name:</strong> {{ $customer->firstname }}</label>
                                          <label><strong>Last Name:</strong> {{ $customer->lastname }}</label>
                                          <label><strong>Email:</strong> {{$customer->email}}</label>
                                          <label><strong>Country:</strong> {{ $customer->country }}</label>
                                          <label><strong>State:</strong> {{ $customer->state }}</label>
                                          <label><strong>City:</strong> {{ $customer->city }}</label>
                                          <label><strong>Address:</strong> {{ $customer->Address1 }}</label>
                                          <label><strong>Billing Address:</strong> {{ $customer->billToAddress }}</label>
                                          <label><strong>Shipping Address:</strong> {{ $customer->shipToAddress }}</td>
                                          <label><strong>Active:</strong>
                                            @if($customer->status == 1)
                                            {{ 'Yes' }}
                                            @else
                                            {{ 'No' }}
                                            @endif
                                        </label>

                                        </div>
                                    </div>

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
