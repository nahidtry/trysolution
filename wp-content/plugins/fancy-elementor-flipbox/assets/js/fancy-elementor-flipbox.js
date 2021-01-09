( function( $ ) {
	/**
 	 * @param $scope The Widget wrapper element as a jQuery element
	 * @param $ The jQuery alias
	 */

	var WidgetFancyElementorFlipboxHandler = function( $scope, $ ) {
		//console.log( $scope );
		var tp_fb = $('.tp-flipbox');
		var tp_fb_holder = tp_fb.find('.tp-flipbox__holder');
		var tp_fb_content_height = tp_fb.find(".tp-flipbox__content").height();
		var tp_fb_front_height = tp_fb.find(".tp-flipbox__front .tp-flipbox__content").height();
		var tp_fb_back_height = tp_fb.find(".tp-flipbox__back .tp-flipbox__content").height();

		if(tp_fb_back_height > tp_fb_front_height){
			tp_fb_holder.css("min-height",tp_fb_back_height);
		}else{
			tp_fb_holder.css("min-height",tp_fb_front_height);
		}

	};

	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/fancy-elementor-flipbox.default', WidgetFancyElementorFlipboxHandler );
	} );
} )( jQuery );
