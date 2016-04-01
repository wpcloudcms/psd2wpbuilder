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
// Plugin: jQuery.scrollSpeed
// Source: github.com/nathco/jQuery.scrollSpeed
// Author: Nathan Rutzky
// Update: 1.0.2

(function($) {
    
    jQuery.scrollSpeed = function(step, speed, easing) {
        
        var $document = $(document),
            $window = $(window),
            $body = $('html, body'),
            option = easing || 'default',
            root = 0,
            scroll = false,
            scrollY,
            scrollX,
            view;
            
        if (window.navigator.msPointerEnabled)
        
            return false;
            
        $window.on('mousewheel DOMMouseScroll', function(e) {
            
            var deltaY = e.originalEvent.wheelDeltaY,
                detail = e.originalEvent.detail;
                scrollY = $document.height() > $window.height();
                scrollX = $document.width() > $window.width();
                scroll = true;
            
            if (scrollY) {
                
                view = $window.height();
                    
                if (deltaY < 0 || detail > 0)
            
                    root = (root + view) >= $document.height() ? root : root += step;
                
                if (deltaY > 0 || detail < 0)
            
                    root = root <= 0 ? 0 : root -= step;
                
                $body.stop().animate({
            
                    scrollTop: root
                
                }, speed, option, function() {
            
                    scroll = false;
                
                });
            }
            
            if (scrollX) {
                
                view = $window.width();
                    
                if (deltaY < 0 || detail > 0)
            
                    root = (root + view) >= $document.width() ? root : root += step;
                
                if (deltaY > 0 || detail < 0)
            
                    root = root <= 0 ? 0 : root -= step;
                
                $body.stop().animate({
            
                    scrollLeft: root
                
                }, speed, option, function() {
            
                    scroll = false;
                
                });
            }
            
            return false;
            
        }).on('scroll', function() {
            
            if (scrollY && !scroll) root = $window.scrollTop();
            if (scrollX && !scroll) root = $window.scrollLeft();
            
        }).on('resize', function() {
            
            if (scrollY && !scroll) view = $window.height();
            if (scrollX && !scroll) view = $window.width();
            
        });       
    };
    
    jQuery.easing.default = function (x,t,b,c,d) {
    
        return -c * ((t=t/d-1)*t*t*t - 1) + b;
    };
    
})(jQuery);

// Plugin: jQuery.scrollSpeed Ends