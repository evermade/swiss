/*

Fast way to put youtube-videos into blocks/layouts

Simple usage example:
  <div class="c-youtube-api-player js-youtube-api-player" data-video-id="wPaTfMyEbVg"></div>

Example with parameters:
  <div class="c-youtube-api-player js-youtube-api-player" data-video-id="wPaTfMyEbVg" data-autoplay="1" data-loop="1" data-sound="0" data-cover="1"></div>

*/

let em = {};

//create empty object in the global em var
em.youtubeAPIPlayer = {};

// create an array to store references to interval-loops
em.youtubeAPIPlayer.loopRefs = [];

//call any functions to be trigger on dom ready
em.youtubeAPIPlayer.init = function () {

  // check that the youtube iframe api isn't already loaded
  if ($("script[src$='www.youtube.com/iframe_api']").length === 0) {

    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  }

};

/**
* Function that decides if autoplay should work for the user's device
*/
em.youtubeAPIPlayer.canAutoplay = function () {
  if (window.innerWidth < 768) {
    return 0;
  } else if (/iPad|iPhone/.test(navigator.userAgent)) {
    return 0;
  }

  return 1;
};

/**
* This will get called once the YouTube script has been loaded
*/
window.onYouTubeIframeAPIReady = function () {

  $('.c-youtube-api-player').each(function () {
    var $el = $(this);

    if (!em.youtubeAPIPlayer.canAutoplay()) {
      // force some settings for devices that won't autoplay videos (modify the data-attributes because onReady-function needs to read them again)
      $el.data('controls', 1);
      $el.data('loop', 0);
      $el.data('autoplay', 1);
      $el.data('autoplay-viewport', 0);
    }

    // read settings
    var id = $el.data('video-id');
    var sound = Number($el.data('sound')) || 0;
    var autoplay = Number($el.data('autoplay')) || 1;
    var autoplayViewport = Number($el.data('autoplay-viewport')) || 0;
    var loop = Number($el.data('loop')) || 0;
    var maskLogo = Number($el.data('mask-logo')) || 0;
    var controls = Number($el.data('controls')) || 0;
    var showinfo = Number($el.data('showinfo')) || 0;
    var related = Number($el.data('related')) || 0;
    var cover = Number($el.data('cover')) || 0;

    // hide element if it's used as a background cover
    if (cover) {
      $el.css({
        'opacity': 0
      });
    }

    // create a unique id for the player
    var playerId = 'em-player-' + id + '-' + Math.ceil(Math.random() * 9999);

    // create a stunt-div that YT script will turn into an iframe
    $('<div id="' + playerId + '"></div>').appendTo($el);

    var player = new window.YT.Player(playerId, {
      height: '390', // will be overwritten by css
      width: '640', // this too
      videoId: id,
      playerVars: {
        'autoplay': autoplayViewport ? 0 : autoplay,
        'controls': controls,
        'showinfo': showinfo,
        'rel': related, // show or hide related videos when video ends
        'iv_load_policy': 3, // hide annotations (notes on video) by default
        'wmode': 'transparent' // required to use z-index on the element on IE
      },
      events: {
        'onReady': em.youtubeAPIPlayer.onReady,
        'onStateChange': em.youtubeAPIPlayer.onPlayerStateChange
      }
    });
  });
};

/**
* This will be called once a player has been loaded
*/
em.youtubeAPIPlayer.onReady = function (event) {

  var player = event.target;
  var $el = $(player.getIframe().parentNode);

  var sound = Number($el.data('sound')) || 0;
  var loop = Number($el.data('loop')) || 0;
  var autoplay = Number($el.data('autoplay')) || 0;
  var autoplayViewport = Number($el.data('autoplay-viewport')) || 0;
  var cover = Number($el.data('cover')) || 0;

  if (!sound) {
    event.target.mute();
  }

  if (autoplayViewport) {
    em.youtubeAPIPlayer.playIfInViewport(player, $el, loop);

    // add a window scroll -listener that will start the video once it gets on the screen
    $(window).on('scroll', function () {
      em.youtubeAPIPlayer.playIfInViewport(player, $el, loop);
    });
  }

  if (!autoplayViewport && autoplay && loop) {
    em.youtubeAPIPlayer.makeLoop(player);
  }

  var debounceMe = em.debounce(function () {
    em.youtubeAPIPlayer.onResize($el);
  }, 250);

  window.addEventListener('resize', debounceMe);

  // make the video cover the parent container
  if (cover) {
    em.youtubeAPIPlayer.videoFill($el);

    // wait a bit before showing the player, to make sure video is playing
    setTimeout(function () {
      $el.css({
        'opacity': 1,
        'transition': 'all 5s ease'
      });
    }, 500);
  }
};

em.debounce = function (func, wait, immediate) {
  var timeout;
  return function () {
    var context = this, args = arguments;
    var later = function () {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};

/**
* This will be called when a player's state changes
*/
em.youtubeAPIPlayer.onPlayerStateChange = function (event) {
  var player = event.target;
  var $el = $(player.getIframe().parentNode);
};

em.inViewPort = function (el) {
  var rect = el.getBoundingClientRect();

  return (
    rect.top >= -el.offsetHeight &&
    rect.left >= -el.offsetWidth &&
    rect.bottom <= el.offsetHeight + (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= el.offsetWidth + (window.innerWidth || document.documentElement.clientWidth)
  );
};

/**
 * Start a player if it's in the viewport
 */
em.youtubeAPIPlayer.playIfInViewport = function (player, $el, loop) {

  // var scrollTop = window.pageYOffset;
  // var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

  if (em.inViewPort($el[0])) {
    // in viewport, start playing
    if (!$el.data('playing')) {
      $el.data('playing', 1);

      player.playVideo(); //console.log('video started');

      if (loop) {
        em.youtubeAPIPlayer.makeLoop(player);
      }
    }
  } else {
    // not in viewport - stop playback
    if ($el.data('playing')) {
      $el.data('playing', 0);

      player.pauseVideo(); //console.log('video paused');
    }
  }
};

/**
 * Make a player loop without a gap by rewinding the video just before it ends
 */
em.youtubeAPIPlayer.makeLoop = function (player) {

  var id = $(player.getIframe()).attr('id');
  var videoStartOffset = 0; // if there's a fade-in or glitch, try changing this to 0.5 (seconds) (NEEDS TO BE LESS THAN EndOffset)
  var videoEndOffset = 1; // don't let video run all the way because it'll stop. in case of looping problems, try tweaking this
  var duration = player.getDuration() - videoEndOffset;

  // clear the old timing loop if exists
  if (typeof (em.youtubeAPIPlayer.loopRefs[id]) != 'undefined') {
    player.seekTo(videoStartOffset); //console.log('go to '+videoStartOffset);
    clearInterval(em.youtubeAPIPlayer.loopRefs[id]); //console.log('clear interval');
  }

  // create timing
  //console.log('set interval');
  em.youtubeAPIPlayer.loopRefs[id] = setInterval(function () {

    if (player.getPlayerState() == window.YT.PlayerState.PLAYING) {
      // video is still playing, rewind to the beginning
      player.seekTo(videoStartOffset); //console.log('go to '+videoStartOffset);

    }

  }, duration * 1000);
};

/**
 * Make the player behave exactly like the background-size: cover css attribute
 */
em.youtubeAPIPlayer.videoFill = function ($player, aspectRatio) {
  var videoHeight, videoWidth;
  aspectRatio = typeof (aspectRatio) === 'undefined' ? 16 / 9 : aspectRatio;

  // calculate height and width based on container size
  if (($player.width() / $player.height()) < aspectRatio) {

    videoHeight = $player.height();
    videoWidth = videoHeight * aspectRatio;

  } else {

    videoWidth = $player.width();
    videoHeight = videoWidth / aspectRatio;

  }

  // set video dimensions
  $player.find('iframe').css({ 'height': videoHeight + 'px', 'width': videoWidth + 'px' });
};

/**
 * Handle browser window resizing
 */
em.youtubeAPIPlayer.onResize = function ($el) {
  var cover = Number($el.data('cover')) || 0;

  if (cover) {
    em.youtubeAPIPlayer.videoFill($el);
  }
};

em.youtubeAPIPlayer.init();
