(function ($) {
  var upload_button = '#edit-field-fb-image-und-0-upload-button';
  var remove_button = '#edit-field-fb-image-und-0-remove-button';
  var field_wrapper = '#edit-field-fb-image-und-0-ajax-wrapper';
  var remove_pseudo_button = field_wrapper + ' .image-widget .image-preview .remove-button';
  
  Drupal.behaviors.autoUploadLogoFB = {
    attach: function(context, settings) {
      // for company logo field 
      $(upload_button, context).hide();
    
  if($(remove_button).length > 0) {
    if($(remove_pseudo_button).length == 0) {
      $(field_wrapper + ' .image-widget .image-preview').append('<span class="remove-button">Remove</span>');
    }
    $(field_wrapper + ' .image-widget-data').hide();
    }
  if($(upload_button).length > 0) {
    $(field_wrapper + ' .image-widget-data').show();
  }
      $(field_wrapper + '  input.form-file', context).change(function() {
        $parent = $(this).closest('.form-type-managed-file');

        //setTimeout to allow for validation
        //would prefer an event, but there isn't one
        setTimeout(function() {
          if(!$('.error', $parent).length) {
            $('button.form-submit[value=Upload]', $parent).mousedown();
          }
        }, 100);
      });
    }
  };
  
  $(document).on("click", remove_pseudo_button, function(){
    $(remove_button).mousedown();
  });

})(jQuery);

function dump(obj) {
var out = '';
for (var i in obj) {
    out += i + ": " + obj[i] + "\n";
}

alert(out);
}
