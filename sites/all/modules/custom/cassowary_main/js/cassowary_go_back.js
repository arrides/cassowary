(function ($) {
  $(document).ready(function(){
      $('a.back').click(function(){
          if(document.referrer.indexOf(window.location.hostname) != -1){
              parent.history.back();
              return false;
          }
      });
  });
})(jQuery);