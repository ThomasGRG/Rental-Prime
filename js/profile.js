$( document ).ready(function() {

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
                $(window).attr('location','login.php');
            }
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
    $("#registerForm").on('submit', function(e){
        $(".input_user").removeClass("is-invalid");
        $(".input_first_name").removeClass("is-invalid");
        $(".input_last_name").removeClass("is-invalid");
        $(".input_email").removeClass("is-invalid");
        $(".input_pass1").removeClass("is-invalid");
        $(".input_pass2").removeClass("is-invalid");
        $(".feeduser").text("");
        $(".feedfname").text("");
        $(".feedlname").text("");
        $(".feedemail").text("");
        $(".feedpass1").text("");
        $(".feedpass2").text("");
        e.preventDefault();
        var firstName = $('.input_first_name').val();
        var lastName = $('.input_last_name').val();
        var email = $('.input_email').val();
        var username = $('.input_user').val();
        var pass1 = $('.input_pass1').val();
        var pass2 = $('.input_pass2').val();
        if(firstName!="" && email!="" && username!="" && lastName!="" && pass1!="" && pass2!=""){
            if (pass1 != pass2) {
                $(".input_pass1").addClass("is-invalid");
                $(".feedpass1").text("Passwords don't match!");
                $(".input_pass2").addClass("is-invalid");
                $(".feedpass2").text("Passwords don't match!");
            } else {
                $.ajax({
                    url: "server.php",
                    type: "POST",
                    data: {
                        type: "updateuser",
                        firstName: firstName,
                        lastName: lastName,
                        email: email,
                        username: username,
                        pass1: pass1						
                    },
                    cache: false,
                    success: function(dataResult){
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){
                            alert('Successfully updated!');
                        }
                        else if(dataResult.statusCode==201){
                            if (dataResult.msg == "username exists") {
                                $(".input_user").addClass("is-invalid");
                                $(".feeduser").text("This username is taken");
                            } else if(dataResult.msg == "email exists") {
                                $(".input_email").addClass("is-invalid");
                                $(".feedemail").text("This email is already in use");
                            } else if(dataResult.msg == "error") {
                                alert('Failed to update! Please try again!');
                            }
                        }
                        
                    }
                });   
            }
        }
        else{
            if(username == ""){
                $(".input_user").addClass("is-invalid");
                $(".feeduser").text("This field is required");
            }
            if(firstName == ""){
                $(".input_first_name").addClass("is-invalid");
                $(".feedfname").text("This field is required");
            }
            if(lastName == ""){
                $(".input_last_name").addClass("is-invalid");
                $(".feedlname").text("This field is required");
            }
            if(email == ""){
                $(".input_email").addClass("is-invalid");
                $(".feedemail").text("This field is required");
            }
            if(pass1 == ""){
                $(".input_pass1").addClass("is-invalid");
                $(".feedpass1").text("This field is required");
            }
            if(pass2 == ""){
                $(".input_pass2").addClass("is-invalid");
                $(".feedpass2").text("This field is required");
            }
        }
    });
});