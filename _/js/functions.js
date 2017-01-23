(function($){
	var tagInterval;
	var event_type = 'touchstart';
	
	function getUrlVars() {
	    var hash;
	    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	    
	    for(var i = 0; i < hashes.length; i++)
	    {
	        hash = hashes[i].split('=');	        
	        
	         if (hash[0] === "gclid" && $('#input_23_12').length === 1) {
		      $('input#input_23_12').val(hash[1]);  
	        }
	        
	         if (hash[0] === "gclid" && $('#input_22_27').length === 1) {
		      $('input#input_22_27').val(hash[1]);  
	        }	   
	        
	        if (hash[0] === "gclid" ) { 
		    $.cookie(hash[0], hash[1], {expires: 1, path: '/'});  
	        }   
	        
	    }
	}
	
	getUrlVars();

	$(document).ready(function (){
	
	 $(".selectpicker").selectpicker({
      style: 'btn-default btn-lg hp-select',
      mobile: true,
      size: 5
	  });
	  
	  $('.selectpicker').find('select').selectpicker({
		style: 'btn btn-group btn-default', 
		mobile: true,
		width: '100%'
	});
	 
				
	$('body').on(event_type,'button#user-btn', function(){
	
		if ( $(this).parent().hasClass('closed') ) {
			$(this).parent().removeClass('closed').addClass('open');
		} else {
			$(this).parent().removeClass('open').addClass('closed');
		}
		
		return false;
		
	});
	
/* 	MAIN TOP NAVIGATION FUNCTIONS 
		Button functions to open top navigation and 
		control the internal menu functions as well
		as close the menu.
	*/
	
	$('body').on(event_type,'button#nav-btn', function(){
		
		var inner_h = $('#top-nav').find('.nav-wrapper').outerHeight();
		
		if ( $('#top-nav').hasClass('nav-closed') ) {
			
			$('#quick-links-sml').animate({left: '-70px'}, 100);
			
			$('#top-nav').animate({height: inner_h+"px"}, 500, function(){
			
				$(this).toggleClass('nav-closed nav-open').removeAttr('style');	
				
			});
		} 
		
		if ( $('#top-nav').hasClass('nav-open') ) {
			
			$('#top-nav').animate({height: "0px"}, 500, function(){
			
				$(this).toggleClass('nav-closed nav-open').removeAttr('style');	
				$('#quick-links-sml').animate({left: '20px'}, 400);
				
			});
			
		} 
		
		return false;
		
	});
	
	$('#top-nav').on(event_type,'button#close-nav', function(){
		
		$('#top-nav').animate({height: "0px"}, 500, function(){
			
			$(this).toggleClass('nav-open nav-closed').removeAttr('style');	
			$('li.with-sub-nav').removeClass('sub-open').addClass('sub-closed');
			$('#quick-links-sml').animate({left: '20px'}, 400);
			
		});
		
		return false;
		
	});
	
	
	$('#top-nav').on('click', "li.with-sub-nav > a", function(){
		var parent = $(this).parent();
		var siblings = $(parent).siblings();
		
		$(parent).siblings().removeClass('sub-open').addClass('sub-closed');
		
		if ($(siblings).find('.sub-open').length > 0) {
		$(siblings).find('.sub-open').removeClass('sub-open').addClass('sub-closed');		
		}
		
		//console.log($(siblings).find('.sub-open').length);
		
		$(parent).toggleClass('sub-open sub-closed');

	return false;	
	});
	
	//DOWNLOAD BOOKLET GUIDE BUTTON
	
	$('body').on(event_type,'button#file-download-btn', function(){
		
		var next = $(this).next();
		
		$(next).toggleClass('form-open form-closed');	
		$('html, body').animate({scrollTop: ($("button#file-download-btn").offset().top) - 30}, 500);	
		
		return false;
		
	});
	
	$(document).bind('gform_confirmation_loaded', function(event, formId){
            if(formId === 19 && $('a#download-booklet-btn').length === 1) {
               $('a#download-booklet-btn').removeClass('hidden');
               $('html, body').animate({scrollTop: ($("button#booklet-download-btn").offset().top - 20)}, 500);	
            }
            
            if(formId === 20 && $('#hidden-download').length === 1) {
               $('#hidden-download').removeClass('hidden');
               $('.gform_heading').addClass('hidden');
               $('html, body').animate({scrollTop: ($("#hidden-download").offset().top - 20)}, 500);	
            }
    });
 
	
	$('body').on('click', "li.with-sub-nav > a", function(){
		var parent = $(this).parent();
		$(parent).siblings().removeClass('sl-tl-open').addClass('sl-tl-closed');
		
		if ($(parent).hasClass('top-level')) {
			$(parent).find('.sl-tl-open').removeClass('sl-tl-open').addClass('sl-tl-closed');
		}
		
		$(parent).toggleClass('sl-tl-open sl-tl-closed');
		
		
	return false;	
	});
	
	/* 	HEADER SEARCH BUTTON 
		Button functions for search pop up menu
	*/
	
	$('body').on(event_type,'button#search-btn', function(){
	
		if ( $('#search-pop-up').hasClass('off') ) {
			
			$('#search-pop-up').removeClass('off').addClass('on');
		} 
		
		return false;
		
	});
	
	$('body').on(event_type,'button#close-search', function(){
	
		if ( $('#search-pop-up').hasClass('on') ) {
			$('#search-pop-up').removeClass('on').addClass('turn-off');
			
			$('.turn-off').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		
				$(this).removeClass('turn-off').addClass('off');	
				
			});

		} 
		
		return false;
		
	});
	
    
      /* POST CONTINUE READING BUTTONS
	   Functions for the read more button which reveals more
	   content it also has a close function as well. 
    */
    
	$('body').on(event_type,'button#continue-read-btn', function(){
		
		var inner_h = $('#content-extra-inner').outerHeight();
			
		$('button#continue-read-btn').addClass('hidden');
		
		$('#content-extra').animate({height: inner_h+"px"}, 500, function(){
			$('#content-extra').removeClass('closed').addClass('open').removeAttr('style');
		});

		return false;
		
	});
	
	$('body').on(event_type,'button#close-content-extra-btn', function(){
		
		var parent_pos = $('#content-extra-inner').parent().position().top;
		
		$('button#continue-read-btn').removeClass('hidden');
		
		$('main').animate({scrollTop: parent_pos}, 500);
			
		$('#content-extra').animate({height: "0px"}, 500, function(){
			$('#content-extra').removeClass('open').addClass('closed').removeAttr('style');	
		});	
		
		return false;
		
	});
		
	/* XMAS Pop up Function
	  This function controls the Xmas pop up box
    */
    
    	var xmasBox = function(){

			if ($('#xmas-popup-wrap').length === 1 && $('#xmas-popup-wrap').hasClass('pop-up-inactive')) {
				
				$('#xmas-popup-btn-wrap').removeClass('pop-up-inactive').addClass('pop-up-active');
		
				$('#xmas-popup-wrap').fadeIn('slow', function(){
				
					$('.xmas-popup-inner').removeClass('hidden').addClass('animated slideInUp');
				
				});
			
			}
    
		};

    	//Transition end actions
	    $('.xmas-popup-inner').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
			
			if ($(this).hasClass('bounceOutDown')) {
			 $('#xmas-popup-wrap').fadeOut('fast').removeClass('pop-up-active').addClass('pop-up-inactive');	
			 $('#xmas-popup-btn-wrap').removeClass('pop-up-active').addClass('pop-up-inactive');
			 $(this).removeClass('animated bounceOutDown').addClass('hidden');
			}
		});
		
		//Button actions
		
		$('body').on(event_type,'button#xmas-popup-btn-open', function(){
	    	
	    	xmasBox();    			
			return false;
			
		});
	
	    
	    $('body').on(event_type,'button#close-xmas-popup', function(){
		    
		   $('.xmas-popup-inner').removeClass('slideInUp').addClass('bounceOutDown');   
	    	      			
			return false;
			
		});
		
		/* Law Awards Pop up Function
	   This function controls the Xmas pop up box
    	*/
    	
    	 $('body').on(event_type,'button#close-awards-btn', function(){
		    
		   $(this).parent().removeClass('open').addClass('closed');   
	    	      			
			return false;
			
		});
		
		$('body').on(event_type,'#awards-pop-up', function(){
		    
		    $('button#close-awards-btn').trigger(event_type);
		
		});

		
		/* PAGE BANNER TAG SCROLLER */
		function startTagInterval() {
		tagInterval = setInterval(changeTag, 7000);
		}
	
		function changeTag() {
			
			var currentTag = $('.tag-scroller').find('.active');
			var nextTag = $(currentTag).next();
			
			
				if ($(nextTag).length === 0) {
				nextTag = $('.tag-scroller-txt').eq(0);	
				}
				
			$(currentTag).fadeToggle(500).removeClass('active');
			$(nextTag).fadeToggle(1000).addClass('active');
	
			//console.log(nextTag);
		}
		
		startTagInterval();
		
		/* PAGE FEEDBACK SCROLLER */
		function startFeedbackInterval() {
		tagInterval = setInterval(changeQuote, 7000);
		}
		
		function changeQuote() {
			
			var currentQuote = $('.feedback-section-inner').find('.item.active');
			var nextQuote = $(currentQuote).next();
			
			if ($(nextQuote).length === 0) {
			nextQuote = $('.feedback-section-inner').find('.item').eq(0);	
			}
			
			$(currentQuote).animate({left: '-100%'}, 500, function(){
				
				$(this).removeClass('active').css('left', '100%');
				
			});
			
			$(nextQuote).animate({left: '0%'}, 500, function(){
				
				$(this).addClass('active');
				
			});
			
			//console.log(nextTag);
		}
		
		if ($('.feedback-section-wrapper').length === 1) {
		startFeedbackInterval();
		}
	
		/*
		OUR TEAM FUNCTIONS
		Button to show profile biog.
		Team section scrolling functions
		*/
		
		$('.team-profile').on(event_type, 'button.profile-info-btn', function(){
			
			$(this).parents('.team-profile').siblings().find('.profile-txt').removeClass('txt-view').addClass('txt-hide');
			
			$(this).parent().toggleClass('txt-hide txt-view');
			
			return false;
		});
		
		/* FAQ's BUTTON ACTIONS
		This function controls the FAQ's answers button
		which shows and hides the answer to the question
	    */
	    
	     $('body').on(event_type,'button.view-faq-btn', function(){
		   
	    	$(this).parent().toggleClass('open closed');     
	    	      			
			return false;
			
		});
			
	});	
	
	$(window).bind('load',function(){
			
		//console.log("Loaded");
		$('body').removeClass('tablet-css');
		
		$('.full-bg-img').each(function(index, Element) {
		var src = $(Element).data('src');
		//console.log(src);
		if (src !== undefined) {
			$(Element).css('background-image', 'url(' +src+ ')');
			}
		});
	
	});

	
})(window.jQuery);