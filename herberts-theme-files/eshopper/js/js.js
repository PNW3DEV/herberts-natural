jQuery(document).ready(function($){
	
	"use strict";
	

	if($("#fakeloader").length > 0){
		$("#fakeloader").fakeLoader({
			timeToHide:1200, //Time in milliseconds for fakeLoader disappear
			zIndex:"9999",//Default zIndex
			spinner:$("#fakeloader").data('spin'),
			bgColor:"#f9f9f9", //Hex, RGB or RGBA colors
			imagePath:$("#fakeloader").data('image'),
		});
	}
	

	$(".gallery.justified").each(function(){
		$(this).justifiedGallery({
		  rowHeight : 200,
		  lastRow : 'justify',
		  margins : 10,
		  fixedHeight: false
		});
	});	

	/*Parallax effect*/
    $('.parallax').each(function(){
        var $bgobj = $(this); // assigning the object    
        $(window).scroll(function() {                       
            // Scroll the background at var speed
            // the yPos is a negative value because we're scrolling it UP!                              
            var yPos = -($(window).scrollTop() / 15); 

            // Put together our final background position
            var coords = '50% '+ yPos + 'px';

            // Move the background
            $bgobj.css({ backgroundPosition: coords });
        }); 
    });

	
	$(".owl-slider").owlCarousel({
		autoPlay: false, 
		items : 4,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3]	 
	});	
	
	$(".thumbnails").owlCarousel({
	   autoPlay: false, 
	   addClassActive: true,
	   items : 4,                
	   navigation: true,
	   navigationText:         ['<div class="genericon genericon-previous"></div>','<div class="genericon genericon-next"></div>'],
	   pagination: false,
	   itemsTablet :        [768,4],  
	   itemsMobile : [479,2] ,     
	   itemsTabletSmall:         false
	});

	$('.item').magnificPopup({
		delegate: 'a.zoom',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return '<a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">'+item.el.attr('title')+'</a> ';
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.closest('.item').find('img');
			}
		}
	});

	$('.gallery.justified').magnificPopup({
		delegate: 'a',
		type: 'image',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.find('img').attr('alt');
			}
		},
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.closest('a').find('img');
			}
		}
	});
	
	$('.panel .widget-title').wrapInner('<span></span>');

	$('.widget-title span.fa').click('on', function(){
	 	$(this).closest('.widget').find('.widget-content').slideToggle();
	 	$(this).toggleClass('fa-plus').toggleClass('fa-minus');

	});

	 $('.cs-options li').on('click', function(){
	 		$(this).closest('.cs-select').find('select').val($(this).data('value')).trigger('change');
	 		//$('select').trigger('change');
	 });

	 $('select.orderby, .variations select, .sidebar select').selectize({
      create: true,
      sortField: {
        field: 'text',
        direction: 'asc'
      },
      dropdownParent: 'body'
  });

	 

	//hide or show the "back to top" link
	var offset = 300,
		offset_opacity = 1200,		
		scroll_top_duration = 700,//duration of the top scrolling animation (in ms)		
		$back_to_top = $('.cd-top');//grab the "back to top" link	
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});
	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});	 

	$('.count-control').on('click', function(){
		var old = parseInt($(this).closest('.quantity').find('.qty').val());
		if($(this).hasClass('plus')){
			$(this).closest('.quantity').find('.qty').val(old+1);
		}else{
			if(old > 1){
				$(this).closest('.quantity').find('.qty').val(old-1);
			}			
		}
		return false;
	})

	var mid = 1;
	$(".masonary-container").each(function(){
		$(this).attr('id', 'masonary-id-'+mid);
		mid ++;
	});

	$('.social-share a').on('click', function(){
        newwindow=window.open($(this).attr('href'),'','height=450,width=700');
        if (window.focus) {newwindow.focus()}
        return false;
    });


    $('#eshopper-navigation .menu-item-has-children').each(function(){
    	$(this).append('<span><i class="genericon genericon-expand"></i></span>')
    });

    $('.menu-item-has-children span').on('click', function(){
    		$(this).closest('li').toggleClass('open');
    		$(this).toggleClass('open');
    })


   

	// grab the initial top offset of the navigation 
	var sticky_navigation_offset_top = $('.header-menu').offset().top;
	
	// our function that decides weather the navigation bar should have "fixed" css position or not.
	var sticky_navigation = function(){
		var scroll_top = $(window).scrollTop(); // our current vertical position from the top
		
		// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
		if (scroll_top > sticky_navigation_offset_top) { 
			$('#sticky-navigation-on').css({ 'position': 'fixed', 'top':0, 'left':0, 'opacity': .9 }).addClass('sticked');
		} else {
			$('#sticky-navigation-on').css({ 'position': 'relative', 'opacity': 1 }).removeClass('sticked');; 
		}   
	};
	
	// run our function on load
	sticky_navigation();
	
	// and run it again every time you scroll
	$(window).scroll(function() {
		 sticky_navigation();
	});
	
	// NOT required:
	// for this demo disable all links that point to "#"
	$('a[href="#"]').click(function(event){ 
		event.preventDefault(); 
	});
		
	
    

})//ready function


jQuery(document).ready(function () {
	
	jQuery(".masonary-container").each(function(){

 		var containerWidth = jQuery(this).innerWidth();

 		var column = parseInt(jQuery(this).data('column'));
		if (containerWidth > 767) {
			column = column;
		} else if (containerWidth > 479) {
			var column = 2;
		}else {
			var column = 1;
		}

		jQuery(this).closest('.dclass').attr('class', 'dclass column'+column);

 		var cellW = parseInt(containerWidth/column);
 		var cellH = ( parseInt(eshopper.catalog_image_height) / parseInt(eshopper.catalog_image_width) ) * cellW;

		jQuery(this).find('.item').each(function(){
			jQuery(this).css("height", (cellH*parseInt(jQuery(this).data('rowoff')))-eshopper.product_spacing );
		})

 		
 		var wall = new freewall('#'+jQuery(this).attr('id'));
	     wall.reset({
	     	draggable: false,
			selector: '.item',
			animate: false,
			cellW: cellW,
			cellH: cellH,	
			gutterX: parseInt(eshopper.product_spacing),
  			gutterY: parseInt(eshopper.product_spacing),	
			onResize: function (container) {

				var containerWidth = container.innerWidth();

		 		var column = parseInt(container.data('column'));
				if (containerWidth > 767) {
					column = column;
				}else if (containerWidth > 479) {
					var column = 2;
				}else {
					var column = 1;
				}

				container.closest('.dclass').attr('class', 'dclass column'+column);
				
				wall.fitWidth();
				
				
			},
			onComplete: function(container){
				jQuery('.ImageWrap').imgLiquid();
			}
		});
		wall.fitWidth();
		
		jQuery(window).trigger("resize");
					
	});

	jQuery('.archive_add_wishlist').on('click', function(){

      if(jQuery(this).hasClass('add_to_wishlist')){      

        var data = {
          'action': 'add_to_wishlist_prooduct_after',
          'product_id': jQuery(this).data('product-id')
        };

        jQuery.post(eshopper.ajaxurl, data, function(response) {
            if( response.success == 1 ){
              jQuery('a[data-product-id="'+response.product_id+'"]').removeClass('add_to_wishlist').removeClass('archive_add_wishlist').attr('href', response.wishlist_url);
              jQuery('a[data-product-id="'+response.product_id+'"]').find('i').attr('class', 'fa fa-heart color-text');
            }
        });
      }

    });
	
	

}); //end ready 


 



jQuery(window).resize(function () {
	"use strict"; 
	jQuery('.ImageWrap').imgLiquid();
});//end Resize 

jQuery(window).load(function(){
	"use strict";
	jQuery(window).trigger("resize");
   	jQuery( '.tp-preloader' ).fadeOut();
})//end load