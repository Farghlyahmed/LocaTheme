/**Preload**/
$(window).load(function () {
    $('#page-loader').delay(500).fadeOut(400, function () {
        $('body').fadeIn();
    });
});

$(document).ready(function ($) {
    /**Menu Mobile**/
    $('.menu-icon').click(function () {
        $('body').toggleClass("open-menu");
    });
    $('.open-submenu').click(function () {
        var submenu = $(this).parents("li").find("ul");
        if ($(submenu).is(":visible")) {
            $(submenu).slideUp();
            $(this).removeClass("open-submenu-active");
        }
        else {
            $(submenu).slideDown();
            $(this).addClass("open-submenu-active");
        }
    });
    /**Search Box**/
    $('body').click(function () {
        if ($('.search-icon').hasClass("show-search")) {
            $('.search-icon').toggleClass("show-search");
        }
    });
    $('.search-icon-inner').click(function (e) {
        e.stopPropagation()
        $('.search-icon').toggleClass("show-search");
    });
    $('.search-box').click(function (e) {
        e.stopPropagation();
    });
    /**Sportlight slider**/
   /* $('.owl-spotlight').owlCarousel({
        loop: true,
        nav: true,
        items: 1,
        mouseDrag: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });*/
    /**Review slider**/
    $('.owl-review ,.owl-spotlight').owlCarousel({
        loop: true,
        nav: true,
        items: 1,
        mouseDrag: false,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });
    /**Review slider**/
    $('.owl-special').owlCarousel({
        loop: true,
        nav: false,
        dots: false,
        autoplay: true,
        items: 1,
        mouseDrag: false,
    });
    if ($('.reviews-item').length) {
        $('.reviews-item').matchHeight();
    }
    /* Nice Scroll*/
    $("html").niceScroll({
        cursorcolor:"#FF823A",
        cursorwidth:"5px",
        cursorfixedheight:"130",
       
    });
    
    /*Scroll to top*/
    $.scrollUp = function (options) {

			// Defaults
			var defaults = {
				scrollName: 'scrollUp', // Element ID
				topDistance: 300, // Distance from top before showing element (px)
				topSpeed: 600, // Speed back to top (ms)
				animation: 'Slide', // Fade, slide, none
				/*animationInSpeed: 300,*/ // Animation in speed (ms)
				/*animationOutSpeed: 300,*/ // Animation out speed (ms)
				scrollText: '', // Text for element
				scrollImg: false, // Set true to use image
				activeOverlay: false // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			};

			var o = $.extend({}, defaults, options),
				scrollId = '#' + o.scrollName;

			// Create element
			$('<a/>', {
				id: o.scrollName,
				href: '#top',
				title: o.scrollText
			}).appendTo('body');
			
			// If not using an image display text
			if (!o.scrollImg) {
				$(scrollId).text(o.scrollText);
			}

			// Minium CSS to make the magic happen
			$(scrollId).css({'display':'none','position': 'fixed','z-index': '2147483647'});

			// Active point overlay
			if (o.activeOverlay) {
				$("body").append("<div id='"+ o.scrollName +"-active'></div>");
				$(scrollId+"-active").css({ 'position': 'absolute', 'top': o.topDistance+'px', 'width': '100%', 'border-top': '1px dotted '+o.activeOverlay, 'z-index': '2147483647' });
			}

			// Scroll function
			$(window).scroll(function(){	
				switch (o.animation) {
					case "fade":
						$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).fadeIn(o.animationInSpeed) : $(scrollId).fadeOut(o.animationOutSpeed) );
						break;
					case "slide":
						$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).slideDown(o.animationInSpeed) : $(scrollId).slideUp(o.animationOutSpeed) );
						break;
					default:
						$( ($(window).scrollTop() > o.topDistance) ? $(scrollId).show(0) : $(scrollId).hide(0) );
				}
			});

			// To the top
			$(scrollId).click( function(event) {
				$('html, body').animate({scrollTop:0}, o.topSpeed);
				event.preventDefault();
			});

		};
		
		$.scrollUp();
    
 
});
