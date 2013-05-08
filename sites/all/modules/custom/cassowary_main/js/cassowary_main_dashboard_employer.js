/*
 * Behavior for the automatic file upload
 */

(function ($) {
  Drupal.behaviors.autoUploadLogoPost = {
    attach: function(context, settings) {
      // for avatar editable field 
      $('#editablefields-field-avatar button.form-submit[value=Upload]', context).hide();
    
  if($('#edit-field-avatar-0-field-avatar-und-0-remove-button').length > 0) {
    if($('#editablefields-field-avatar .image-widget .image-preview .remove-button').length == 0) {
      $('#editablefields-field-avatar .image-widget .image-preview').append('<span class="remove-button">Remove</span>');
    }
    $('#editablefields-field-avatar .image-widget-data').hide();
    }
  if($('#edit-field-avatar-0-field-avatar-und-0-upload-button').length > 0) {
    $('#editablefields-field-avatar .image-widget-data').show();
  }
      $('#editablefields-field-avatar input.form-file', context).change(function() {
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
  
  $(function() {
    if($('#edit-field-avatar-0-field-avatar-und-0-remove-button').length > 0) {
      //$('#editablefields-field-avatar .image-widget .image-preview').append('<span class="remove-button">Remove</span>');
  //  $('#editablefields-field-avatar .image-widget-data').hide();
    }
  });
  
  $(document).on("click", "#editablefields-field-avatar .image-widget .image-preview .remove-button", function(){
    //$('#editablefields-field-avatar button.form-submit[value=Remove]').trigger("click"); 
    $('#editablefields-field-avatar button.form-submit[value=Remove]').mousedown();
    var test = $('#editablefields-field-avatar button.form-submit[value=Remove]').text(); 
    //alert(test);
  }); 
  $(document).on("click", ".ui-dialog-buttonpane span.ui-button-text:contains('Cancel')", function(){
    //$('#editablefields-field-avatar button.form-submit[value=Remove]').trigger("click"); 
    $('#editablefields-field-avatar button.form-submit[value=Remove]').mousedown();
  //var test = $('#editablefields-field-avatar button.form-submit[value=Remove]').text(); 
  }); 

  $(document).ajaxComplete(function(e, xhr, settings) {
    $('.page-dashboard .field-name-field-avatar input[type="file"]').each(function () {
                $(this).attr('size', '1').wrap('<div class="styledImageLabel"></div>').addClass('styledImageInput');
            });
    var s = "/file/ajax/field_avatar/0/field_avatar/und/0/form";
    
    if(settings.url.indexOf(s) !== -1) {
      var text = $('#editablefields-field-avatar .image-widget-data a').attr('href');
      if($('#editablefields-field-avatar .image-widget-data a').length > 0) {
        var fid = $('#editablefields-field-avatar input.[name=field_avatar\\[0\\]\\[field_avatar\\]\\[und\\]\\[0\\]\\[fid\\]]').attr('value');
        var width = $('#editablefields-field-avatar input.[name=field_avatar\\[0\\]\\[field_avatar\\]\\[und\\]\\[0\\]\\[width\\]]').attr('value');
        var height = $('#editablefields-field-avatar input.[name=field_avatar\\[0\\]\\[field_avatar\\]\\[und\\]\\[0\\]\\[height\\]]').attr('value');
 
        Drupal.EPSACrop.dialog('user', 'field_avatar', 'user', fid, text, [width,height]);
      }
      
      if($('#edit-field-avatar-0-field-avatar-und-0-upload-button').length > 0) {
        $('#editablefields-field-avatar button.form-submit[value=Save]').trigger("click");
      }
    }
    var s1 = "crop/ajax/put";
    
    if(settings.url.indexOf(s1) !== -1) {
      $('#editablefields-field-avatar button.form-submit[value=Save]').trigger("click");
    }
  
    var s2 = "crop/dialog/user";
    if(settings.url.indexOf(s2) !== -1) {
      $(".ui-dialog-titlebar a.ui-dialog-titlebar-close").click(function() {
        $('#editablefields-field-avatar button.form-submit[value=Remove]').mousedown();
      });
      $(".ui-dialog-buttonpane span.ui-button-text:contains('Cancel')").click(function() {
        $('#editablefields-field-avatar button.form-submit[value=Remove]').mousedown();
      });
    }
    var s3 = "system/ajax";
    if(settings.url.indexOf(s3) !== -1) {
      var ajaxResponse = jQuery.parseJSON(xhr.responseText);
      if(ajaxResponse[0].settings.ajax['edit-field-avatar-0-field-avatar-und-0-remove-button']) {
        var img_path = $('#edit-field-avatar-0-field-avatar-und-0-ajax-wrapper img').hide().attr('src');
        img_path = img_path + "?" +Math.random();
        $('#edit-field-avatar-0-field-avatar-und-0-ajax-wrapper img').attr('src', img_path).fadeIn('slow');
      }
      if(ajaxResponse[0].settings.ajax['edit-field-avatar-0-actions-submit']
        || ajaxResponse[0].settings.ajax['edit-field-first-name-0-actions-edit']
        || ajaxResponse[0].settings.ajax['edit-field-specialization-0-actions-edit']
        || ajaxResponse[0].settings.ajax['edit-field-location-0-actions-edit']
        || ajaxResponse[0].settings.ajax['edit-field-bio-0-actions-edit']
      ) {
        if(Drupal.settings.user_prof) {
          var block_messages = $('.pane-cassowary-main-cassowary-portfolio-messages .pane-content').hide();
          var path_get = '/cassowary-messages/' + Drupal.settings.user_prof;
          $.get(path_get, function(data) {
            $(block_messages).html(data).fadeIn('slow');
          });
        }
      }
      var s4 = "social_links/ajax/edit";
      if(settings.url.indexOf(s4) !== -1) {
        var ajaxResponse = jQuery.parseJSON(xhr.responseText);
        if(ajaxResponse[0].settings.cassowary_social_links_form) {
          if(Drupal.settings.user_prof) {
            var block_messages = $('.pane-cassowary-main-cassowary-portfolio-messages .pane-content').hide();
            var path_get = '/cassowary-messages/' + Drupal.settings.user_prof;
            $.get(path_get, function(data) {
              $(block_messages).html(data).fadeIn('slow');
            });
          }
        }
      }
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
