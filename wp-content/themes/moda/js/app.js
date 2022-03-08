jQuery(document).ready(function($) {
	
	if ( ($(window).width() > 767) && ($(window).width() < 1190) ){
		$('#primary-nav').appendTo('#branding').addClass('menu-shift');
	};
	
	$("body.page-template-frontpage #main-content .widget-area .widget").wrap("<div class='homepage-widget col-sm-8'></div>");

 	$('.js-height, .feature-block .feature-block-text, .index-block-text, .repeater-picturebox h3, body.page-template-frontpage #main-content .widget-area .widget .widget-inner').matchHeight({
    	byRow: true,
		property: 'height'
    });
 	
 	$('#main-nav').meanmenu({
		meanScreenWidth: "767",
		meanMenuClose: "<i class='fa fa-times'></i>",
		meanRemoveAttrs: true
    });
    
    $('#page-content').fitVids();
    
    
    // Grid Toggle https://gist.github.com/panoply/210dd203b1ebf3254694
	
	
	$('.grid-toggle a').on('click', function() {
		
		$('.grid-objects a').removeClass('col-sm-6 col-sm-8 col-sm-12');
		$('.grid-objects .clearfix').remove();
		
	    if ($(this).hasClass('grid-toggle-four')) {
	      $('.grid-objects a').addClass('col-sm-6');
	      $('.grid-objects').children(':eq(3)').after('<div class="clearfix new"></div>');
	      gridcols = '6';
	    }
	
	    if ($(this).hasClass('grid-toggle-three')) {
	      $('.grid-objects a').addClass('col-sm-8');
	      $('.grid-objects').children(':eq(2)').after('<div class="clearfix new"></div>');
	      gridcols = '8';
	    }
	    
	    if ($(this).hasClass('grid-toggle-two')) {
	      $('.grid-objects a').addClass('col-sm-12');
	      $('.grid-objects').children(':eq(1)').after('<div class="clearfix new"></div>');
	      gridcols = '12';
	    }
		
		console.log('changed grid layout');
		$.fn.matchHeight._update();

		$('.pagination a').each(function(){
		 var href = $(this).attr('href');
		 href += (href.match(/\?/) ? '&' : '?') + 'gc=' + gridcols;
		 $(this).attr('href', href);
		});
		
	});
	
	// Basic accordion
	$('.object__accordion-header').click(function() {
		$(this).toggleClass('is-active');
		$('.object__reveal').slideToggle('normal');
		return false;	
	});

	// Cite clipboard
	$('#cite-btn').on("click", function(){
		$('#cite-input').select();
		document.execCommand("copy");
	})

	// gallery
	$( '.swipebox' ).swipebox();
});