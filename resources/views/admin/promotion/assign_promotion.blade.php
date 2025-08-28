@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Promotion</a> <a href="#" class="current">Assign Promotion</a> </div>
    <h1>Assign Promotion</h1>
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
              <h5>Promotion</h5>
          </div>
          <div class="widget-content nopEditing">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Type</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr class="gradeX">
                  <td>{{ $promotion->name }}</td>
                  <td>{{ $promotion->amount }}</td>
                  <td>{{ $promotion->type }}</td>
                  <td>{{ $promotion->from_date }}</td>
                  <td>{{ $promotion->to_date }}</td>
                  <td>
                    @if($promotion->isActive == '1')
                        Yes
                      @else
                        No
                      @endif
                  </td>
                  <td>
                    <a href="{{ url('/admin/assign-promotion-to-all-products/'.$promotion->id ) }}" class="btn btn-success btn-mini">Assing</a>
                    <a href="{{ url('/admin/unassign-promotion-to-all-products/'.$promotion->id ) }}" class="btn btn-success btn-mini">Un-Assing</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Category</h5>
          </div>
          <div class="widget-content nopEditing">
            <div class="row-fluid">
            <div class="span1">
                <label class="control-label"><strong>Category</strong></label>
            </div>
            <div class="span6">
                <div class="controls">
                    <select class="language_class" name="cat_dd" id="cat_dd" style="width: 100%;">
                      <option value="0">Select</option>
                      @foreach($categories as $category)
                        @if($category->category_id == $category_id)
                          <option value="{{ $category->category_id }}" selected>{{ $category->name }}</option>
                        @else
                          <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                        @endif  
                      @endforeach
                    </select>
                    <input type="hidden" id="promotion_id" value="{{ $promotion->id }}">
                </div>
            </div>
            <div class="span5">
              @if($category_id == 0)  
                <button disabled class="btn btn-success btn-mini">Assing To Category</a>
              @else  
                  @if($category_select->category_id == $category_id && $category_select->promotion_id == $promotion->id)
                    <a href="{{ url('/admin/unassign-promotion-to-all-category-products/'.$category_id.'/'.$promotion->id ) }}" class="btn btn-success btn-mini">Un-Assing To Category</a>
                  @else
                    <a href="{{ url('/admin/assign-promotion-to-all-category-products/'.$category_id.'/'.$promotion->id ) }}" class="btn btn-success btn-mini">Assing To Category</a>
                  @endif  
              @endif
            </div>
          </div>
          </div>
        </div>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Products</h5>
            <!-- <h5 style="float: right; margin: 0; padding: 0 22px 0 0;">
              Language : <a href="{{ url('/admin/view-en-products' ) }}"><button style="height: 36px; width: 43px;" type="button" class="btn btn-info">En</button></a> &nbsp; <a href="{{ url('/admin/view-ar-products' ) }}"><button style="height: 36px; width: 43px;" type="button" class="btn btn-info">Ar</button></a>
            </h5> -->
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product</th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Price</th>
                  <th>Sale Price</th>
                  <th>Language</th>
                  <th>Image</th>
                  <th>Assing</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
              	@foreach($products as $product)
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $product->name }}</td>
                  <td>
                    @foreach($categories as $category)
                      @if($category->category_id == $product->category_id)
                        @if($category->lang == $product->lang)
                          {{ $category->name }}
                        @endif
                      @endif
                    @endforeach
                  </td>
                  <td>
                    @foreach($brands as $brand)
                      @if($brand->brand_id == $product->brand_id)
                        @if($brand->lang == $product->lang)
                          {{ $brand->name }}
                        @endif
                      @endif
                    @endforeach
                  </td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->saleprice }}</td>
                  <td>{{ $product->lang }}</td>
                  <td>
                    @if(!empty($product->image))
                      @if($product->lang == 'en')
                        <img src=" {{ asset('/images/backend_images/products/en/tiny/'.$product->image ) }}">
                      @elseif($product->lang == 'ar')
                        <img src=" {{ asset('/images/backend_images/products/ar/tiny/'.$product->image ) }}">
                      @endif
                    @endif
                  </td>
                  @if($product->promotion_id > 0)
                      <td>Yes</td>
                  @else
                      <td>No</td>
                  @endif
                  <td class="center">
                      @if($product->promotion_id > 0)
                        @if($product->promotion_id == $promotion->id)
                          <a href="{{ url('/admin/unassign-promotion-to-product/'.$product->id.'/'.$promotion->id ) }}" class="btn btn-success btn-mini">Un-Assing</a>
                        @else
                          <a href="{{ url('/admin/assign-promotion-to-product/'.$product->id.'/'.$promotion->id ) }}" class="btn btn-success btn-mini">Update To This Promotion</a>
                        @endif
                      @else
                        <a href="{{ url('/admin/assign-promotion-to-product/'.$product->id.'/'.$promotion->id ) }}" class="btn btn-success btn-mini">Assing</a>
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
