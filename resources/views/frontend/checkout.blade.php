@extends('layouts.frontLayout.front-design')
@section('content')

<?php
$cookies = $_COOKIE['CartProduct'];
$cart_arr = explode ("-", $cookies);
$unique = array_unique($cart_arr);
$count = array_count_values($cart_arr);
$items = count($unique);
$index = $unique[0];
$logic =0;
if($index == '')
{ }
else
{
$logic = $logic+1;
}
?>

  <div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6">
                    <form>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border" style="color: rgb(69,69,69);">
                                Returning Customer
                            ?</legend>
                            <div><button class="btn btn-outline-primary" role="button" href="Register_login.blade.php">
                                SIGN IN NOW
                            !</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <form>
                        <fieldset class="scheduler-border">
                            <legend class="scheduler-border" style="color: rgb(69,69,69);">
                                New Customer
                            !</legend>
                            <div><a class="btn btn-outline-primary" role="button" href="Register_login.blade.php">
                                SIGN UP NOW
                            !</a></div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="container" style="margin-bottom:50px;">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="display-4">GUEST CHECKOUT</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-7 col-xl-7 col-md-12 col-sm-12">

                    <form enctype="multipart/form-data" class="form-horizontal"  method="post" action="{{ url('/checkout/place-order') }}" name="add_product" id="add_product"> {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-6"><input class="form-control" type="text" name="fname" placeholder="First Name" required=""></div>
                            <div class="form-group col-md-6"><input class="form-control" type="text" name="lname" placeholder="Last Name" required=""></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input class="form-control" type="text" name="cell-no" placeholder="Cell" required="" inputmode="tel">

                                @if(!empty($byNowProductDetails))

                                @foreach($byNowProductDetails as $product)

                                <?php $value = 1;
                                 $total = $value * $product->price ?>

                                <input type="hidden" name="productid" value="{{ $product->id }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="quantity" value="{{ $value }}">
                                <input type="hidden" name="total" value="{{ $total }}">
                                <input type="hidden" name="items" value="{{ $items }}">

                                @endforeach

                                @else

                                <?php $i = 0; $total = 0; ?>
                                @foreach($productDetails as $products)
                                  @foreach($products as $product)

                                 <?php $value = $count[$product->id];
                                 $subtotal = $value * $product->price;
                                 $total = $total + $subtotal; ?>

                                 <input type="hidden" name="productid<?php echo $i; ?>" value="{{ $product->id }}">
                                 <input type="hidden" name="quantity<?php echo $i; ?>" value="{{ $value }}">
                                 <input type="hidden" name="price<?php echo $i; ?>" value="{{ $product->price }}">
                                 <input type="hidden" name="subtotal<?php echo $i; ?>" value="{{ $subtotal }}">
                                 <input type="hidden" name="total" value="{{ $total }}">
                                 <input type="hidden" name="items" value="{{ $items }}">

                                 @endforeach
                                 <?php $i++; ?>
                                 @endforeach

                                @endif
                            </div>
                            <div class="form-group col-md-6"><input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email"></div>
                        </div>


                        <div class="form-row">
                                <div class="form-group col-md-6"><select class="form-control country frontend_customer_country_class" style="" id="country_id" name="country" placeholder="Country" required="">
                                    <option value="">Select Country</option>
                                    @foreach($country as $countries)
                                    <option value="{{$countries->id}}">{{$countries->name}}</option>
                                    @endforeach
                                </select></div>

                                <div class="form-group col-md-6"><select class="form-control frontend_customer_state_class" style="" name="state" id="customer_state_id">
                                    <option>Select State (optional)</option>
                                </select></div>

                                <div class="form-group col-md-6"><select class="form-control frontend_customer_city_class" style="" name="city" id="customer_city_id" placeholder="City" required="">
                                    <option>Select City</option>
                                </select>
                                </div>

                                <div class="form-group col-md-6"><select class="form-control" style="" name="area" id="customer_area_id" placeholder="Area" required="">
                                    <option>Select Area</option>
                                </select>
                                </div>
                            </div>

                        <div class="form-row">
                            <div class="form-group col-md-12"><textarea class="form-control" name="address" placeholder="Address" rows="3" spellcheck="true" required=""></textarea></div>


                            @if($logic == 1 || !empty($byNowProductDetails))
                            <div class="form-actions" style="margin-left: 5px;">
                            <button class="btn btn-primary border rounded-0" type="submit" style="background-color: #bf449e;">PLACE MY ORDER
                            </button>
                            @elseif($logic == 0)
                            <div class="form-actions" style="margin-left: 5px;">
                            <button class="btn btn-primary border rounded-0" type="submit" disabled style="background-color: #bf449e;">PLACE MY ORDER
                            </button>
                            @endif

                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-12 col-lg-5 col-xl-5 col-md-12 col-sm-12">
                    <div class="table-responsive table-borderless border rounded-0" style="margin-bottom: 6px;border: 1px solid #bf449e;">
                        <table class="table table-bordered table-sm">


                                @if(!empty($byNowProductDetails))
                                @foreach($byNowProductDetails as $product)

                                 <?php   $value = $product->id;
                                      $price = $product->price; ?>

                            <thead>
                                <tr style="background-color: #ffd9fc;">
                                    <th style="width: 100%;" colspan="2">1 Item Added in Cart</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr style="border-bottom: 2;">
                                    <td style="width: 20%;"><img src="{{ asset('/images/backend_images/products/small/'.$product->image ) }}" width="80px" height="80px"></td>
                                    <td style="width: 80%;">
                                        <p style="margin: 0px;color: rgb(191,68,158);"><strong>{{ $product->name }}</strong></p>
                                        <p style="margin: 0px;">{{ $product->description }}</p>
                                        <p style="margin: 0px;">QTY:<span>&nbsp;1</span>
                                            <!-- <button class="btn btn-primary btn-sm border rounded-0 float-right" type="button" style="background-color: rgb(191,68,158);"><i class="fa fa-trash-o"></i></button> -->
                                        </p>
                                        <p style="margin: 0px;font-size: 18px;color: rgb(191,68,158);">Rs <strong>{{ $price }}</strong></p>
                                        <hr>
                                    </td>
                                </tr>
                                @endforeach

                                @else

                            <thead>
                                <tr style="background-color: #ffd9fc;">
                                    <th style="width: 100%;" colspan="2">{{ $items }} Items Added in Cart</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($productDetails as $products)
                                  @foreach($products as $product)

                                 <?php $value = $count[$product->id];
                                       $price = $product->price * $value; ?>



                                <tr style="border-bottom: 2;">
                                    <td style="width: 20%;"><img src="{{ asset('/images/backend_images/products/small/'.$product->image ) }}" width="80px" height="80px"></td>
                                    <td style="width: 80%;">
                                        <p style="margin: 0px;color: rgb(191,68,158);"><strong>{{ $product->name }}</strong></p>
                                        <p style="margin: 0px;">{{ $product->description }}</p>
                                        <p style="margin: 0px;">QTY:<span>&nbsp;{{ $value }}</span><button onclick="deleteCart({{ $product->id }})" class="btn btn-primary btn-sm border rounded-0 float-right" type="button" style="background-color: rgb(191,68,158);"><i class="fa fa-trash-o"></i></button></p>
                                        <p style="margin: 0px;font-size: 18px;color: rgb(191,68,158);">Rs <strong>{{ $price }}</strong></p>
                                        <hr>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach

                                @endif
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>

function citySelect(evtc){
//debugger;
var test= evtc.target.value;
//var id= evtc.target.value;
var Cid=$("select.country").children("option:selected").val();
console.log(Cid);
    $('#city').empty()
        $.ajax({
            url: '/city/'+Cid+'/'+test,
            success: data => {
                //debugger;
                var citydd = $("#city").html();
             //   $(citydd).empty();
                console.log(data + citydd);
                for(var option =0; option<data.length; option++)
                {
                var newOption = document.createElement("option");
                newOption.value = data[option]['id'];
                newOption.innerHTML = data[option]['name'];
                //citydd.options.add(newOption);
                $("#city").append('<option value='+data[option].id+'>'+ data[option].name +'</option>')
                }
                $("#city").prop("disabled", false);
            }
        })
}


function stateSelect(evt){
debugger;
var test=evt.target.value;
console.log(test);
    $('#state').empty()
        $.ajax({
            url: '/statename/'+test,
            success: data => {
                //debugger;
                var statedd = $("#state").html();
             //   $(citydd).empty();
                console.log(data + statedd);
                $("#state").append('<option>Select State</option>');
                for(var option =0; option<data.length; option++)
                {
                var newOption = document.createElement("option");
                newOption.value = data[option]['id'];
                newOption.innerHTML = data[option]['name'];
                //citydd.options.add(newOption);
                $("#state").append('<option value='+data[option].id+'>'+ data[option].name +'</option>');
                }
                $("#state").prop("disabled", false);
                $("#city").prop("disabled", true);
            }
        })
}

</script>
