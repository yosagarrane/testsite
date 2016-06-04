(function($){
	$(function(){
		$('.flexslider').flexslider();
	});


	// Sticky Header 
	$(window).scroll(function() {
	if ($(this).scrollTop() > 300){  
	    $('.home #masthead').addClass("site-header-sticky");
	  }
	  else{
	    $('.home #masthead').removeClass("site-header-sticky");
	  }
	});
	

})(jQuery);