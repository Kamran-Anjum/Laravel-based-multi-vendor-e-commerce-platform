@extends('layouts.subadminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">City</a> <a href="#" class="current">Add City</a> </div>
    <h1>City</h1>
    <h1>
        <div class="button-group">
            <a href="{{ url('subadmin/view-product-cities/'.$productId) }}"><button style="margin-top: -45px" type="button" class="btn btn-mini waves-effect waves-light btn-info">&#60; Back</button></a>
        </div>
    </h1>
  </div>
  <style>
    .form-horizontal .control-label {
      text-align: left !important;
      padding-left: 10px !important;
    }
  </style>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/subadmin/add-product-city/'.$productId) }}" name="add_product_city" id="add_product_city" novalidate="novalidate"> {{ csrf_field() }}
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Add City</h5>
              <button style="height: 36px;" type="button" class="btn btn-info btn-lg pull-right subadmincountryclass_addRow" id="SubAdminCountryCity_btn_add">
                  <a style="color: #fff;" class="icon icon-plus"></a>
              </button>
            </div>
            <div class="widget-content nopadding">
              <div>
                <input type="hidden" name="countrowdata" id="countrowdata" value="1">
                <table id="SubAdminCountryCity_MultiRecGrid" class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <!-- <th style="text-align:center;">S No.</th> -->
                            <th style="text-align:center;">Country / بلد</th>
                            <th style="text-align:center;">City / مدينة</th>
                            <th style="text-align:center;">Remove / إزالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="dynamic_row">
                            @php $sno = 1 @endphp
                            <!-- <td style="text-align:center;">{{--$sno--}}</td> -->
                            <td>
                                <select class="subadmin_product_country_class" name="countryid_{{$sno}}" id="countryid_{{$sno}}">
                                  {!! $countries_dropdown !!}
                                </select>
                            </td>
                            <td>
                                <select name="cityid_{{$sno}}" id="cityid_{{$sno}}">
                                  <option value="0">Select</option>
                                </select>
                            </td>
                            <td style="text-align:center;">
                                <button type="button" id="{{$sno}}" class="btn btn-danger btn-md rmv"><i style="color: #fff;" class="icon icon-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="sub_both" style="text-align: center;" class="form-actions">
            <input style="padding: 5px 50px; font-size: 15px;" type="submit" value="Add City / أضف مدينة" class="btn btn-success">
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
