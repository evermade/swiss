// make a whole area clickable while not breaking nested links
// usage: <div class="c-my-component js-clickable h-clickable" data-url="http://km.em87.io">Kilometer race! by <a href="http://www.evermade.fi">Evermade</a></div>
$(document).on('click', '.js-clickable', function (e) {
  let $el = $(this);

  //if an node clicked within is an achor lets allow to bubble up and do its thing, else go to link
  if (e.target.tagName.toLowerCase() == "a") {
    return true;
  } else {
    let url = $el.attr("data-url");
    let target = $el.attr('target');

    if (url) {

      if (!target) {
        // externalize this js-clickable if it's pointed to another domain
        let a = new RegExp('/' + window.location.host + '/');
        if (!a.test(url)) {
          target = '_blank';
        }
      }

      if (typeof target !== typeof undefined && target !== false) {
        let win = window.open(url, target);
        win.focus();
      } else {
        window.location.href = url;
      }
    }
  }
});
