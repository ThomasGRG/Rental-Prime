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
});