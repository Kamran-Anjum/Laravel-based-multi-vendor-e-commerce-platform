@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Analytics</a> <a href="#" class="current">View Analytics</a> </div>
    <h1>Analytics</h1>
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
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>View Analytics</h5>
          </div>
          <div class="widget-content">
            <div class="control-group">
                <label class="control-label"><strong>Select</strong></label>
                <div class="controls">
                    <select class="get_analytics_data" name="get_analytics_data" id="get_analytics_data">
                      <option value="over_all" selected>Overall Web Pages</option>
                      <option value="products">Products</option>
                      <option value="products_add_to_cart">Products Add to Cart</option>
                      <option value="products_delete_from_cart">Products Delete From Cart</option>
                      <option value="products_order_checkout">Products Order Checkout</option>
                    </select>
                </div>
            </div>
          </div>
        </div>

        <div class="widget-box" id="over_all">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Overall Web Pages</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Page</th>
                  <th>Visits</th>
                  <th>Last Visited On</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
              	@foreach($overall_web_pages as $data)
                  <tr class="gradeX">
                    <td>{{ $i }}</td>
                    <td>{{ $data->page }}</td>
                    <td>{{ $data->visit_count }}</td>
                    <td>{{ $data->last_visit_time }}</td>
                  </tr>
                  <?php $i = $i+1; ?>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="widget-box hidden" id="products">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product</th>
                  <th>Visits</th>
                  <th>Last Visited On</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($product_visits as $data)
                  <tr class="gradeX">
                    <td>{{ $i }}</td>
                    <td>{{ $data->productName }}</td>
                    <td>{{ $data->visit_count }}</td>
                    <td>{{ $data->last_visit_time }}</td>
                  </tr>
                  <?php $i = $i+1; ?>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="widget-box hidden" id="products_add_to_cart">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Products Added To Cart</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product</th>
                  <th>Count</th>
                  <th>Last Added On</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($product_cart_add as $data)
                  <tr class="gradeX">
                    <td>{{ $i }}</td>
                    <td>{{ $data->productName }}</td>
                    <td>{{ $data->action_count }}</td>
                    <td>{{ $data->last_action_time }}</td>
                  </tr>
                  <?php $i = $i+1; ?>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="widget-box hidden" id="products_delete_from_cart">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Products Delete From Cart</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product</th>
                  <th>Count</th>
                  <th>Last Added On</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($product_cart_delete as $data)
                  <tr class="gradeX">
                    <td>{{ $i }}</td>
                    <td>{{ $data->productName }}</td>
                    <td>{{ $data->action_count }}</td>
                    <td>{{ $data->last_action_time }}</td>
                  </tr>
                  <?php $i = $i+1; ?>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <div class="widget-box hidden" id="products_order_checkout">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Products Order Checkout</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product</th>
                  <th>Count</th>
                  <th>Last Order On</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($product_cart_order as $data)
                  <tr class="gradeX">
                    <td>{{ $i }}</td>
                    <td>{{ $data->productName }}</td>
                    <td>{{ $data->action_count }}</td>
                    <td>{{ $data->last_action_time }}</td>
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
