(function($) {
	$(document).ready(function() {
		$('.hidden-it').parent().parent().hide();
		
		$('.node-tweet .views-field-body-1').hide();
		$('.node-facebook-post .views-field-body-1').hide();
		$('.read-more').click(function() {
			$(this).parent().parent().hide();
			$(this).parent().parent().parent().children('.views-field-body-1').show();
			$(this).parent().parent().parent().children('.views-field-field-fb-post-1').show();
			$('.node-facebook-post .views-field-body-1').hide();
		});
		$('.hidden-it').click(function() {
			$(this).parent().parent().hide();
			$(this).parent().parent().parent().children('.views-field-body').show();
			$(this).parent().parent().parent().children('.views-field-field-fb-post').show();
			$('.node-facebook-post .views-field-body-1').hide();
		});		
    });
})(jQuery);
	
	
/*	$(document).ready(function() {
			$('.node-body').before('<div id="reading-about">Читать подробнее</div>');
			$('.node-body').before('<div id="reading-roll">Свернуть</div>');
			$('#reading-roll').hide();
			$('#reading-about').click(function(){
			    $('#reading-about').hide();
				$('#reading-roll').fadeIn('slow');
			    //$('.node-body').before('<div id="reading-roll">Свернуть</div>');
				$('.node-body').fadeIn('slow');		
			});	
		    $('#reading-roll').click(function(){
			    $('#reading-roll').hide();
				$('#reading-about').fadeIn('slow');
			    //$('.node-body').before('<div id="reading-about">Читать подробнее</div>');
				$('.node-body').fadeOut('slow');
						
			});
});*/
