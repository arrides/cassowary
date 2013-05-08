(function ($) {
  Drupal.behaviors.autoUploadLogo = {
    attach: function(context, settings) {
      // for company logo field 
      $('#edit-field-company-logo-und-0-upload-button', context).hide();
    
  if($('#edit-field-company-logo-und-0-remove-button').length > 0) {
    if($('#edit-field-company-logo-und-0-ajax-wrapper .image-widget .image-preview .remove-button').length == 0) {
      $('#edit-field-company-logo-und-0-ajax-wrapper .image-widget .image-preview').append('<span class="remove-button">Remove</span>');
    }
    $('#edit-field-company-logo-und-0-ajax-wrapper .image-widget-data').hide();
    }
  if($('#edit-field-company-logo-und-0-upload-button').length > 0) {
    $('#edit-field-company-logo-und-0-ajax-wrapper .image-widget-data').show();
  }
      $('#edit-field-company-logo-und-0-ajax-wrapper input.form-file', context).change(function() {
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
  
  $(document).on("click", "#edit-field-company-logo-und-0-ajax-wrapper .image-widget .image-preview .remove-button", function(){
    //$('#editablefields-field-avatar button.form-submit[value=Remove]').trigger("click"); 
    $('#edit-field-company-logo-und-0-remove-button').mousedown();
    
  }); 
  $(document).on("click", ".ui-dialog-buttonpane span.ui-button-text:contains('Cancel')", function(){
    $('#edit-field-company-logo-und-0-remove-button').trigger("click"); 
    $('#edit-field-company-logo-und-0-remove-button').mousedown();
  });

  


  $(document).ajaxComplete(function(e, xhr, settings) {
    /*$('.page-user-portfolio-edit .field-name-field-avatar input[type="file"]').each(function () {
                $(this).attr('size', '1').wrap('<div class="styledImageLabel"></div>').addClass('styledImageInput');
            });*/
    var s = "/file/ajax/field_company_logo/und/0/form";
    
    if(settings.url.indexOf(s) !== -1) {
      
      if($('#edit-field-company-logo-und-0-ajax-wrapper .image-widget-data>a').length > 0) {
        var text = $('#edit-field-company-logo-und-0-ajax-wrapper .image-widget-data>a').attr('href');
        var fid = $('#edit-field-company-logo-und-0-ajax-wrapper input.[name=field_company_logo\\[und\\]\\[0\\]\\[fid\\]]').attr('value');
        var width = $('#edit-field-company-logo-und-0-ajax-wrapper input.[name=field_company_logo\\[und\\]\\[0\\]\\[width\\]]').attr('value');
        var height = $('#edit-field-company-logo-und-0-ajax-wrapper input.[name=field_company_logo\\[und\\]\\[0\\]\\[height\\]]').attr('value');
        eval(text);
      }
    }
    
    
    var s3 = "crop/ajax/put/";
    if(settings.url.indexOf(s3) !== -1) {
      //var ajaxResponse = jQuery.parseJSON(xhr.responseText);
      //if(ajaxResponse[0].settings.ajax['edit-field-company-logo-und-0-remove-button']) {
        var img_path = $('#edit-field-company-logo-und-0-ajax-wrapper img').hide().attr('src');
        img_path = img_path + "?" +Math.random();
        $('#edit-field-company-logo-und-0-ajax-wrapper img').attr('src', img_path).fadeIn('slow');
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
