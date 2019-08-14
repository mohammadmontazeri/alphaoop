$(document).ready(function(){
     $(window).resize(function(){
        var w=$(window).width();
        var h=$(window).height();
        $(".viewports").html(w+" * "+h);
    })
    
    $("#bar_resp").click(function(){
        $(".hidden_menu").toggle();
    })
     $("#search_resp").click(function(){
        $(".hidden_search_box").toggle();
    })
    /*====*/
   /* $(".hidden_mlist").children("li").hover(function(){
        $(this).children("a").toggle("color","red");
    })*/
});