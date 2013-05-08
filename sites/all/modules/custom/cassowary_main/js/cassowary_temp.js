(function($) {
  Drupal.behaviors.cassowary_temp = {
    attach: function (context, settings) {
       if($('.field-type-geonames-usa-location .field-items .field-item p').val() == "") {
         $('.field-type-geonames-usa-location .field-items .field-item p').text('Your location');
       } 
    }
  }
})(jQuery);
