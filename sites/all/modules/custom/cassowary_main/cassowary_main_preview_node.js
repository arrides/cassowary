/**
 * 
 */
(function ($) {
  $(function(){
    if ($('body.page-node .preview').length) {
      $('form.node-form div div:not(.form-actions)').hide();
      var company = $('#article-node-form #edit-field-company-writer-und-0-value').attr('value');
      $('.preview .field-name-field-company .field-item').text(company);
      $('form.node-form div.form-actions').append('<div class="edit-node">Edit</div>');
      $('form.node-form button#edit-preview').hide();
	  $('form.node-form > div').css({
		padding: 0,
		background: 'none',
		border: 0
	  });	  
    }
    $('form.node-form div.form-actions div.edit-node').live('click', function() {
      $('body.page-node .preview').hide();
      $('form.node-form div div:not(.form-actions, .image-widget-data)').show();
      $('form.node-form button#edit-preview').show();
      $(this).hide();
	  
	  $('.mceLayout').css('width','920px');
	  $('form.node-form > div').css({
		padding: '20px',
		background: '#ffffff',
		border: '1px solid #ccc'
	  });
    });
  });
  
  
  $(document).ready(function() {
	  $('.close').live('click', function() {
		$(this).parent().remove();
		return false;
	  });
	  
	  $('.field-name-field-company .field-item.even').text($('#edit-field-company-text-und-0-value').attr("value"));
	  
	  
  });
  
  
})(jQuery);