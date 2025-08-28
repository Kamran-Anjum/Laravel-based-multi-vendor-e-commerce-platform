@extends('layouts.frontLayout.front_design')

@section('content')

    <div style="margin-top: 50px;margin-bottom: 50px;">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                <!-- <i class="fas fa-check-circle d-sm-flex justify-content-sm-center" style="color: rgb(195,83,157);font-size: 82px;margin-bottom: 10px;"></i> -->
                  <h1 class="display-1 text-center" style="color: rgb(195,83,157);">Customer Services Under Construction!</h1>
              </div>
          </div>
      </div>
  </div>

    <div data-bs-parallax-bg="true" class="newsletter-subscribe" style="background-image: url(&quot;{{ asset('images/frontend_images/65771b184bbac025bf31361dbbd10bae.jpg') }}&quot;);">
        <div class="container">
            <div class="intro">
                <h6 class="display-4 text-center" style="font-size: 38px;">Subscribe for our Newsletter</h6>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
            </div>
            <form class="form-inline" method="post">
                <div class="form-group"><input class="form-control" type="email" style="background-color: rgba(239,241,244,0);" name="email" placeholder="Your Email"></div>
                <div class="form-group"><button class="btn btn-primary" style="background-color: rgb(191,68,158) !important;" type="button">SIGN UP FOR OUR NEWSLETTER</button></div>
            </form>
        </div>
    </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>

   $(document).ready(function(){
        emptyCart();
    })

</script>
