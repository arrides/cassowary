(function($) {
	//$(document).ready(function() {
	Drupal.behaviors.cassowaryJobWorkflow = {
			  attach: function (context){
				  
				  
				  
			  
		$('.hire-writer').click(function() {
			  $(".search-messages-rigth #cassowary-payment-page").show();
		});		
	  }
	};
})(jQuery);
