( function( $ ) {
	// Add Make Plus message
		upgrade = $('<a class="curtains-buy-pro"></a>')
			.attr('href', 'http://www.webulousthemes.com/theme/curtains-pro/')
			.attr('target', '_blank')
			.text(curtains_upgrade.message)
		;
		demo = $('<a class="curtains-docs"></a>')
			.attr('href','http://curtains.webulous.in/')
			.attr('target','_blank')
			.text(curtains_upgrade.demo);
		docs = $('<a class="curtains-docs"></a>')
			.attr('href','http://www.webulousthemes.com/curtains-free/')
			.attr('target','_blank')
			.text(curtains_upgrade.docs);  
		support = $('<a class="curtains-docs"></a>')
			.attr('href','http://www.webulousthemes.com/support-ticket/')
			.attr('target','_blank')
			.text(curtains_upgrade.support);


		$('.preview-notice').append(upgrade);
		$('.preview-notice').append(demo);
		$('.preview-notice').append(docs);
		$('.preview-notice').append(support);
		// Remove accordion click event
		$('.curtains-buy-pro').on('click', function(e) {
			e.stopPropagation();
		});
		$('.curtains-docs').on('click',function(e){
			e.stopPropagation();
		})
} )( jQuery );