(function ($) {
  var upload_button = '#edit-field-company-logo-und-0-upload-button';
  var remove_button = '#edit-field-company-logo-und-0-remove-button';
  var field_wrapper = '#edit-field-company-logo-und-0-ajax-wrapper';
  var remove_pseudo_button = field_wrapper + ' .image-widget .image-preview .remove-button';
  
  Drupal.behaviors.autoUploadLogo = {
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
    //$('#editablefields-field-avatar button.form-submit[value=Remove]').trigger("click"); 
    $(remove_button).mousedown();
    
  }); 
  $(document).on("click", ".ui-dialog-buttonpane span.ui-button-text:contains('Cancel')", function(){
    $(remove_pseudo_button).trigger("click"); 
    $(remove_pseudo_button).mousedown();
  });

  


  $(document).ajaxComplete(function(e, xhr, settings) {
    /*$('.page-user-portfolio-edit .field-name-field-avatar input[type="file"]').each(function () {
                $(this).attr('size', '1').wrap('<div class="styledImageLabel"></div>').addClass('styledImageInput');
            });*/
    var s = "/file/ajax/field_company_logo/und/0/form";
    
    
    
    if(settings.url.indexOf(s) !== -1) {
      
      
      if($(field_wrapper + ' .image-widget-data>a').length > 0) {
        var text = $(field_wrapper + ' .image-widget-data>a').attr('href');
        
        eval(text);
        //Drupal.EPSACrop.dialog('node', 'field_company_logo', 'article', fid, text, '[' + width + ',' + height +']');
      }
    }
    
    var s3 = "crop/ajax/put/";
    if(settings.url.indexOf(s3) !== -1) {
      //var ajaxResponse = jQuery.parseJSON(xhr.responseText);
      //if(ajaxResponse[0].settings.ajax['edit-field-company-logo-und-0-remove-button']) {
        var img_path = $(field_wrapper + ' img').hide().attr('src');
        img_path = img_path + "?" +Math.random();
        $(field_wrapper + ' img').attr('src', img_path).fadeIn('slow');
      //}
    }
  });

})(jQuery);

function dump(obj) {
var out = '';
for (var i in obj) {
    out += i + ": " + obj[i] + "\n";
}

alert(out);
}
