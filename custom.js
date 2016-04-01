$(".loader").css("opacity", 0), setTimeout(function() {
            $(".loader").hide()
        }, 600),
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
    
$(document).ready(function(){
 
  // hide our element on page load
    $('.anim1').css('opacity', 0);
    $('.anim2').css('opacity', 0);
    $('.anim3').css('opacity', 0);
    $('.anim4').css('opacity', 0);
    $('.anim4').css('opacity', 0);
    $('.anim5').css('opacity', 0);
    $('.anim6').css('opacity', 0);
    $('.anim7').css('opacity', 0);
    $('.anim8').css('opacity', 0);
    $('.anim9').css('opacity', 0);
    $('.anim10').css('opacity', 0);
    $('.anim11').css('opacity', 0);
    $('.anim12').css('opacity', 0);
});

<script type="text/javascript">//<![CDATA[ 
 $(function(){
 function onScrollInit( items, trigger ) {
 items.each( function() {
 var osElement = $(this),
 osAnimationClass = osElement.attr('data-os-animation'),
 osAnimationDelay = osElement.attr('data-os-animation-delay');
 
 osElement.css({
 '-webkit-animation-delay': osAnimationDelay,
 '-moz-animation-delay': osAnimationDelay,
 'animation-delay': osAnimationDelay
 });
 var osTrigger = ( trigger ) ? trigger : osElement;
 
 osTrigger.waypoint(function() {
 osElement.addClass('animated').addClass(osAnimationClass);
 },{
 triggerOnce: true,
 offset: '90%'
 });
 });
 }
 onScrollInit( $('.os-animation') );
 onScrollInit( $('.staggered-animation'), $('.staggered-animation-container') );
});//]]> 
 </script>