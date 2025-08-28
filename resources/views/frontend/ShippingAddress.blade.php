@extends('layouts.frontLayout.front_design')
@section('content')

    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="display-4">SHIPPING ADDRESS</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-7 col-xl-7 col-md-12 col-sm-12">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6"><input class="form-control" type="text" name="fname" placeholder="First Name" required="" readonly></div>
                            <div class="form-group col-md-6"><input class="form-control" type="text" name="lname" placeholder="Last Name" required="" readonly></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6"><input class="form-control" type="text" name="cell-no" placeholder="Cell" required="" inputmode="tel" readonly></div>
                            <div class="form-group col-md-6"><input class="form-control" type="text" name="email" placeholder="Email" required="" inputmode="email" readonly></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4"><select class="form-control" style="" name="city" required=""><option value="-1">City</option></select></div>
                            <div class="form-group col-md-4"><select class="form-control" style="" name="country" required=""><option value="-1">Country</option></select></div>
                            <div class="form-group col-md-4"><select class="form-control" style="" name="state" required=""><option value="-1">State</option></select></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12"><textarea class="form-control" name="address" placeholder="Address" rows="3" spellcheck="true" required=""></textarea></div>
                            <div class="form-group" style="margin-left: 5px;"><button class="btn btn-primary border rounded-0" type="button" style="background-color: #bf449e;">PLACE MY ORDER</button></div>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-lg-5 col-xl-5 col-md-12 col-sm-12">
                    <div class="table-responsive table-borderless border rounded-0" style="margin-bottom: 6px;border: 1px solid #bf449e;">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr style="background-color: #ffd9fc;">
                                    <th style="width: 100%;" colspan="2">(1) Items Added in Cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 2;">
                                    <td style="width: 20%;"><img src="assets/img/mono1_.jpg" width="80px" height="80px"></td>
                                    <td style="width: 80%;">
                                        <p style="margin: 0px;color: rgb(191,68,158);"><strong>PRODUCT TITLE</strong></p>
                                        <p style="margin: 0px;">Lorem ipsum dolor sit amet, ea ius enim atqui, eum ut inani zril veritus. Vim cu soluta corpora omittantur. Cum ex suas.</p>
                                        <p style="margin: 0px;">QTY:<span>&nbsp;1</span><button class="btn btn-primary btn-sm border rounded-0 float-right" type="button" style="background-color: rgb(191,68,158);"><i class="fa fa-trash-o"></i></button></p>
                                        <p style="margin: 0px;font-size: 18px;color: rgb(191,68,158);">Rs <strong>2000</strong></p>
                                        <hr>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection
