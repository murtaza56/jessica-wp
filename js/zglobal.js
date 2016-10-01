// Smooth Scroll
$(function() {
  $('a[href*="#"]:not([href="#"]):not("#menu a")').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

// Responsive Slides
$(function() {
    $(".rslides").responsiveSlides({
    	speed: 750,
    	timeout: 5000,
    	pager: true,
    	nav: true,
    });
});

// Double Tap To Go
$( '#menu li:has(ul)' ).doubleTapToGo();