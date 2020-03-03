(function ($) {
 "use strict";

/*
  PROGRESS WITH WAYPOINT ACTIVE
================================== */
	var ProWey = $('.skill-progress');
    if (ProWey.length > 0) {
        ProWey.waypoint(function () {
			// element 
			jQuery('.skill-bar').each(function() {
				jQuery(this).find('.progress-content').animate({
					width:jQuery(this).attr('data-percentage')
				},2000);
				
				jQuery(this).find('.progress-mark').animate(
				{left:jQuery(this).attr('data-percentage')},
				{
					duration: 2150,
					step: function(now, fx) {
						var data = Math.round(now);
						jQuery(this).find('.percent').html(data + '%');
					}
				});  
			
			});
		}, {offset: '90%'});
	}

/*
 SWIPER SLIDER ACTIVE
================================ */
    var swiper = new Swiper('#mainslider', {
      spaceBetween: 30,
      effect: 'fade',
	  speed: 1000,
	  loop: true,
	  autoplay: {
		delay: 5000,
	  },
      navigation: {
        nextEl: '.swiper-next',
        prevEl: '.swiper-prev',
      },
		
    });
	
/*
 SLICK SLIDER ACTIVE
================================ */
	var mAinSlide= $('#mainslider-2');
	mAinSlide.slick({
		autoplay: true,
		autoplaySpeed: 5000,
		arrows: true,
		dots: false,
		speed: 500,
		prevArrow: '<i class="prev zmdi zmdi-chevron-left"></i>',
		nextArrow: '<i class="next zmdi zmdi-chevron-right"></i>'
	});
	
	var oNeItem= $('#oneitem');
	oNeItem.slick({
		autoplay: true,
		autoplaySpeed: 5000,
		arrows: false,
		dots: false,
		speed: 500,
	});
	var oNeItemdot= $('#oneitem-dot');
	oNeItemdot.slick({
		autoplay: true,
		autoplaySpeed: 5000,
		arrows: false,
		dots: true,
		speed: 500,
	});
	
/*
SLICK CAROUSEL AS NAV
===================================*/
	var InterFS = $('#testimonial');
	InterFS.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        focusOnSelect: true,
        dots: false,
        centerPadding: '545px',
        arrows: false,
        responsive: [
			{
			  breakpoint: 1500,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				centerPadding: '250px',
			  }
			},
			{
			  breakpoint: 1280,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				centerPadding: '180px',
			  }
			},
			{
			  breakpoint: 1024,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				centerPadding: '130px',
			  }
			},
			{
			  breakpoint: 600,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				centerPadding: '80px',
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				centerPadding: '40px',
			  }
			}
		]
    });
/*
 CounterUp ACTIVE
 Not used beacuse it is deprecated in Jquery 3.2.1
================================ */
	$('.counter').counterUp({
		delay: 50,
		time: 3000
	});
	
})(jQuery);
