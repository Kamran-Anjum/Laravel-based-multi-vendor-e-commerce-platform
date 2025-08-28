@extends('layouts.frontLayout.front_design')
@section('content')

<ol class="breadcrumb text-center d-flex justify-content-xl-center" style="color: rgb(238,162,222);background-color: rgba(159,53,143,0.14);border-radius: 0;/*border: 1px 0px 1px 0px solid #000;*/margin-bottom: 0px;">
    <li class="breadcrumb-item"><a href="{{ url(session()->get('lang').'/home' ) }}"><span style="color: rgb(196,82,162);">Home</span></a></li>
    <li class="breadcrumb-item"><a href="#"><span style="color: rgb(196,82,162);">Seller</span></a></li>
    <li class="breadcrumb-item"><a href="#"><span style="color: rgb(196,82,162);">Seller Products</span></a></li>
</ol>
<br>
<div class="container">
	<div class="row" style="background-color: rgba(159,53,143,0.14);">
		<div class="col-md-12 col-sm-12" style="padding: 15px;">
			<h2 style="color: rgb(196,82,162);">{{ $uservendorname }}</h2>
		</div>
	</div>
	<br>
	<div class="row" id="filter-text-title">
        @foreach($products as $product)
			<div class="col-12 col-sm-6 col-md-4 col-lg-4 col-xl-3" style="padding:0.4rem;">
				<div class="card">
					<a href="{{ url(session()->get('lang').'/product/'.$product->product_idd ) }}">
						<img src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/small/'.$product->image ) }}" style="width: 100%;height:226px; display:block; margin:auto;">
					</a>
					<div style="text-align:left; padding:0.6rem !important;">
						<a style="color:#fff; font-size:0.7rem; background:#f7941d; padding:0 2px;" href="#" >{{ $product->brand_name }}</a>
						<a style="color:#b84691;" href="{{ url(session()->get('lang').'/product/'.$product->product_idd ) }}"><h6>{{ $product->name }} </h6></a>
						<p style="font-size: 0.8rem; margin-bottom:0;  overflow : hidden; text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;">{{ $product->description }} </p>

						@if($product->saleprice != null)
							<p style="margin-bottom:0.2rem;">
								<span class="actual-price" style="font-size:0.8rem;color:#f7941d;">
									<span>{{ $product->price_unit}}</span>&nbsp;<del>{{ $product->price }}</del>
								</span>
								<span class="discount-label" style="background-color: #b8469159; margin: 5px; font-size: 0.6rem; padding: 2px 4px;">{{$product->discount}}% OFF</span>
							</p>
							<p style="font-size: 0.8rem;display: inline-block; margin-bottom: 0.4rem; color:#c452a3;">
								<strong>
									<span class="actual-price"><span>{{ $product->price_unit}}</span>&nbsp;{{$product->saleprice}}</span>
								</strong>
							</p>

							<div class="review_first" style="margin-bottom: 0.2rem; display:inline; font-size:0.8rem; float:right; margin-right:0.4em;">
							    @if($roundoffrating == '0')
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '0.5')
                                  <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '1')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '1.5')
                                  <span class="fa fa-star checked"></span>
                                  <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '2')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '2.5')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '3')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '3.5')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '4')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '4.5')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                @elseif($roundoffrating >= '5')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                @endif
							</div>

							<div style="display:block; width:100%;">
								<button onclick="location.href='{{ url(session()->get('lang').'/checkout/'.$product->product_idd) }}'" id="product-buynow-btn" class="btn btn-primary btn-sm" role="button" style="" data-toggle="" data-target=""><i class="fa fa-shopping-bag"></i>&nbsp; 
									@if(session()->get('lang') == 'en')
									  Buy Now
									@elseif(session()->get('lang') == 'ar')
									  اشتري الآن
									@endif
								</button>

								<button style="margin-top: 0;" id="{{$product->product_idd}}" class="btn btn-primary btn-sm addtocartBtn" role="button"><i class="fas fa-shopping-cart"></i> 
									@if(session()->get('lang') == 'en')
									  Cart
									@elseif(session()->get('lang') == 'ar')
									 عربة التسوق
									@endif
								</button>
							</div>
						@else
							<p style="margin-bottom:0.2rem;">
								<span class="actual-price" style="font-size:0.8rem;color:#f7941d;">
									<span></span>&nbsp;</span>
									<span class="discount-label" style="background-color: #b8469159;margin: 5px;font-size: 10px;/* padding: 2px 4px; */"></span>
							</p>
							<p style="font-size: 0.8rem;display: inline-block; margin-bottom: 0.4rem; color:#c452a3;">
								<strong>
									<span class="actual-price">
										<span>{{ $product->price_unit}}</span>&nbsp;{{$product->price}}
									</span>
								</strong>
							</p>
							<div class="review_first" style="margin-bottom: 0.2rem; display:inline; font-size:0.8rem; float:right; margin-right:0.4em;">
							    @if($roundoffrating == '0')
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '0.5')
                                  <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '1')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '1.5')
                                  <span class="fa fa-star checked"></span>
                                  <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '2')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '2.5')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '3')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star-o"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '3.5')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '4')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star-o"></span>
                                @elseif($roundoffrating <= '4.5')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span style="color: #f99116;" class="fa fa-star-half-o checked"></span>
                                @elseif($roundoffrating >= '5')
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                @endif
							</div>
							<div style="display:block;">
								<button onclick="location.href='{{ url(session()->get('lang').'/checkout/'.$product->product_idd) }}'" id="product-buynow-btn" class="btn btn-primary btn-sm" role="button" style="" data-toggle="" data-target=""><i class="fa fa-shopping-bag"></i>&nbsp; 
									@if(session()->get('lang') == 'en')
									  Buy Now
									@elseif(session()->get('lang') == 'ar')
									  اشتري الآن
									@endif
								</button>

								<button style="margin-top: 0;" id="{{$product->product_idd}}" class="btn btn-primary btn-sm addtocartBtn" role="button"><i class="fas fa-shopping-cart"></i> 
									@if(session()->get('lang') == 'en')
									  Cart
									@elseif(session()->get('lang') == 'ar')
									 عربة التسوق
									@endif
								</button>
							</div>
						@endif
					</div>
				</div>
				<div class="modal fade" role="dialog" tabindex="-1" id="cart-modal{{ $product->product_idd }}">
					<div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
			 					<h6 class="modal-title">1 new item(s) have been added in your cart</h6>
			 					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			 						<span aria-hidden="true">×</span>
			 					</button>
							</div>
							<div class="modal-body">
			    				<div class="form-row">
								    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
								     	<img src="{{ asset('/images/backend_images/products/'.session()->get('lang').'/small/'.$product->image ) }}" style="width:150px; height:150px;">
								    </div>
								    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
									    <p style="color: #212529;">
									      	<strong>{{ $product->name }}</strong>
									    </p>
								        <p style="color: #212529;">{{ $product->description }}</p>

									    @if($product->saleprice != null)
									        <p>
									        	<span style="font-size: 20px;">
									        		<strong>{{ $product->price_unit}} {{ $product->saleprice }}</strong>
									        	</span>&nbsp;
									        </p>
									    @else
									        <p>
									        	<span style="font-size: 20px;">
									        		<strong>{{ $product->price_unit}} {{ $product->price }}</strong>
									        	</span>&nbsp;
									        </p>
									    @endif
								    </div>
									<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
										<h6>My Shopping Cart<span style="font-size: 10px;">&nbsp;(1 Item)</span></h6>

										@if($product->saleprice != null)
											<div class="table-responsive table-borderless">
											    <table class="table table-bordered">
												    <tbody>
												        <tr>
												        	<td style="font-size: 16px;">Subtotal</td>
												        	<td style="font-size: 16px;">{{ $product->saleprice }}</td>
												        </tr>
												        <tr>
												            <td style="font-size: 18px;"><strong>Total</strong></td>
												            <td style="font-size: 18px;"><strong>{{ $product->saleprice }}</strong></td>
												        </tr>
												    </tbody>
											    </table>
											</div>
										@else
											<div class="table-responsive table-borderless">
											    <table class="table table-bordered">
												    <tbody>
												        <tr>
												            <td style="font-size: 16px;">Subtotal</td>
												            <td style="font-size: 16px;">{{ $product->price }}</td>
												        </tr>
												        <tr>
												            <td style="font-size: 18px;"><strong>Total</strong></td>
												            <td style="font-size: 18px;"><strong>{{ $product->price }}</strong></td>
												        </tr>
												    </tbody>
											    </table>
											</div>
										@endif

										<button class="btn btn-primary lilac-btn" type="button" style="margin: 2px;font-size:smaller;">
											<a style="color:#ffffff;" href="{{ url(session()->get('lang').'/checkout/') }}">Check Out</a>
										</button>
										<button class="btn btn-primary lilac-btn" type="button" style="margin: 2px;font-size:smaller;">
											<a style="color:#ffffff;" href="{{ url(session()->get('lang').'/cart/') }}">Go to Cart </a>
										</button>
									</div>
								</div>
							</div>
							<div class="modal-footer d-none"></div>
						</div>
					</div>
				</div>
			</div>
        @endforeach
        @if ($products->isEmpty())
          <div>
            <h5 class="card-title" style="margin-top: 6px;">No items found.</h5>
          </div>  
        @endif
	</div>
</div>

@endsection