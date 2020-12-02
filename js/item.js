var itemDetails = "";

var picker = new Litepicker({
    element: document.getElementById('litepicker'),
    firstDay:1,
    format:'D MMM, YYYY',
    lang:'en-US',
    numberOfMonths:2,
    numberOfColumns:2,
    splitView:true,
    inlineMode:true,
    singleMode:false,
    autoApply:true,
    showTooltip:true,
    useResetBtn:true,
    mobileFriendly:true,
    onSelect: function(date1, date2) {
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        Difference_In_Days += 1;
        $('.mdays').text("Number of Days: " + Difference_In_Days);
        $('.mrentc').text("Rent: " + (itemDetails[0].price*Difference_In_Days) + " Rs");
    }
});

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

    // Fetch items
    $.ajax({
        url: "server.php",
        type: "POST",
        data: {
            type: "fetchitem",
            id: $(document).getUrlParam("p")
        },
        cache: false,
        success: function(dataResult){
            var dataReslt = JSON.parse(dataResult);
            itemDetails = dataReslt;
            console.log(dataReslt);
            $('.mpic').attr('src','images/items/' + dataReslt[0].pic);
            $('.mtitle').text(dataReslt[0].itemName);
            $('.mdesc').text(dataReslt[0].description);
            $('.mrent').text(dataReslt[0].price + "/day");
            $('.mrentm').text(dataReslt[0].price*30 + "/month");
            $('.mrentw').text(dataReslt[0].price*7 + "/week");
            $('.mdeposit').text("Refundable Deposit: " + dataReslt[0].deposit);
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
                $('#logioBtn').text("Logout")
            }
            else if(dataResult.statusCode==201){
                $('#logioBtn').text("Login")
            }
        }
    });
});