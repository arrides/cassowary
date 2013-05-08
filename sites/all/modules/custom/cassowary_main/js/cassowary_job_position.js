(function($) {
	//$(document).ready(function() {
	Drupal.behaviors.cassowaryMessages = {
			  attach: function (context){
				  
	    $(document).on("click", ".views-field-apply-for-a-job-emulate .rules-link", function(){
	    	$(".views-field.views-field-nothing-4").show();
		  return false;
	    });

	    $(document).on("click", ".views-field-delete-job .rules-link", function(){
	    	$(".views-field.views-field-nothing-3").show();
		  return false;
	    });
	    		
	  }
	};
})(jQuery);
