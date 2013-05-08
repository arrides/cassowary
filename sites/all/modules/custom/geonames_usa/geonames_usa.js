(function ($) {
  Drupal.behaviors.geonames_usa = {
    attach: function (context, settings) {
        $('.field-type-geonames-usa-location select').change(function () {
          var field_name = $(this).attr('name');
          var re = new RegExp("(.+?)\\[");
          field_name = re.exec(field_name);
          var cid = $(this).val();
          $(this).parents('.form-type-select').next().find('input.form-autocomplete').attr('value', '').unbind();
          var string = $(this).parents('.form-type-select').next().find('input.autocomplete-processed').attr('value');
          var re2 = new RegExp(field_name[1] + "\\/([^.]+)");
          var cid_ci = re2.exec(string);
          string = string.replace(cid_ci[1], cid);
          $(this).parents('.form-type-select').next().find('input.autocomplete-processed').attr('value', string).removeClass('autocomplete-processed');
          Drupal.behaviors.autocomplete.attach(document);
        })
    }
  }
})(jQuery);