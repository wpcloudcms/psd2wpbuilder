$(window).load(function() {
    $(".loader").css("opacity", 0), setTimeout(function() {
            $(".loader").hide()
        }, 600),
});
$(document).ready(function(){
    $("#toggle1").click(function(){
        $(".toggle1").show();
        $(".toggle2").hide();
        $(".toggle2").addClass("hidden");
        $(".toggle1").removeClass("hidden");
        $(".monthly.billing").addClass("black");
        $(".annual.billing").removeClass("black");
    });
    $("#toggle2").click(function(){
        $(".toggle2").show();
        $(".toggle1").hide();
        $(".toggle1").addClass("hidden");
        $(".toggle2").removeClass("hidden");
        $(".annual.billing").addClass("black");
        $(".monthly.billing").removeClass("black");
    });
});