var username = "";

$( document ).ready(function() {
    
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

    $('#loginBtn').click(function(){
        if($('#loginBtn').text() == "Logout"){
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

    $('#regBtn').click(function(){
            $(window).attr('location','register.php');
    });

    $('#profBtn').click(function(){
        $(window).attr('location','profile.php');
    });
    
    $('#profBtn').click(function(){
        $(window).attr('location','profile.php');
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
                $('#loginBtn').text("Logout");
                username = dataResult.username;
                $('#dropdownMenuButton').text(username)
                $('#profBtn').show()
            }
            else if(dataResult.statusCode==201){
                $('#loginBtn').text("Login")
                $('#dropdownMenuButton').text("Account")
                $('#profBtn').hide()
            }
        }
    });
});