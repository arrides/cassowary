(function ($) {
  $(function(){
    var width = $('.jcarousel-skin-cassowary .jcarousel-clip-horizontal').width();
    //$('.jcarousel-skin-cassowary .jcarousel-clip-horizontal').width(810);
    var count = $('.jcarousel-skin-cassowary .jcarousel-clip-horizontal ul li').length
    
    var str = window.location.href.toString().split(window.location.host)[1];
    var re = new RegExp("(\\/user\\/[^d]+\\/portfolio\\/[^d]+)");
    str = re.exec(str);
    var selector = '.jcarousel-skin-cassowary .jcarousel-clip-horizontal li a[href="' + str[1] + '"]';
    var listItem = $(selector);
    var index = $('.jcarousel-skin-cassowary .jcarousel-clip-horizontal li a').index(listItem);
    if(index > 2) {
      if(index + 2 > count) {
        k = count - index;
      }
      else {
        k = index - 2;
      }
      
      for (var i=0;i<k;i++)
      {
        //$('.jcarousel-next-horizontal').trigger("click");
        //alert('click ' + i);
      }
    }
  })
})(jQuery);