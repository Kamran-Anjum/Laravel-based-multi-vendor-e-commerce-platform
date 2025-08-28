@extends('layouts.frontLayout.front_design')
@section('content')

    <div>
        <div style="padding-top: 60px;padding-bottom: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xl-3"></div>
                <div class="col-md-12 col-xl-6">
                    <div style="width: 100%;margin-left: auto;margin-right: auto;background-color: rgba(234,211,229,0.21);border: 2px solid #bf449e;padding-top: 20px;padding-right: 10px;padding-bottom: 20px;padding-left: 10px;">
                        <h6 style="color: rgb(201,73,173);font-size: 26px;"><i class="fa fa-key" style="color: rgb(191,68,158);font-size: 24px;"></i>&nbsp;FORGOT PASSWORD?</h6>
                        <form>
                            <p style="color: rgb(61,61,61);font-size: 14px;">No Worries! Enter your email and we will send a reset password link.</p>
                            <div class="form-group text-center"><input class="form-control" type="email" name="email" placeholder="Enter your email here" style="width: 70%;background-color: rgba(255,255,255,0);border: 1px solid #bf449e;"></div>
                            <div class="form-group"><button class="btn btn-primary btn-sm" type="button" style="background-color: #bf449e;border: none;border-radius: 0;">SEND REQUEST</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12 col-xl-3"></div>
            </div>
        </div>
        </div>
    </div>
 @endsection