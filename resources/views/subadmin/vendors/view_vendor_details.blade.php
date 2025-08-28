@extends('layouts.subadminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="#">Vendor</a> 
      <a href="#" class="current">Vendor Details</a> 
    </div>
    <h1>Vendor Details</h1>
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
          <div class="widget-title"> 
            <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Vendor Details</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="" action="" > 
              {{ csrf_field() }}
              <style>
                .form-horizontal .control-label {
                  text-align: left !important;
                  padding-left: 10px !important;
                }
              </style>
              @foreach($vendorDetails as $storeDetail)
              <div class="control-group">
                <label class="control-label"><strong>Store E-mail:</strong></label>
                <label class="control-label">{{ $storeDetail->email }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Store Name:</strong></label>
                <label class="control-label">{{ $storeDetail->store_name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Company Legal Name:</strong></label>
                <label class="control-label">{{ $storeDetail->company_legal_name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Selling Product Type:</strong></label>
                <label class="control-label">{{ $storeDetail->product_kind }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Country:</strong></label>
                <label class="control-label">{{ $storeDetail->countryName }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>City:</strong></label>
                <label class="control-label">{{ $storeDetail->cityName }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Full Address:</strong></label>
                <label class="control-label">{{ $storeDetail->full_address }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Trade License:</strong></label>
                <label class="control-label">
                  <img src=" {{ asset('images/backend_images/vendor_docs/'.$storeDetail->trade_license ) }}" alt="Click To DOWNLOAD" height="75px" width="75px" onclick="window.open(this.src)">
                </label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>National ID:</strong></label>
                <label class="control-label">
                  <img src=" {{ asset('images/backend_images/vendor_docs/'.$storeDetail->national_id ) }}" alt="Click To DOWNLOAD" height="75px" width="75px" onclick="window.open(this.src)">
                </label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Tax Registration Number:</strong></label>
                <label class="control-label">{{ $storeDetail->tax_reg_number }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Tax Registration Certificate:</strong></label>
                <label class="control-label">
                  <img src=" {{ asset('images/backend_images/vendor_docs/'.$storeDetail->tax_reg_certificate ) }}" alt="Click To DOWNLOAD" height="75px" width="75px" onclick="window.open(this.src)">
                </label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Beneficiary Name:</strong></label>
                <label class="control-label">{{ $storeDetail->beneficiary_name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Bank Name:</strong></label>
                <label class="control-label">{{ $storeDetail->bank_name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Branch Name:</strong></label>
                <label class="control-label">{{ $storeDetail->barnch_name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Account Number:</strong></label>
                <label class="control-label">{{ $storeDetail->account_number }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>IBAN Number:</strong></label>
                <label class="control-label">{{ $storeDetail->iban_number }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>SWIFT Code:</strong></label>
                <label class="control-label">{{ $storeDetail->swift_code }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Currency:</strong></label>
                <label class="control-label">{{ $storeDetail->currencyName }} ({{ $storeDetail->currencyCode }})</label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Bank Stemped Document:</strong></label>
                <label class="control-label">
                  <img src=" {{ asset('images/backend_images/vendor_docs/'.$storeDetail->stemped_doc ) }}" alt="Click To DOWNLOAD" height="75px" width="75px" onclick="window.open(this.src)">
                </label>
              </div>
              <div class="control-group">
                <label class="control-label"><strong>Store Active:</strong></label>
                <label class="control-label">@if($storeDetail->isActive == 0) No @else Yes @endif</label>
              </div>
              @endforeach
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
