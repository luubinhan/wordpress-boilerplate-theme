var MainJS = (function($){
	function init() {
		console.log(1);
	}


	/*
	WooCommerce Grid / List toggle
	*/	
	function toggleGridProducts() {
		$('ul.products').toggleClass('layout-list');
	}

	return {
		init : init,
		toggleGridProducts: toggleGridProducts
	}

})(window.jQuery);

jQuery(document).ready(function($) {
	MainJS.init();
});