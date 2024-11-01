jQuery(document).ready(function(){
    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery('.main-slider').owlCarousel({
        rtl:true,
        loop:true,
        margin:8,
        nav:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });


    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery('.hero').owlCarousel({
        rtl:true,
        loop:true,
        margin:8,
        nav:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });



    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery('.news-container').owlCarousel({
        rtl:true,
        loop:true,
        margin:8,
        nav:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
});




$(".comment_btn").click(function (e) {
    e.preventDefault();
    Swal.fire({
        title: "نظرتان با موفقیت ثبت گردید",
        icon: "success"
    });
});

$(".fa-bars").click(function (e) {
    e.preventDefault();
    $(".main-menu").toggle();

});


$(".call").click(function (e) {
    e.preventDefault();
    // Hide other dropdowns
    $(".socail-items, .address-items").hide();

    // Set z-index to normal for all
    $(".call, .socail, .address").css("z-index", "1");

    // Show the clicked dropdown and bring it to the socail
    $(".call-items").toggle();
    $(this).css("z-index", "10");
});

$(".socail").click(function (e) {
    e.preventDefault();
    // Hide other dropdowns
    $(".call-items, .address-items").hide();

    // Set z-index to normal for all
    $(".call, .socail, .address").css("z-index", "1");

    // Show the clicked dropdown and bring it to the socail
    $(".socail-items").toggle();
    $(this).css("z-index", "10");
});

$(".address").click(function (e) {
    e.preventDefault();
    // Hide other dropdowns
    $(".call-items, .socail-items").hide();

    // Set z-index to normal for all
    $(".call, .socail, .address").css("z-index", "1");

    // Show the clicked dropdown and bring it to the socail
    $(".address-items").toggle();
    $(this).css("z-index", "10");
});
