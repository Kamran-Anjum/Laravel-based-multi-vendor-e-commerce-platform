@extends('layouts.vendorLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View Products</a> </div>
    <h1>Products</h1>
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
            <h5>View Products</h5>
            <h5 style="float: right; margin: 0; padding: 0 22px 0 0;">
              Language : <a href="{{ url('/vendor/view-en-products' ) }}"><button style="height: 36px; width: 43px;" type="button" class="btn btn-info">En</button></a> &nbsp; <a href="{{ url('/vendor/view-ar-products' ) }}"><button style="height: 36px; width: 43px;" type="button" class="btn btn-info">Ar</button></a>
            </h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Category Name</th>
                  <th>Brand Name</th>
                  <th>Price</th>
                  <th>Sale Price</th>
                  <th>Language</th>
                  <th>Image</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($products as $product)
                <tr class="gradeX">
                  <td>{{ $i }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->code }}</td>
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
                  @if($product->isActive == '1')
                    @if($product->lang == 'en')
                      <td>Yes</td>
                    @elseif($product->lang == 'ar')
                      <td>نعم</td>
                    @endif
                  @else
                    @if($product->lang == 'en')
                      <td>No</td>
                    @elseif($product->lang == 'ar')
                      <td>لا</td>
                    @endif
                  @endif
                  <td class="center">
                    <div style="width: 150px">
                      <a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a>
                      <a href="{{ url('/vendor/edit-product/'.$product->id ) }}" class="btn btn-primary btn-mini">Edit</a>
                      <a class="btn btn-danger btn-mini sa-confirm-delete" param-id="{{ $product->id }}" param-route="delete-product" param-user="vendor" href="javascript:">Delete</a>
                    </div>
                    <p><p/>
                    <div style="width: 150px">
                      <a style="padding: 0 35px;" href="{{ url('/vendor/view-product-cities/'.$product->product_id ) }}" class="btn btn-info btn-mini">View Cities</a>
                    </div>
                  </td>
                </tr>
                <div id="myModal{{ $product->id }}" class="modal hide">
                  <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h3>Product Details</h3>
                  </div>
                  <div class="modal-body">
                    <label><strong>Product Name:</strong> {{ $product->name }} </label>
                    <label><strong>Product Code:</strong> {{ $product->code }} </label>
                    <label><strong>Language:</strong> {{ $product->lang }} </label>
                    <label><strong>Category Name:</strong>
                      @foreach($categories as $category)
                        @if($category->category_id == $product->category_id)
                          @if($category->lang == $product->lang)
                            {{ $category->name }}
                          @endif
                        @endif
                      @endforeach
                    </label>
                    <label><strong>Brand Name:</strong>
                      @foreach($brands as $brand)
                        @if($brand->brand_id == $product->brand_id)
                          @if($brand->lang == $product->lang)
                            {{ $brand->name }}
                          @endif
                        @endif
                      @endforeach
                    </label>
                    <label><strong>Price:</strong> {{ $product->price }} </label>
                    <label><strong>Sale Price:</strong> {{ $product->saleprice }} </label>
                    <label><strong>Discount:</strong> {{ $product->discount }} </label>
                    <label><strong>Price Unit:</strong>
                      @foreach($price_units as $price_unit)
                        @if($price_unit->price_unit_id == $product->price_unit_id)
                          @if($price_unit->lang == $product->lang)
                            {{ $price_unit->name }}
                          @endif
                        @endif
                      @endforeach
                    </label>
                    <label><strong>Quantity:</strong> {{ $product->quantity }} </label>
                    <label><strong>Color:</strong> {{ $product->color }} </label>
                    <label><strong>Height:</strong> {{ $product->height }} </label>
                    <label><strong>Width:</strong> {{ $product->width }} </label>
                    <label><strong>Weight:</strong> {{ $product->weight }} </label>
                    <label><strong>Product Unit:</strong>
                      @foreach($product_units as $product_unit)
                        @if($product_unit->product_unit_id == $product->product_unit_id)
                          @if($product_unit->lang == $product->lang)
                            {{ $product_unit->name }}
                          @endif
                        @endif
                      @endforeach
                    </label>
                    <label><strong>Description:</strong> {{ $product->description }} </label>
                    <label><strong>Long Description:</strong> {{ $product->long_description }} </label>
                    <label>
                      <strong>Is Hot Deal:</strong> 
                      @if($product->isHotDeal == "1")
                        @if($product->lang == "en")
                          yes
                        @elseif($product->lang == "ar")
                           نعم 
                        @endif
                      @else
                        @if($product->lang == "en")
                          no
                        @elseif($product->lang == "ar")
                           رقم 
                        @endif
                      @endif
                    </label>
                    <label>
                      <strong>Is Featured:</strong> 
                      @if($product->isFeatured == "1")
                        @if($product->lang == "en")
                          yes
                        @elseif($product->lang == "ar")
                           نعم 
                        @endif
                      @else
                        @if($product->lang == "en")
                          no
                        @elseif($product->lang == "ar")
                           رقم 
                        @endif
                      @endif
                    </label>
                    <label>
                      <strong>Is Top Offer:</strong> 
                      @if($product->isTopOffer == "1")
                        @if($product->lang == "en")
                          yes
                        @elseif($product->lang == "ar")
                           نعم 
                        @endif
                      @else
                        @if($product->lang == "en")
                          no
                        @elseif($product->lang == "ar")
                           رقم 
                        @endif
                      @endif
                    </label>
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
