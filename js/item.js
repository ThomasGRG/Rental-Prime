var itemDetails = "";
var cartDetails = "";
var days = 0;
var username = "";
var dateStart;
var dateEnd;

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
    showTooltip:false,
    useResetBtn:true,
    mobileFriendly:true,
    onSelect: function(date1, date2) {
        dateStart = date1;
        dateEnd = date2;
        var Difference_In_Time = date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        Difference_In_Days += 1;
        days = Difference_In_Days;
        $('.mdays').text("Number of Days: " + Difference_In_Days);
        $('.mrentc').text("Rent: " + ((parseFloat(itemDetails[0].price) + parseFloat(itemDetails[0].deposit) + 500)*Difference_In_Days) + " Rs");
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

    $('.btnEx').click(function(){
        if(username != ""){
            if(sessionStorage.getItem("cartID") == ""){
                $.ajax({
                    url: "server.php",
                    type: "POST",
                    data: {
                        type: "addtocart",
                        username:username,
                        itemID: $(document).getUrlParam("p"),
                        itemName: itemDetails[0].itemName,
                        pic: itemDetails[0].pic,
                        price: itemDetails[0].price,
                        deposit: itemDetails[0].deposit,
                        days: days,
                        count: $('.inputDec').val(),
                        dateStart: dateStart.toString(),
                        dateEnd: dateEnd.toString(),
                    },
                    cache: false,
                    success: function(dataResult){
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){
                            alert('Added to cart!');
                        }
                    }
                });
            } else {
                $.ajax({
                    url: "server.php",
                    type: "POST",
                    data: {
                        type: "editcart",
                        id: sessionStorage.getItem("cartID"),
                        username:username,
                        itemID: $(document).getUrlParam("p"),
                        itemName: itemDetails[0].itemName,
                        pic: itemDetails[0].pic,
                        price: itemDetails[0].price,
                        deposit: itemDetails[0].deposit,
                        days: days,
                        count: $('.inputDec').val(),
                        dateStart: dateStart.toString(),
                        dateEnd: dateEnd.toString(),
                    },
                    cache: false,
                    success: function(dataResult){
                        console.log(dataResult);
                        var dataResult = JSON.parse(dataResult);
                        if(dataResult.statusCode==200){
                            alert('Item edited! Redirecting to cart');
                            sessionStorage.setItem("cartID","")
                            $(window).attr('location','cart.php');
                        }
                    }
                });
            }
        } else {
            alert("Login to add to cart!")
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
            $('.mstock').text("Stock: " + dataReslt[0].stock);
        }
    });

    if(sessionStorage.getItem("cartID") != ""){
        $.ajax({
            url: "server.php",
            type: "POST",
            data: {
                type: "editcartitem",
                id: sessionStorage.getItem("cartID")
            },
            cache: false,
            success: function(dataResult){
                var dataReslt = JSON.parse(dataResult);
                cartDetails = dataReslt;
                console.log(dataReslt);
                $('.inputDec').val(dataReslt[0].count)
                picker.setDateRange(new Date(dataReslt[0].dateStart),new Date(dataReslt[0].dateEnd))
            }
        });
    }

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