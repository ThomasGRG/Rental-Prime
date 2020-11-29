$( document ).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:5,
        stagePadding: 50,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
    $('.owl-carousel').on('mousewheel', '.owl-stage', function (e) {
        e.preventDefault();
        if (e.deltaY>0) {
            $('.owl-carousel').trigger('next.owl');
        } else {
            $('.owl-carousel').trigger('prev.owl');
        }
    });
    $(window).scroll(function(){
        if($(this).scrollTop() > 250){
            $('.myBtn').fadeIn();
        }else{
            $('.myBtn').fadeOut();
        }
    });
    $('.myBtn').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});