$(document).ready(function(){
    $("nav#nav-main").css({"display" : "block"});
    $("i.beforelogin").closest("li").addClass("beforelogin");
    $("i.afterlogin").closest("li").addClass("afterlogin");
    $("nav#nav-main ul li a span").after("<p>");
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
// iframe popup javascript starts...

// Get the modal
var modal = document.getElementById('myModal');
var iframe1 = document.getElementById('iframel1');
var iframe2 = document.getElementById('iframel2');
var iframe3 = document.getElementById('iframel3');
var iframe4 = document.getElementById('iframel4');
var iframe5 = document.getElementById('iframel5');
var iframe6 = document.getElementById('iframel6');
var iframe7 = document.getElementById('iframel7');

// Get the button that opens the modal
    var btn1 = document.getElementById("btnpricing1");
    var btn2 = document.getElementById("btnpricing2"); 
    var btn3 = document.getElementById("btnpricing3");
    var btn4 = document.getElementById("btnpricing4");
    var btn5 = document.getElementById("btnpricing5");
    var btn6 = document.getElementById("btnpricing6");
    var btn7 = document.getElementById("btnpricing7");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
window.onload = function(){
btn1.onclick = function() {modal.style.display = "block"; iframe1.style.display = "block"; span.style.display = "block";}
btn2.onclick = function() {modal.style.display = "block"; iframe2.style.display = "block"; span.style.display = "block";}
btn3.onclick = function() {modal.style.display = "block"; iframe3.style.display = "block"; span.style.display = "block";}
btn4.onclick = function() {modal.style.display = "block"; iframe4.style.display = "block"; span.style.display = "block";}
btn5.onclick = function() {modal.style.display = "block"; iframe5.style.display = "block"; span.style.display = "block";}
btn6.onclick = function() {modal.style.display = "block"; iframe6.style.display = "block"; span.style.display = "block";}
btn7.onclick = function() {modal.style.display = "block"; iframe7.style.display = "block"; span.style.display = "block";}
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
         if (event.target == modal) {
         modal.style.display = "none";
         }
    }

// iframe popup javascript ends...
// body scroll lock....
 var body = document.body,
        overlay = document.querySelector('.overlay'),
        overlayBtts = document.querySelectorAll('button[class$="overlay"]');
        
    [].forEach.call(overlayBtts, function(btt) {

      btt.addEventListener('click', function() { 
         
         /* Detect the button class name */
         var overlayOpen = this.className === 'open-overlay';
         
         /* Toggle the aria-hidden state on the overlay and the 
            no-scroll class on the body */
         overlay.setAttribute('aria-hidden', !overlayOpen);
         body.classList.toggle('noscroll', overlayOpen);
         
         /* On some mobile browser when the overlay was previously
            opened and scrolled, if you open it again it doesn't 
            reset its scrollTop property */
         overlay.scrollTop = 0;

      }, false);

    });
// body scroll lock....
$(function() {

  var $window           = $(window),
      win_height_padded = $window.height() * 1.1,
      isTouch           = Modernizr.touch;

  if (isTouch) { $('.revealOnScroll').addClass('animated'); }

  $window.on('scroll', revealOnScroll);

  function revealOnScroll() {
    var scrolled = $window.scrollTop(),
        win_height_padded = $window.height() * 1.1;

    // Showed...
    $(".revealOnScroll:not(.animated)").each(function () {
      var $this     = $(this),
          offsetTop = $this.offset().top;

      if (scrolled + win_height_padded > offsetTop) {
        if ($this.data('timeout')) {
          window.setTimeout(function(){
            $this.addClass('animated ' + $this.data('animation'));
          }, parseInt($this.data('timeout'),10));
        } else {
          $this.addClass('animated ' + $this.data('animation'));
        }
      }
    });
    // Hidden...
   $(".revealOnScroll.animated").each(function (index) {
      var $this     = $(this),
          offsetTop = $this.offset().top;
      if (scrolled + win_height_padded < offsetTop) {
        $(this).removeClass('animated fadeInUp flipInX lightSpeedIn')
      }
    });
  }

  revealOnScroll();
});