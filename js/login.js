$(document).ready(function() {
    $("#registerForm").on('submit', function(e){
        $(".input_user").removeClass("is-invalid");
        $(".input_pass").removeClass("is-invalid");
        $(".feeduser").text("");
        $(".feedpass").text("");
        e.preventDefault();
		var username = $('.input_user').val();
		var pass = $('.input_pass').val();
		if(username!="" && pass!=""){
            $.ajax({
                url: "server.php",
                type: "POST",
                data: {
                    type: "login",
                    username: username,
                    pass: pass						
                },
                cache: false,
                success: function(dataResult){
                    console.log(dataResult);
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        alert('Login Successful! Redirecting to home');
                        $(window).attr('location','home.html');
                    }
                    else if(dataResult.statusCode==201){
                        alert('Username/Password is incorrect!');
                        $(".input_user").addClass("is-invalid");
                        $(".input_pass").addClass("is-invalid");
                    }
                    
                }
            });
		}
		else{
            if(username == ""){
                $(".input_user").addClass("is-invalid");
                $(".feeduser").text("This field is required");
            }
            if(pass == ""){
                $(".input_pass").addClass("is-invalid");
                $(".feedpass").text("This field is required");
            }
		}
    });
});