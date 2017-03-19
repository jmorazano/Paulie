// When DOM is fully loaded
jQuery(document).ready(function($) {
	
	
	$('.homeslider').owlCarousel({
		navigation : true, // Show next and prev buttons
		slideSpeed : 300,
		paginationSpeed : 400,
		singleItem:true
	});

	$("nav#menu").mmenu({
		extensions	: [ 'effect-slide-menu', 'pageshadow' ],
		searchfield	: false,
		counters	: true,
		navbar 		: {
			title		: 'Paulie'
		},
		navbars		: [
			{
				 position: "bottom",
				 content: [
					"<a href='https://www.facebook.com/paulieclothing'><i class='fa fa-facebook fa-fw'></i></a>",
					"<a href='https://twitter.com/paulieclothing/'><i class='fa fa-twitter fa-fw'></i></a>",
					"<a href='#'><i class='fa fa-google-plus fa-fw'></i></a>",
					"<a href='http://paulieclothing.tumblr.com/'><i class='fa fa-tumblr fa-fw'></i></a>",
					"<a href='http://www.pinterest.com/paulieclothing/'><i class='fa fa-pinterest fa-fw'></i></a>",
					"<a href='http://instagram.com/paulieclothing/'><i class='fa fa-instagram fa-fw'></i></a>"

				 ]
            },
             {
				position	: 'top',
				content		: [
					'prev',
					'title',
					'close'
				]
			}
		]
	});
	
	$( "#pa_size option" ).first().remove();
	$( "#pa_colours option" ).first().remove();
	
	$('.tthumbnails .zoom').click(function(e){
      e.preventDefault();

      var photo_fullsize =  $(this).find('img').attr('src');
      var photo_fullsizehref =  $(this).attr('href');

      $(' img.woocommerce-main-image').attr('src', photo_fullsize);
      $(' img.woocommerce-main-image').attr('data-zoom-image', photo_fullsize);

    });
    
    $( ".rn-navigation li.menu-item-has-children" ).addClass( "rn-slide" ).attr('data-animation', 'dropLeft');
    $( ".rn-navigation li.menu-item-has-children a:first-child:not(.sub-menu li a)").removeAttr("href");
    
    $(".mainzoom").elevateZoom({
		zoomType: "inner",
		gallery:'gallery_01',
		galleryActiveClass: 'active',
		cursor: "crosshair",
		zoomWindowFadeIn: 500,
		zoomWindowFadeOut: 750
	}); 
	
	$("#socials a").hover(
		function() {
			$(this).stop().animate({"opacity": "0.5"}, "fast");
		},
		function() {
			$(this).stop().animate({"opacity": "1"}, "slow");
	});
	
	//COUPONCODE TOGGLE
	$('#couponlabel').click(function() {
        $('#coupontog').toggleClass("open")
        $(this).toggleClass("open")
    });
    

});
