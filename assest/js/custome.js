	
	$(document).ready(function(){
		$('.top-tooltip').tooltip({placement : 'top'});
		$('.bottom-tooltip').tooltip({placement : 'bottom'});
		$('.left-tooltip').tooltip({placement : 'left'});
		$('.right-tooltip').tooltip({placement : 'right'});
	});

	//owl slider
	$(document).ready(function () {
       $('.owl-carousel-home-slider').owlCarousel({
            margin: 0,
            nav: false,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            autoplay: true,
            dotsSpeed: 2000,
            responsiveClass: true,
            responsive:{
                0:{
                    items: 1,
                    nav: false,
                    dots: false,
					loop: true
                }
            }
        });
		
       $('.owl-carousel-post-slider').owlCarousel({
            margin: 0,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            autoplay: true,
            dotsSpeed: 500,
            responsiveClass: true,
            responsive:{
                0:{
                    items: 1,
                    nav: true,
                    dots: false,
					loop: true
                },
                400:{
                    items: 2,
                    nav: true,
                    dots: false,
					loop: true
                },
                768:{
                    items: 3,
                    nav: true,
                    dots: false,
					loop: true
                }
            }
        });


        
		
	});



	// Scrolling Effect
    $(window).on("scroll", function() {
		if($(window).scrollTop()) {
			  $('nav').addClass('black');
		}

		else {
			  $('nav').removeClass('black');
		}
    })
  
	//animata css
	new WOW().init();  
  
  
	// <!--===  Text count ===--->	
      function countChar(val) {
        var len = val.value.length;
        if (len >= 235) {
          val.value = val.value.substring(0, 235);
        } else {
          $('#charNum').text(235 - len);
        }
      };
	  
	// tooltip
