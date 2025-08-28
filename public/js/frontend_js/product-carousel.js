$('.carousel').carousel({
  interval: false
});

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        768:{
           items:3
        },
        992:{
            items:4
        },
        1200:{
            items:6
        }
    }
})
