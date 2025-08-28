
$(document).ready(function () {
    "use strict";

    /*--------------------- Main Slider ---------------------- */
    var GiMainSlider = new Swiper('.gi-slider.swiper-container', {
        loop: true,
        centeredSlides: true,
        speed: 2000,
        effect: 'slide',
        parallax: true,
        autoplay: {
            delay: 10000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }

    });
    
    /*--------------------- Language and Currency Click to Active ---------------------- */
    $(document).ready(function () {
        $(".header-top-lan li").click(function () {
            $(this).addClass('active').siblings().removeClass('active');
        });
        $(".header-top-curr li").click(function () {
            $(this).addClass('active').siblings().removeClass('active');
        });
    });

    /*--------------------- Day of the deal Slider (offer section) ---------------------- */
    $('.deal-slick-carousel').slick({
        dots: false,
        infinite: true,
        arrows: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 1367,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
              }
            },
            {
              breakpoint: 421,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            },
            {
              breakpoint: 0,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            }
          ]
      });

    /*--------------------- Trending, Top Rated Start Slider ----------------------- */    
    $('.gi-trending-slider, .gi-rated-slider').slick({
        rows: 3,
        dots: false,
        arrows: true,
        infinite: true,
        autoplay:false,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                rows: 2,
                slidesToScroll: 1,
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 540,
            settings: {
                rows: 2,
                slidesToScroll: 1,
                slidesToShow: 1,
            }
        }
        ]
    });

    /*--------------------- Blog slider (Home Page) ---------------------- */
    $('.gi-blog-carousel').owlCarousel({
        margin: 24,
        loop: true,
        dots: false,
        nav: false,
        smartSpeed: 1000,
        autoplay: false,
        items: 3,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            },
            1400: {
                items: 5
            }
        }
    });

    /*--------------------- Newsletter popup Homepage ---------------------- */
    setTimeout( function(){ 
        $("#gi-popnews-bg").fadeIn();
        $("#gi-popnews-box").fadeIn();
    }, 5000);
    $("#gi-popnews-close").click(() => {
        $("#gi-popnews-bg").fadeOut();
        $("#gi-popnews-box").fadeOut();
    });

    $("#gi-popnews-bg").click(() => {
        $("#gi-popnews-bg").fadeOut();
        $("#gi-popnews-box").fadeOut();
    });
});

/*--------------------------------------------------------------------- */
/*--------------------------- Cart Function --------------------------- */
/*--------------------------------------------------------------------- */


$(document).on('click',".deleteCartItems",function () {
    var cart_id = $(this).attr('param-id');
    var cart_route = $(this).attr('param-route');
    var cart_user = $(this).attr('param-user');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to delete this item!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {

        if (result.value) {
          window.location.href=cart_user+"/"+cart_route+"/"+cart_id;
        }
    })
});


$(document).on('click',".addtocartBtn",function () {
    var product_id = $(this).attr('id');

    $.ajax({
        url: '/frontend/addtocartAjax/'+product_id,
        success: data_sess => {
            $("#myModal").modal('show');
            setTimeout(function(){
                $('#myModal').modal('hide')
            }, 2000);
            
            $("#cart_icon_btn").attr("data-badge", data_sess);
            $(".gi-cart-count").html(data_sess);

            $.ajax({
                url: '/frontend/sidecartshow',
                success: data_cart => {
                    console.log(data_cart);
                    $(".gi-cart-inner").empty();
                    $(".gi-cart-inner").append(data_cart);
                }
            });

        }
    });
});

$(document).on('click','.inc',function(){
    var product_id = $(this).attr('id');

    var row = $(this).closest("tr");
    var row_no = row[0].rowIndex;

    var quantityyy = document.getElementById("qty"+row_no).value;
    quantityyy = parseInt(quantityyy);

    quantityyy = quantityyy+1;
    document.getElementById("qty"+row_no).value = quantityyy;

    var quantity = document.getElementById("qty"+row_no).value;

    $.ajax({
      url: '/frontend/quantitycartAjax/'+product_id+'/'+quantity+'/inc',
      success: data => {
        console.log(data);
        $("#subTotal"+row_no).html(data);
        loadData();
      }
    });

    $.ajax({
      url: '/frontend/quantitycartweightAjax/'+product_id+'/'+quantity+'/inc',
      success: data => {
        console.log(data);
        $("#subWei"+row_no).html(data);
        loadData();
      }
    });

});

$(document).on('click','.dec',function(){
    var product_id = $(this).attr('id');

    var row = $(this).closest("tr");
    var row_no = row[0].rowIndex;

    var quantityyy = document.getElementById("qty"+row_no).value;
    quantityyy = parseInt(quantityyy);
    if(quantityyy <= 1){
      document.getElementById("qty"+row_no).value = 1;
    }else{
      quantityyy = quantityyy-1;
      document.getElementById("qty"+row_no).value = quantityyy;
    }
      
    var quantity = document.getElementById("qty"+row_no).value;

    $.ajax({
      url: '/frontend/quantitycartAjax/'+product_id+'/'+quantity+'/dec',
      success: data => {
        $("#subTotal"+row_no).html(data);
        loadData();
      }
    });

    $.ajax({
      url: '/frontend/quantitycartweightAjax/'+product_id+'/'+quantity+'/dec',
      success: data => {
        $("#subWei"+row_no).html(data);
        loadData();
      }
    });

});

function loadData(){
    var vat_value = $("#vat_value").val();
    console.log(vat_value);
    var sum=0;
    $(".tot").each(function(){
        sum+=parseFloat($(this).text());
    })

    $(".total").html(sum);
    var sum_one = sum / 100;
    var vat_amount = sum_one * vat_value;

    $(".vat_amount").html(vat_amount.toFixed(0));
    // var limit = $("#amountLimit").val();
    // var cost = $("#shippingCost").val();
    // var total = parseInt(cost) + parseInt(sum);
    // if (sum <= limit) {
    //   $("#shipping").html(cost);
    //   $("#totalId").html(total.toFixed(2));
    // }
    // else
    // {
    //   $("#shipping").html('Free'); 
    var total = sum + vat_amount;
      $(".totalId").html(total);
    // }
    console.log(sum);
    // var weight_sum=0;
    // $(".tot_wei").each(function(){
    //     weight_sum+=parseFloat($(this).text());
    // })
    // $("#idweight").html(weight_sum);
    // var weight_total = parseInt(cost) + parseInt(weight_sum);
    // $("#idweight").html(weight_total.toFixed(2));
}
