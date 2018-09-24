(function() {

  jQuery(function() {

    function collapseAll(el) {

      el.addClass("-collapsed");
      var schemeFound = el.find('div.acf-field-5846bc36abec7').eq(0);

      if(schemeFound.length == 1) {

        el.css({'background': '#eee'});

        if(found > 1) {
          el.css({'margin-top': '40px'});
        }

        found++;
      }
    }

    var found = 0;

    jQuery('.layout').each(function(index) {
      collapseAll(jQuery(this));
    });
  });

})();
