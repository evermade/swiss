/**
 * Generic modal for Swiss, extends VodkaBears/Remodal
 *
 * Usage examples:
 *
 * - Define modal and link to it:
 *
 *   <div class="remodal" data-remodal-id="modal-some-unique-id">
 *     <p>Hello</p><p>Yes, this is modal</p>
 *   </div>
 *
 *   <a data-remodal-target="modal-some-unique-id">Open modal</a>
 *
 *
 * - Spawn a modal dynamically:
 *
 *   <script> em.modal.spawn( '<img src="http://pyht.io/assets/img/slide-pyhtio.jpg">' ); </script>
 *
 * or:
 *
 *   <script> em.modal.spawn({content:'<p>What? Who is this?</p><p>Modal? Is that you?</p>',padded:1})
 *
 * or load content from server:
 *
 *   <script> em.modal.spawn({url:'/admin-ajax.php?action=give_me_some_sweet_ass_html',padded:1}); </script>
 *
 *
 * - If new modals are loaded with ajax:
 *
 *  call em.modal.setup() again afterwards
 */

import remodal from 'remodal';

(function() {

    //create empty object in the global em var, dont forget to add the init call in the main.js!
    em.modal = {};

    em.modal.options = {
        hashTracking: false
    };

    em.modal.firstRun = true;

    //call any functions to be trigger on dom ready
    em.modal.init = function() {
        em.modal.setup();
        em.modal.closeCallback();
    };

    em.modal.setup = function() {
        $('[data-remodal-id]').remodal( em.modal.options );

        if (em.modal.firstRun) {

            $(document).on('opened', '.remodal', function () {
                // create the close button if it isn't there already
                var $openModal = $('.remodal.remodal-is-opened');
                if (!$openModal.find('.remodal-close').length) {
                    $openModal.append('<button data-remodal-action="close" class="remodal-close js-hidden"></button>');

                    // just to make the opening feel a little smoother:
                    setTimeout(function(){$openModal.find('.remodal-close').removeClass('js-hidden');},50);
                }
            });

            em.modal.firstRun = false;
        }
    };

    em.modal.closeCallback = function() {
        $(document).on('closed', '.remodal', function (e) {
            // modal was closed (the contents remain in the DOM)
            // destroy video players etc here if needed

            $(".modal-temp").remove();
        });
    };

    em.modal.spawn = function(options) {
        var date = new Date();
        var modal_id = 'modal-'+date.getTime();

        var $modal = $('<div class="remodal modal-temp" data-remodal-id="'+modal_id+'"></div>');

        if (typeof(options) == 'string') {
            if (options.match(/^(https?:)?\//)) {
                // options is a url
                // regexp searches for protocol or slash in the beginning of the string

                $modal.load(options, function( html ){
                    // options loaded
                    em.modal.show($modal);
                });

            } else if (options !== '') {
                // assume options is a piece of markup

                $modal.append(options);
                em.modal.show($modal);

            }
        } else if (typeof(options)!='undefined') {

            if (options instanceof jQuery) {
                // options is a jQuery object

                $modal.append(options);
                em.modal.show($modal);

            } else if (typeof(options)=='object') {
                // options is a javascript object

                if (options.padded) {
                    $modal.addClass('remodal--padded');
                }

                if (options.url) {
                    $modal.load(options.url, function(html) {
                        // options loaded
                        em.modal.show($modal);
                    });
                } else if (options.content) {
                    $modal.append(options.content);
                    em.modal.show($modal);
                }
            }
        }
    };

    em.modal.show = function($modal) {
        var instance = $modal.remodal(em.modal.options);
        instance.open();
    };

    /**
     * Helper function to create a new remodal and play a video in it
     * @param videoId (Video id)
     * @param videoType (Video type - optional, defaults to Youtube, also accepts vimeo)
     */
    em.modal.playVideo = function(videoId, videoType) {
        if (typeof(videoId)=='undefined') {
            return false;
        }

        if (typeof(videoType)=='undefined') {
            videoType = 'youtube';
        }

        videoId = videoId.replace(/[^A-Za-z0-9_-]/g,''); // clean the video id string
        var remodalId = 'remodal-video-'+videoId;
        var videoSrc = '';

        if (videoType == 'vimeo') {
            videoSrc = 'https://player.vimeo.com/video/'+videoId+'?autoplay=1';
        } else {
            videoSrc = 'https://www.youtube.com/embed/'+videoId+'?autoplay=1';
        }
        var $modal = $('<div class="remodal modal-temp" data-remodal-id="'+remodalId+'"><div class="remodal__video"><iframe width="560" height="315" src="'+videoSrc+'" frameborder="0" allowfullscreen></iframe></div></div>');
        $modal.appendTo('body').remodal().open();
    };

})();
