var username = "";

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

    $('#logioBtn').click(function(){
        if($('#logioBtn').text() == "Logout"){
            $.ajax({
                url: "server.php",
                type: "POST",
                data: {
                    type: "logout"
                },
                cache: false,
                success: function(dataResult){
                    console.log(dataResult);
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $(window).attr('location','home.php');
                    }
                }
            });
        } else {
            $(window).attr('location','login.php');
        }
    });

    // Fetch latest items
    $.ajax({
        url: "server.php",
        type: "POST",
        data: {
            type: "fetchlatest"				
        },
        cache: false,
        success: function(dataResult){
            var dataReslt = JSON.parse(dataResult);
            $('.dyimg').each(function(i, obj) {
                $(this).attr('src','images/items/' + dataReslt[i].pic);
            });
            $('.dylink').each(function(i, obj) {
                $(this).attr('href','item.php?p=' + dataReslt[i].id);
            });
            $('.dytxt').each(function(i, obj) {
                $(this).attr('href','item.php?p=' + dataReslt[i].id);
                $(this).text(dataReslt[i].itemName);
            });
        }
    });

    // Check logged in
    $.ajax({
        url: "server.php",
        type: "POST",
        data: {
            type: "statuscheck"				
        },
        cache: false,
        success: function(dataResult){
            console.log(dataResult);
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
                $('#logioBtn').text("Logout");
                username = dataResult.username;
            }
            else if(dataResult.statusCode==201){
                $('#logioBtn').text("Login")
            }
        }
    });
});