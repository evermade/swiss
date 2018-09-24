/**
 * Automatically sets all external links to open in a new tab. Also includes
 * protection from the target=_blank + window.location vulnerability. For
 * cross-browser compatibility, we need to include noopener and noreferrer.
 *
 * For more info read https://mathiasbynens.github.io/rel-noopener/
 */

let anchors = document.querySelectorAll('a');

if (anchors.length > 0) {
  for (let i = 0; i < anchors.length; ++i) {
    let a = new RegExp('/' + window.location.host + '/');
    let b = new RegExp(/mailto:/); // prevent target blank on mailto links

    if (!a.test(anchors[i].href) && !b.test(anchors[i].href)) {
      anchors[i].setAttribute("target", "_blank");
      anchors[i].setAttribute("rel", "noopener noreferrer");
    }
  }
}
