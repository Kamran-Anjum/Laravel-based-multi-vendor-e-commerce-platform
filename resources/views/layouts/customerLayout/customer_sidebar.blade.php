<?php $url = url()->current();
 ?>
 @if(Auth::user())
    @if(Auth::user()->hasRole('customer'))
        <div class="col-12 col-sm-12 col-md-4 col-lg-3" style="height: 800px;background-color: #ead3e5;">
            <?php $customer=\Illuminate\Support\Facades\DB::table('customers')->where('user_id','=',Auth::user()->id)->first();?>

            <div style="background-color: #481b3c;height: 220px;margin-right: -15px;margin-left: -15px;padding-top: 20px;">
                @if($customer->image)
                <img class="rounded-circle d-block avatar" src="{{ asset('images/frontend_images/customers/large/'.$customer->image) }}" alt="Avatar" style="vertical-align: middle;margin-right: auto;margin-left: auto;width: 150px;height: 150px;">
                @else
                <img class="rounded-circle d-block avatar" src="{{ asset('images/frontend_images/customers/large/no-img.png') }}" alt="Avatar" style="vertical-align: middle;margin-right: auto;margin-left: auto;width: 150px;height: 150px;">
                @endif
                <h5 class="text-center text-light" style="padding-top: 10px;">
                    <?php
                    echo $customer->first_name.' '.$customer->last_name;
                    ?>
                </h5>
            </div>
            <div style="padding: 20px 0px;">
                <ul class="nav flex-column">
                    <li class="nav-item" style="border-bottom: 1px solid #bf449e !important;"><a class="nav-link" href="{{ url(session()->get('lang').'/my-account') }}" style="color: rgb(72,27,60); <?php if(preg_match("/my-account/i", $url)){?>background-color: rgba(191,68,158,0.48); <?php } ?> <?php if(preg_match("/customer-edit-profile/i", $url)){?>background-color: rgba(191,68,158,0.48); <?php } ?>"><i class="fa fa-th-list"></i>&nbsp; 
                    @if(session()->get('lang') == 'en')
                      Customer Profile
                    @elseif(session()->get('lang') == 'ar')
                     ملف الزائر
                    @endif
                    </a></li>
                    <li class="nav-item" style="border-bottom: 1px solid #bf449e !important;"><a class="nav-link" href="{{ url(session()->get('lang').'/customer-order')}}" style="color: rgb(72,27,60); <?php if(preg_match("/customer-order/i", $url)){?>background-color: rgba(191,68,158,0.48); <?php } ?>"><i class="fa fa-shopping-bag"></i>&nbsp; 
                    @if(session()->get('lang') == 'en')
                      Customer Orders
                    @elseif(session()->get('lang') == 'ar')
                     طلبات العملاء
                    @endif
                    </a></li>
                    <li class="nav-item" style="border-bottom: 1px solid #bf449e !important;"><a class="nav-link" href="{{ url(session()->get('lang').'/customer-change-password') }}" style="color: rgb(72,27,60);<?php if(preg_match("/change-password/i", $url)){?>background-color: rgba(191,68,158,0.48); <?php } ?>"><i class="fa fa-key"></i>&nbsp; 
                    @if(session()->get('lang') == 'en')
                      Change Password
                    @elseif(session()->get('lang') == 'ar')
                     تغيير كلمة المرور
                    @endif
                    </a></li>
                </ul>
            </div>
        </div>
    @else
        <script type="text/javascript">
            var hostnamme = window.location.origin;

            var drived_urlel = "";
            var urrrl = window.location.href;
            if(urrrl.indexOf("/en/") != -1){
                drived_urlel = hostnamme+"/en/home";
            }
            else
            if(urrrl.indexOf("/ar/") != -1){
                drived_urlel = hostnamme+"/ar/home";
            }

            window.location.href = drived_urlel;
        </script>
    @endif
@else
    <script type="text/javascript">
        var hostnamme = window.location.origin;

        var drived_urlel = "";
        var urrrl = window.location.href;
        if(urrrl.indexOf("/en/") != -1){
            drived_urlel = hostnamme+"/en/home";
        }
        else
        if(urrrl.indexOf("/ar/") != -1){
            drived_urlel = hostnamme+"/ar/home";
        }

        window.location.href = drived_urlel;
    </script>
@endif
