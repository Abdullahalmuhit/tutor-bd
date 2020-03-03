
// Testimonials
jQuery(document).ready(function() { 
   jQuery('#testimonials .quotes').quovolver({
      children    : 'div',
      standardionSpeed : 600,
      autoPlay    : true,
	  autoPlaySpeed:6000,
      equalHeight   : false,
      navPosition   : 'below',
      navPrev     : true,
      navNext     : true,
      navNum      : true,
      navText     : false,
      navTextContent  : 'Quote @a of @b'
    });
   
   
  jQuery('.owl-carousel').owlCarousel({
    loop:true,
	autoplay:true,
    margin:20,
    nav:true,
	dots: false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
		768:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

}); 

/***SideNav***/

function openNav() {
  document.getElementById("mySidenav").style.width = "480px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

/***SideNav FAQ***/

$(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.show").each(function(){
          $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
        }).on('hide.bs.collapse', function(){
          $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
        });
    });


/***Sticky Manu***/

