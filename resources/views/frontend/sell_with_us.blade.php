@extends('layouts.frontLayout.front-design')
@section('content')

<!-- Breadcrumb start -->
<div class="gi-breadcrumb m-b-40">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row gi_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="gi-breadcrumb-title">
                            @if(session()->get('lang') == 'en')
                              Sell With Us
                            @elseif(session()->get('lang') == 'ar')
                             بيع معنا
                            @endif
                        </h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- gi-breadcrumb-list start -->
                        <ul class="gi-breadcrumb-list">
                            <li class="gi-breadcrumb-item">
                                <a href="{{ url(session()->get('lang').'/home') }}">
                                    @if(session()->get('lang') == 'en')
                                        Home
                                    @elseif(session()->get('lang') == 'ar')
                                        بيت
                                    @endif
                                </a>
                            </li>
                            <li class="gi-breadcrumb-item active">
                                @if(session()->get('lang') == 'en')
                                  Sell With Us
                                @elseif(session()->get('lang') == 'ar')
                                 بيع معنا
                                @endif
                            </li>
                        </ul>
                        <!-- gi-breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb end -->

<style type="text/css">
  .file-field.medium .file-path-wrapper {
height: 3rem; }
.file-field.medium .file-path-wrapper .file-path {
height: 2.8rem; }

.file-field.big-2 .file-path-wrapper {
height: 3.7rem; }
.file-field.big-2 .file-path-wrapper .file-path {
height: 3.5rem; }

.cn{
  padding-top: 50px;
  padding-left: 250px;
}

.fm{
  margin-top: 30px;
  margin-left: 40px;
  margin-right: 40px;
  background-color: #fff;
    padding: 20px 25px;
    border: 1px solid #e2e5f1;
    box-shadow: 0 2px 35px 0 rgba(157,52,140,0.05);
    /*padding-left: 100px;
    padding-right: 100px;*/
}

@media only screen and (max-width: 520px) {
  .fm{
      margin-top: 30px;
      margin-left: 0px;
      margin-right: 0px;
      background-color: #fff;
        padding: 20px 25px;
        border: 1px solid #e2e5f1;
        box-shadow: 0 2px 35px 0 rgba(157,52,140,0.05);
    }
}

@media only screen and (max-width: 420px) {
  .fm{
      margin-top: 30px;
      margin-left: 0px;
      margin-right: 0px;
      background-color: #fff;
        padding: 20px 25px;
        border: 1px solid #e2e5f1;
        box-shadow: 0 2px 35px 0 rgba(157,52,140,0.05);
    }
}

@media only screen and (max-width: 320px) {
  .fm{
      margin-top: 30px;
      margin-left: 0px;
      margin-right: 0px;
      background-color: #fff;
        padding: 20px 25px;
        border: 1px solid #e2e5f1;
        box-shadow: 0 2px 35px 0 rgba(157,52,140,0.05);
    }
}


.co{
  padding-top: 20px;
  padding-left:250px;
  padding-right: 250px;
}


.ab{
  display: inline-block;
  padding-left: 20px;
  padding-bottom: 20px;


}
.radioInput.jsx-1640491058 {
    margin: 30px auto 0px;
}
.jsx-1640491058 {
    box-sizing: border-box;
}
.group.jsx-1640491058 {
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    position: relative;
    margin-bottom: 10px;
    cursor: pointer;
}
.group.jsx-1640491058 .wrapper.jsx-1640491058 {
    display: flex;
    margin-left: -30px;
}
.group.jsx-1640491058 .flagWrapper.jsx-1640491058 {
    width: 30px;
}
.group.jsx-1640491058 .flagWrapper.jsx-1640491058 > img.jsx-1640491058 {
    width: 100%;
    display: block;
}
.lab.jsx-1640491058 {
    color: rgb(126, 133, 155);
    font-size: 0.91666rem;
    font-weight: normal;
    max-width: 100%;
    pointer-events: none;
    white-space: nowrap;
    text-overflow: ellipsis;
    line-height: 2;
    margin-left: 10px;
    overflow: hidden;
    transition: all 0.2s ease 0s;
}

.checkmarkWrapper.jsx-1640491058 .inp.jsx-1640491058 {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    top: 0px;
    right: 0px;
    height: 25px;
    width: 25px;
    z-index: 9999;
}

.checkmarkWrapper.jsx-1640491058 .inp.jsx-1640491058:checked ~ .checkmark.jsx-1640491058 {
    background-color: rgb(56, 102, 223);
}

.checkmark.jsx-1640491058 {
    position: absolute;
    top: 0px;
    right: 0px;
    height: 24px;
    width: 24px;
    font-weight: bolder;
    font-size: 23px;
    border-width: 2px;
    border-style: solid;
    border-color: rgb(56, 102, 223);
    border-image: initial;
    border-radius: 50%;
    margin-right: 0px;
    margin-top: 25px;
}

.checkmarkWrapper.jsx-1640491058 .inp.jsx-1640491058:checked ~ .checkmark.jsx-1640491058::after {
    display: block;
}
.checkmarkWrapper.jsx-1640491058 .checkmark.jsx-1640491058::after {
    content: "✓";
    top: -5px;
    left: 3px;
    width: 25px;
    height: 25px;
    color: white;
}

.checkmark.jsx-1640491058::after {
 
    position: absolute;
    
}

.group.jsx-1640491058 {
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    position: relative;
    margin-bottom: 10px;
    cursor: pointer;
    margin-left: 40px;
}

.progressWrapper.jsx-1434954043 {
    margin-bottom: 28px;
    margin-left: 40px;
    margin-right: 40px;
}

.breadCrumbsContainer.jsx-3839930413 {
    background: #5caf9082;
    border-radius: 30em;
    overflow: hidden;
    
    display: flex;
}

.breadCrumbEach.active.activeBorder.jsx-3839930413 {
    border-radius: 0;
}

.breadCrumbEach.active.jsx-3839930413 {
    background: #5caf90;
}
.breadCrumbEach.jsx-3839930413 {
    padding: 5px 5px 5px 0;
    border-top-right-radius: 30em;
    border-bottom-right-radius: 30em;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex: 1;
    -ms-flex: 1;
    flex: 1;
    -webkit-align-items: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
}
}

.crumbBullet.jsx-3839930413>img.jsx-3839930413 {
    width: 100%;
}

.crumbText.jsx-3839930413 {
    color: #404553;
    text-transform: uppercase;
    font-size: 0.714rem;
    font-weight: 700;
    white-space: nowrap;
}

}
@media only screen and (min-width: 768px){
.crumbBullet.jsx-3839930413 {
    width: 25px;
    height: 25px;
    margin: 0 7px;
}
}
.crumbBullet.jsx-3839930413 {
     width: 18px; 
     height: 18px; 
     background: #fff; 
     border-radius: 100%; 
     margin: 0 5px; 
     display: -webkit-box; 
     display: -webkit-flex; 
    display: -ms-flexbox;
     display: flex; 
     -webkit-align-items: center; 
     -webkit-box-align: center; 
    -ms-flex-align: center;
     align-items: center; 
     -webkit-box-pack: center; 
     -webkit-justify-content: center; 
    -ms-flex-pack: center;
     justify-content: center; 
}

.store{
    /*padding-left: 250px;*/
    text-align: center;
    padding-bottom: 30px;
    font-size: 1.5rem;
    font-weight: 700;
    font-family: 'Proxima Nova',sans-serif;
    color: #4b5966;
}

.seller{
    padding-left: 265px;    
    padding-bottom: 10px;
    font-size: 1.5rem;
    font-weight: 700;
    font-family: 'Proxima Nova',sans-serif;
    color: #5caf90;
}

.load {
  position: relative;
  overflow: hidden;
  background-color: #5caf90 !important;
  color: #ffffff !important;
  /*font-weight: bold;*/
  text-transform: capitalize;
  border: none;
  border-radius: 20px;
}

.upfile {
  position: absolute;
  font-size: 20px;
  opacity: 0;
  right: 0;
  top: 0;
}

  h3{
    font-size: 19px;
    font-weight: 600;
    font-family: 'Proxima Nova',sans-serif !important;
  }

  .gi-register-wrap{
    padding-bottom: 20px;
  }

</style>

<section class="gi-register padding-tb-40">
  <div class="container">
    <div class="gi-register-wrapper">
      <div class="gi-register-container">
        <div class="">
<!-- <div class="container co"> -->
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <h4 class="store">
                @if(session()->get('lang') == 'en')
                  Create a Store
                @elseif(session()->get('lang') == 'ar')
                 أنشئ متجرًا
                @endif
              </h4>
            </div>
          </div>
          @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{!! session('flash_message_success') !!}</strong>
            </div>
          @endif
          @if(Session::has('flash_message_error'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{!! session('flash_message_error') !!}</strong>
            </div>
          @endif
          <div class="jsx-1434954043 progressWrapper">
            <div class="jsx-3839930413 wrapper">
              <div class="jsx-3839930413 breadCrumbsContainer">
                <div class="jsx-3839930413 breadCrumbEach active " id="progress-div-1">
                  <div class="jsx-3839930413 crumbBullet active " id="sec-progress-div-1">
                    <div class="jsx-3839930413 active " id="third-progress-div-1">  
                    </div>
                      <img src="{{ asset('/svg/login1.svg') }}" alt="login" class="jsx-3839930413">
                  </div>
                  <div class="jsx-3839930413 crumbText">
                    @if(session()->get('lang') == 'en')
                      Email
                    @elseif(session()->get('lang') == 'ar')
                      بريد الالكتروني
                    @endif
                  </div>
                </div>
                <div class="jsx-3839930413 breadCrumbEach  " id="progress-div-2">
                  <div class="jsx-3839930413 crumbBullet  " id="sec-progress-div-2">
                    <div class="jsx-3839930413  " id="third-progress-div-2">                      
                    </div>
                    <img src="{{ asset('/svg/login1.svg') }}" alt="country" class="jsx-3839930413">
                  </div>
                  <div class="jsx-3839930413 crumbText">
                    @if(session()->get('lang') == 'en')
                      Country
                    @elseif(session()->get('lang') == 'ar')
                      دولة
                    @endif
                  </div>
                </div>
                <div class="jsx-3839930413 breadCrumbEach " id="progress-div-3">
                  <div class="jsx-3839930413 crumbBullet " id="sec-progress-div-3">
                    <div class="jsx-3839930413 " id="third-progress-div-3">                     
                    </div>
                    <img src="{{ asset('/svg/login1.svg') }}" alt="store" class="jsx-3839930413">
                  </div>
                  <div class="jsx-3839930413 crumbText">
                    @if(session()->get('lang') == 'en')
                      Store
                    @elseif(session()->get('lang') == 'ar')
                      متجر
                    @endif
                  </div>
                </div>
                <div class="jsx-3839930413 breadCrumbEach " id="progress-div-4">
                  <div class="jsx-3839930413 crumbBullet " id="sec-progress-div-4">
                    <div class="jsx-3839930413 " id="third-progress-div-4">
                      
                    </div>
                    <img src="{{ asset('/svg/login1.svg') }}" alt="doc" class="jsx-3839930413">
                  </div>
                  <div class="jsx-3839930413 crumbText">
                    @if(session()->get('lang') == 'en')
                      Document
                    @elseif(session()->get('lang') == 'ar')
                      وثيقة
                    @endif
                  </div>
                </div>
                <div class="jsx-3839930413 breadCrumbEach " id="progress-div-5">
                  <div class="jsx-3839930413 crumbBullet " id="sec-progress-div-5">
                    <div class="jsx-3839930413 " id="third-progress-div-5">
                    </div>
                    <img src="{{ asset('/svg/login1.svg') }}" alt="bank" class="jsx-3839930413">
                  </div>
                  <div class="jsx-3839930413 crumbText">
                    @if(session()->get('lang') == 'en')
                      Bank
                    @elseif(session()->get('lang') == 'ar')
                      مصرف
                    @endif
                  </div>
                </div>
                <div class="jsx-3839930413 breadCrumbEach " id="progress-div-6">
                  <div class="jsx-3839930413 crumbBullet " id="sec-progress-div-6">
                    <div class="jsx-3839930413 " id="third-progress-div-6">
                    </div>
                    <img src="{{ asset('/svg/login1.svg') }}" alt="vat" class="jsx-3839930413">
                  </div>
                  <div class="jsx-3839930413 crumbText">
                    @if(session()->get('lang') == 'en')
                      Vat
                    @elseif(session()->get('lang') == 'ar')
                      ضريبة القيمة المضافة
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>

          <form role="form" action="{{ url(session()->get('lang').'/sell-with-us')}}" method="post" enctype="multipart/form-data" class="fm" novalidate="novalidate" name="add_shop" id="add_shop">
          <!-- <form action="{{ url(session()->get('lang').'/sell-with-us') }}" method="post" enctype="multipart/form-data"> -->
            {{ csrf_field() }}
            @if(session()->get('lang') == 'en')
              <div class="row setup-content" id="step-1">
                <div class="col-md-12">
                  <div class="gi-register-wrap">
                    <label class="control-label">Email</label>
                    <input type="email" name="email" id="email" required="required" value="" onkeyup = "changeVal()" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">Password</label>
                    <input type="password" name="password" id="password" required="required" class="form-control validate" placeholder="">
                  </div>
                  <br>
                  <button class="btn btn-primary nextBtn-one pull-right" id="1" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">Next</button>
                </div>
              </div>
              <div class="row setup-content" id="step-2">
                <div class="col-md-12">
                  <div class="gi-register-wrap">
                    <label class="control-label">Country</label>            
                    <select class="mdb-select form-control frontend_customer_country_class" name="country_id" id="country_id" required="required">
                          {!! $countries_dropdown !!}
                    </select>
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">City</label>
                    <select class="mdb-select form-control" name="city_id" id="customer_city_id" required="required">
                    </select>
                  </div>
                  <br>
                  <button class="btn btn-primary prevBtn pull-left" id="2" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">Go Back</button>
                  <button class="btn btn-primary nextBtn-two pull-right float-right" id="2" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">Next</button>     
                </div>
              </div>
              <div class="row setup-content" id="step-3">
                <div class="col-md-12">
                  <h3>Seller Details</h3><hr>
                   <div class="gi-register-wrap">
                    <label data-error="wrong" data-success="right">Email</label>
                    <input type="email" name="email2" required="required" id="email2" value="" disabled="" class="form-control validate">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">What's your store name?</label>
                    <input type="text" name="store_name" id="store_name" required="required" class="form-control validate">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">Company Legal Name</label>
                    <input type="text" name="company_legal_name" id="company_legal_name" required="required" class="form-control validate">
                  </div>
                   <div class="gi-register-wrap">
                    <label class="control-label">What kind of product do you want to sell</label>
                    <input type="text" name="product_kind" id="product_kind" required="required" class="form-control validate">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">Full Address</label>
                    <textarea  required="required" name="full_address" id="full_address" class="md-textarea form-control validate" rows="5" ></textarea>
                  </div>
                  <br>
                  <button class="btn btn-primary prevBtn pull-left" id="3" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">Go Back</button>
                  <button class="btn btn-primary nextBtn-three pull-right float-right" id="3" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">Next</button>     
                </div>
              </div>

              <div class="row setup-content" id="step-4">
                <div class="col-md-12">
                  <h3>Document Verification</h3><hr>
                  <div class="form-group">
                    <label  class="col-md-12 control-label">Upload Trade License</label>                        
                   <div class="file btn btn-primary load">
                      <!-- Browse Files upfile-->
                      <input class="" type="file" name="trade_license" id="trade_license" required="required" />
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <label data-error="wrong" data-success="right" class="col-md-12">Upload National ID</label>            
                       <div class="file btn btn-primary load">
                      <!-- Browse Files upfile-->
                      <input class="" type="file" name="national_id" id="national_id" required="required" />
                    </div>
                  </div>
                  <br>
                  <button class="btn btn-primary prevBtn pull-left" id="4" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">Go Back</button>
                  <button class="btn btn-primary nextBtn-four pull-right float-right" id="4" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">Next</button>
                </div>
              </div>

              <div class="row setup-content" id="step-5">
                <div class="col-md-12">
                  <h3>Bank Details</h3><hr>
                  <div class="gi-register-wrap">
                    <label class="control-label">Beneficiary Name</label>
                    <input type="text" name="beneficiary_name" id="beneficiary_name" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">Bank Name</label>
                    <input type="text" name="bank_name" id="bank_name" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">Branch Name</label>
                    <input type="text" name="barnch_name" id="barnch_name" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">Account Number</label>
                    <input type="text" name="account_number" id="account_number" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">IBAN Number</label>
                    <input type="text" name="iban_number" id="iban_number" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">Swift Code</label>
                    <input type="text" name="swift_code" id="swift_code" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">Currency</label>            
                    <select class="mdb-select form-control" name="currency_id" id="currency_id" required="required">
                        {!! $priceunits_dropdown !!}
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="email" data-error="wrong" data-success="right" class="col-md-12">Upload Stamped Bank Document</label>            
                    <div class="file btn btn-primary load">
                      <!-- Browse Files upfile-->
                      <input class="" type="file" name="stemped_doc" id="stemped_doc" required="required" />
                    </div>
                  </div>
                  <br>
                  <button class="btn btn-primary prevBtn pull-left" id="5" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">Go Back</button>
                  <button class="btn btn-primary nextBtn-five pull-right float-right" id="5" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">Next</button>
                </div>
              </div>
              <div class="row setup-content" id="step-6">
                <div class="col-md-12">
                  <h3>VAT Details</h3><hr>
                  <div class="gi-register-wrap">
                    <label class="control-label">Tax Registration Number</label>
                    <input type="text" name="tax_reg_number" id="tax_reg_number" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="form-group">
                    <label data-error="wrong" data-success="right" class="col-md-12 control-label">Upload Tax Registration Certificate</label>       
                    <div class="file btn btn-primary load">
                      <!-- Browse Files upfile -->
                      <input class="" type="file" name="tax_reg_certificate" id="tax_reg_certificate" required="required" />
                    </div>
                  </div>
                  <br>
                  <div class="row ab">            
                    <p> I acknowledge and agree that noon will ve raising facilitating VAT invoices and vredit notes on behalf of my company in relation to consumer transactions on the noon site</p>
                    <input type="checkbox" class="chk_marked" required="required"><input type="checkbox" checked class="unchk_marked" style="display: none;"> I Agree
                  </div>   
                  <br>     
                  <button class="btn btn-primary prevBtn pull-left" id="6" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">Go Back</button>
                  <button class="btn btn-success float-right btn-submit" id="6" type="submit" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">Submit</button>
                </div>
              </div>
            @elseif(session()->get('lang') == 'ar')
              <div class="row setup-content" id="step-1">
                <div class="col-md-12">
                  <div class="gi-register-wrap">
                    <label class="control-label">بريد الالكتروني</label>
                    <input dir="rtl" type="email" name="email" id="email" required="required" value="" onkeyup = "changeVal()" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">كلمه السر</label>
                    <input dir="rtl" type="password" name="password" id="password" required="required" class="form-control validate" placeholder="">
                  </div>
                  <br>
                  <button class="btn btn-primary nextBtn-one pull-right" id="1" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">التالي</button>
                </div>
              </div>
              <div class="row setup-content" id="step-2">
                <div class="col-md-12">
                  <div class="gi-register-wrap">
                    <label class="control-label">دولة</label>            
                    <select dir="rtl" class="mdb-select form-control frontend_customer_country_class" name="country_id" id="country_id" required="">
                        {!! $countries_dropdown !!}
                    </select>
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">مدينة</label>
                    <select dir="rtl" class="mdb-select form-control" name="city_id" id="customer_city_id" required="">
                    </select>
                  </div>
                  <br>
                  <button class="btn btn-primary prevBtn pull-left" id="2" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">عد</button>
                  <button class="btn btn-primary nextBtn-two pull-right float-right" id="2" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">التالي</button>
           
                </div>
              </div>
              <div class="row setup-content" id="step-3">
                <div class="col-md-12">
                  <h3>تفاصيل البائع</h3><hr>
                   <div class="gi-register-wrap">
                    <label data-error="wrong" data-success="right">بريد الالكتروني</label>
                    <input dir="rtl" type="email" name="email2" required="required" id="email2" value="" disabled="" class="form-control validate">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">ما اسم متجرك؟</label>
                    <input dir="rtl" type="text" name="store_name" id="store_name" required="required" class="form-control validate">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">الاسم القانوني للشركة</label>
                    <input dir="rtl" type="text" name="company_legal_name" id="company_legal_name" required="required" class="form-control validate">
                  </div>
                   <div class="gi-register-wrap">
                    <label class="control-label">ما نوع المنتج الذي تريد بيعه</label>
                    <input dir="rtl" type="text" name="product_kind" id="product_kind" required="required" class="form-control validate">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">العنوان الكامل</label>
                    <textarea dir="rtl" required="required" name="full_address" id="full_address" class="md-textarea form-control validate" rows="5" ></textarea>
                  </div>
                  <br>
                  <button class="btn btn-primary prevBtn pull-left" id="3" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">عد</button>
                  <button class="btn btn-primary nextBtn-three pull-right float-right" id="3" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">التالي</button>     
                </div>
              </div>

              <div class="row setup-content" id="step-4">
                <div class="col-md-12">
                  <h3>التحقق من الوثيقة</h3><hr>
                  <div class="form-group">
                    <label  class="col-md-12 control-label">تحميل الرخصة التجارية</label>                        
                   <div class="file btn btn-primary load">
                      <!-- upfileتصفح ملفات -->
                      <input class="" type="file" name="trade_license" id="trade_license" required="" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label data-error="wrong" data-success="right" class="col-md-12">تحميل الرقم القومي</label>            
                       <div class="file btn btn-primary load">
                      <!--upfile تصفح ملفات -->
                      <input class="" type="file" name="national_id" id="national_id" required="" />
                    </div>
                  </div>
                  <br>
                  <button class="btn btn-primary prevBtn pull-left" id="4" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">عد</button>
                  <button class="btn btn-primary nextBtn-four pull-right float-right" id="4" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">التالي</button>
                </div>
              </div>

              <div class="row setup-content" id="step-5">
                <div class="col-md-12">
                  <h3>تفاصيل البنك</h3><hr>
                 <div class="gi-register-wrap">
                    <label class="control-label">أسم المستفيد</label>
                    <input dir="rtl" type="text" name="beneficiary_name" id="beneficiary_name" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">اسم البنك</label>
                    <input dir="rtl" type="text" name="bank_name" id="bank_name" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">اسم الفرع</label>
                    <input dir="rtl" type="text" name="barnch_name" id="barnch_name" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">رقم حساب</label>
                    <input dir="rtl" type="text" name="account_number" id="account_number" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">رقم الآيبان</label>
                    <input dir="rtl" type="text" name="iban_number" id="iban_number" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">رمز السرعة</label>
                    <input dir="rtl" type="text" name="swift_code" id="swift_code" required="required" class="form-control validate" placeholder="">
                  </div>
                  <div class="gi-register-wrap">
                    <label class="control-label">عملة</label>            
                    <select dir="rtl" class="mdb-select form-control" name="currency_id" id="currency_id" required="">
                        {!! $priceunits_dropdown !!}
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="email" data-error="wrong" data-success="right" class="col-md-12">تحميل مستند بنكي مختوم</label>            
                    <div class="file btn btn-primary load">
                      <!-- upfileتصفح ملفات -->
                      <input class="" type="file" name="stemped_doc" id="stemped_doc" required="" />
                    </div>
                  </div>
                  <br>
                  <button class="btn btn-primary prevBtn pull-left" id="5" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">عد</button>
                  <button class="btn btn-primary nextBtn-five pull-right float-right" id="5" type="button" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">التالي</button>
                </div>
              </div>
              <div class="row setup-content" id="step-6">
                <div class="col-md-12">
                  <h3>تفاصيل ضريبة القيمة المضافة</h3><hr>
                  <div class="gi-register-wrap">
                    <label class="control-label">رقم التسجيل الضريبي</label>
                    <input dir="rtl" type="text" name="tax_reg_number" id="tax_reg_number" required="required" class="form-control validate" placeholder="" required="">
                  </div>
                  <div class="form-group">
                    <label data-error="wrong" data-success="right" class="col-md-12 control-label">تحميل شهادة التسجيل الضريبي</label>       
                    <div class="file btn btn-primary load">
                      <!-- upfile تصفح ملفات -->
                      <input class="" type="file" name="tax_reg_certificate" id="tax_reg_certificate" required="" />
                    </div>
                  </div>
                  <br>
                  <div class="row ab">            
                    <p> أقر وأوافق على أن نون سترفع فواتير ضريبة القيمة المضافة الميسرة وإشعارات التحقق نيابة عن شركتي فيما يتعلق بمعاملات المستهلكين على موقع نون</p>
                    <input type="checkbox" class="chk_marked" required="required"> أنا موافق
                  </div>   
                  <br>     
                  <button class="btn btn-primary prevBtn pull-left" id="6" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">عد</button>
                  <button class="btn btn-success btn-submit float-right" id="6" type="submit" style="border:none; border-radius: 20px; font-size: medium; background-color: #5caf90 !important;">يقدم</button>
                </div>
              </div>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


  

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>

   $(document).ready(function(){
        emptyCart();
    });

   $(window).on('load', function() {
    $(".btn-submit").prop('disabled', true);
  });

   

</script>
<script type="text/javascript">

  $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn'),
        allPrevBtn = $('.prevBtn');

    allWells.hide();
    $('#step-1').show();
  
    allPrevBtn.click(function(){

      var curStep = parseInt($(this).closest('button').attr("id"));
      $('#progress-div-'+curStep).removeClass('activeBorder');
      $('#sec-progress-div-'+curStep).removeClass('activeBorder');
      $('#third-progress-div-'+curStep).removeClass('activeBorder');
      $('#progress-div-'+curStep).removeClass('active');
      $('#sec-progress-div-'+curStep).removeClass('active');
      $('#third-progress-div-'+curStep).removeClass('active');
      $('#step-'+curStep).hide(); 
      curStep = curStep - 1;

      // console.log(curStep);
      $('#step-'+curStep).show();
      $('#progress-div-'+curStep).removeClass('activeBorder');
      $('#sec-progress-div-'+curStep).removeClass('activeBorder');
      $('#third-progress-div-'+curStep).removeClass('activeBorder');

    });

    $('.nextBtn-one').click(function(){

      var curStep = parseInt($(this).closest('button').attr("id"));

      if (curStep == 1 && $('#email').val() == '' || $('#password').val() == '') {

        alert('Oops, looks like something is missing!');

      } else {

        // alert("Yay, we're good to go!");
        
        $('#progress-div-'+curStep).addClass('activeBorder');
        $('#sec-progress-div-'+curStep).addClass('activeBorder');
        $('#third-progress-div-'+curStep).addClass('activeBorder');
        $('#step-'+curStep).hide(); 
        curStep = curStep + 1;

        // console.log(curStep);
        $('#step-'+curStep).show();
        $('#progress-div-'+curStep).addClass('active');
        $('#sec-progress-div-'+curStep).addClass('active');
        $('#third-progress-div-'+curStep).addClass('active');

      }

    });

    $('.nextBtn-two').click(function(){

      var curStep = parseInt($(this).closest('button').attr("id"));

      if (curStep == 2 && $('#country_id').val() == "0" || $('#customer_city_id').val() == null) {

        alert('Oops, looks like something is missing!');

      } else {

        // alert("Yay, we're good to go!");
        
        $('#progress-div-'+curStep).addClass('activeBorder');
        $('#sec-progress-div-'+curStep).addClass('activeBorder');
        $('#third-progress-div-'+curStep).addClass('activeBorder');
        $('#step-'+curStep).hide(); 
        curStep = curStep + 1;

        // console.log(curStep);
        $('#step-'+curStep).show();
        $('#progress-div-'+curStep).addClass('active');
        $('#sec-progress-div-'+curStep).addClass('active');
        $('#third-progress-div-'+curStep).addClass('active');

      }

    });

    $('.nextBtn-three').click(function(){

      var curStep = parseInt($(this).closest('button').attr("id"));

      if (curStep == 3 && $('#company_legal_name').val() == '' || $('#store_name').val() == '' || $('#product_kind').val() == '' || $('#full_address').val() == '') {

        alert('Oops, looks like something is missing!');

      } else {

        // alert("Yay, we're good to go!");
        
        $('#progress-div-'+curStep).addClass('activeBorder');
        $('#sec-progress-div-'+curStep).addClass('activeBorder');
        $('#third-progress-div-'+curStep).addClass('activeBorder');
        $('#step-'+curStep).hide(); 
        curStep = curStep + 1;

        // console.log(curStep);
        $('#step-'+curStep).show();
        $('#progress-div-'+curStep).addClass('active');
        $('#sec-progress-div-'+curStep).addClass('active');
        $('#third-progress-div-'+curStep).addClass('active');

      } 

    });

    $('.nextBtn-four').click(function(){

      var curStep = parseInt($(this).closest('button').attr("id"));

      if (curStep == 4 && $('#trade_license').val() == '' || $('#national_id').val() == '') {

        alert('Oops, looks like something is missing!');

      } else {

        // alert("Yay, we're good to go!");
        
        $('#progress-div-'+curStep).addClass('activeBorder');
        $('#sec-progress-div-'+curStep).addClass('activeBorder');
        $('#third-progress-div-'+curStep).addClass('activeBorder');
        $('#step-'+curStep).hide(); 
        curStep = curStep + 1;

        // console.log(curStep);
        $('#step-'+curStep).show();
        $('#progress-div-'+curStep).addClass('active');
        $('#sec-progress-div-'+curStep).addClass('active');
        $('#third-progress-div-'+curStep).addClass('active');

      }

    });

    $('.nextBtn-five').click(function(){

      var curStep = parseInt($(this).closest('button').attr("id"));

      if (curStep == 5 && $('#beneficiary_name').val() == '' || $('#bank_name').val() == '' || $('#barnch_name').val() == '' || $('#account_number').val() == '' || $('#iban_number').val() == '' || $('#swift_code').val() == '' || $('#currency_id').val() == null || $('#stemped_doc').val() == '') {

        alert('Oops, looks like something is missing!');

      } else {

        // alert("Yay, we're good to go!");
        
        $('#progress-div-'+curStep).addClass('activeBorder');
        $('#sec-progress-div-'+curStep).addClass('activeBorder');
        $('#third-progress-div-'+curStep).addClass('activeBorder');
        $('#step-'+curStep).hide(); 
        curStep = curStep + 1;

        // console.log(curStep);
        $('#step-'+curStep).show();
        $('#progress-div-'+curStep).addClass('active');
        $('#sec-progress-div-'+curStep).addClass('active');
        $('#third-progress-div-'+curStep).addClass('active');

      }

    });

    $('.chk_marked').click(function(){

      if ($(".chk_marked").prop('checked', true)) {
        $(".btn-submit").prop('disabled', true);  
        $('.chk_marked').css('display','none');
        $('.unchk_marked').css('display','inline-block');
      }      

    });

    $('.unchk_marked').click(function(){

      if ($(".unchk_marked").prop('checked', false)) {
        $(".btn-submit").prop('disabled', false);  
        $('.chk_marked').css('display','inline-block');
        $('.unchk_marked').css('display','none');
      }      

    });

  // $('div.setup-panel div a.btn-primary').trigger('click');
  });


  s1 = new String(add_shop.email.value)

  function changeVal() {
    document.add_shop.email2.value = add_shop.email.value;
  }

</script>
