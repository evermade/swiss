/*

Files:
---------------------
_c-modal.scss              // Popup wrapper styling
modal.js                   // Template
/templates/modals.php      // <modals> wrapper where all popups are


---------------------
EXAMPLES
---------------------


PLAY YOUTUBE VIDEO
--
<a href="https://www.youtube.com/watch?v=vr0qNXmkUJ8&t=16s" data-swiss-modal="youtube" data-autoplay="1">Play Video</a>


IMAGE POPUP
--
<a href="/wp-content/uploads/2017/09/everblox_example_red.png" data-swiss-modal="image">View Image</a>


EXTERNAL WEBSITE HTML
--
<a href="/em/ .b-footer" data-swiss-modal="external">Open External HTML</a>


INLINE
--
<a href="#example-id" data-swiss-modal="inline">Open Inline HTML</a>
<div id="example-id" class="h-hidden">
    <h2>Modal</h2>
    <p>This content will appear within the container of the modal.</p>
</div>


GALLERY NEXT/PREV (NAMESPACE FUNCTIONALITY)
--
<a href="http://placeowl.com/640" data-swiss-modal-namespace="test-gallery" data-swiss-modal="image">View Image 1</a>
<a href="http://placeowl.com/480" data-swiss-modal-namespace="test-gallery" data-swiss-modal="image">View Image 2</a>


---------------------
GET CONTENT FUNCTIONS - data-swiss-modal=""
---------------------
modal.getContentYoutube();
modal.getContentImage();
modal.getContentExternal();
modal.getContentInline();

 */
const modal = {

    // create some properties
    elements: [],

    // Init popup functionality
    init: function () {

        $(document)

            .on("click", '[data-swiss-modal-action="prev"],[data-swiss-modal-action="next"]' ,function(){
                modal.close( this );
                let nextPrevModal;

                if( $(this).data("swiss-modal-action") == "prev" ){
                    nextPrevModal = modal.clickOpen(modal.getNextPrev(-1));
                    $(nextPrevModal).addClass("c-modal--anim-prev");
                } else {
                    nextPrevModal = modal.clickOpen(modal.getNextPrev(1));
                    $(nextPrevModal).addClass("c-modal--anim-next");
                }
            })

            .on("click", '[data-swiss-modal-action="close"]' ,function(){
                modal.close( this );
            })

            .on("click", '[data-swiss-modal]' ,function(e){
                e.preventDefault();
                modal.clickOpen( this );
            })
        ;

    },

    // On click open popup and get content for it
    clickOpen: function (clickedButton) {

        const $clickedButton = $(clickedButton);

        // get modal content
        const content = modal.getContent( $clickedButton );

        // position the window accordingly and disable scrolling
        $('body')

            .attr( "data-last-position", $(window).scrollTop() )

            .css({
                height: $(document).height() + 'px',
                overflowY: "scroll"
            })
        ;

        $('html').css({
            maxHeight: '100vh',
            overflow: "hidden"
        });

        // remove namespace active
        $('.h-modal-namespace-active').removeClass("h-modal-namespace-active");

        // make active for namespace
        $clickedButton.addClass("h-modal-namespace-active");

        // generate modal from template
        const template = modal.template(content, $clickedButton.data("swiss-modal"), $clickedButton.data("swiss-modal-namespace"));

        return $(template).appendTo('modals');

    },

    // different ways to get content
    getContent: function( $link ) {

        const href = $link.attr("href");
        const type = $link.data("swiss-modal");

        if ( type == "youtube" ) {
            const options = {
                autoplay: Number( $link.data("autoplay") ),
            };
            return modal.getContentYoutube( href, options );
        }

        if ( type == "image" ) {
            return modal.getContentImage( href );
        }

        if ( type == "external" ) {
            return modal.getContentExternal( href );
        }

        if ( type == "inline" ) {
            return modal.getContentInline( href );
        }

        return href;
    },


    // YOUTUBE: Create iframe and a youtube wrapper for the 16x9 ratio video
    getContentYoutube: function(url, options){

        const regex = new RegExp('(youtu.be/|youtube.com/watch\\?v=)(\\w+)');
        const matches = regex.exec( url );
        const video_id = matches ? matches[2] : 0;

        const autoplay = options && options.autoplay ? 1 : 0;

        return video_id ? `<iframe src="https://www.youtube.com/embed/${video_id}?autoplay=${autoplay}" frameborder="0" allowfullscreen></iframe>` : '';

    },

    // INLINE: get content from a <div id="target-id"></div>
    getContentInline: function(value){
        return($(value).html());
    },

    // IMAGE: place image url within an img href and return the image html
    getContentImage: function(value){
        return(`<img src="${value}" >`);
    },

            // EXTERNAL: Pull html from an external page
            getContentExternal: function(value){

                const urlParameters = value.split(" .");

                $.get(urlParameters[0], function(data) {
                    var $response = $('<div />').html(data);
                    var $newContent = $response.find('.'+urlParameters[1]);

                    $(".c-modal__content").removeClass("h-wysiwyg-html");
                    $(".c-modal__content").html($newContent);

                },'html');

                return(`<div class="c-loader">Loading ...</div>`);

            },




    // The popup template
    template: function(content = "<h1>Content has not been set</h1>", style = "default", namespace = "none") {

        let prevUi = "";
        let nextUi = "";

        // if namespace is set then show next prev elements
        if ( namespace != "none" ) {

            // if prev element is available. Show Prev UI
            if ( modal.getNextPrev(-1) ) {
                prevUi = `<div class="c-modal__nextprev c-modal__nextprev--prev" data-swiss-modal-action="prev" data-swiss-modal-namespace="${namespace}"></div>`;
            }

            // if next element is available. Show Next UI
            if ( modal.getNextPrev(1) ) {
                nextUi = `<div class="c-modal__nextprev c-modal__nextprev--next" data-swiss-modal-action="next" data-swiss-modal-namespace="${namespace}"></div>`;
            }

        }

        // create template and include next/prev depending on namespace
        const html = `<div class="c-modal" data-swiss-modal-style="${style}">

            <div class="c-modal__shadow" data-swiss-modal-action="close"></div>

            <div class="c-modal__wrapper">

                <div class="c-modal__container">

                    <div class="c-modal__interface">
                        ${prevUi}
                        ${nextUi}
                        <div class="c-modal__close" data-swiss-modal-action="close"></div>
                    </div>

                    <div class="c-modal__content h-wysiwyg-html">
                        ${content}
                    </div>

                </div>

            </div>

        </div>`;

        return html;
    },

    // Close the popup
    close: function ( modal ) {

        const $modal = modal.classList.contains('c-modal') ? $(modal) : $(modal).closest(".c-modal");

        // clear window position from disabling the scroll
        $('body').css({
            height: "",
            overflowY: ""
        });

        $('html').css({
            maxHeight: "",
            overflow: ""
        });

        // scroll to windows original position before enabling popup
        $(window).scrollTop($('body').attr("data-last-position"));

        // remove the modal from DOM
        $modal.remove();

    },

    // get the next/prev element. If no element is found then return false.
    getNextPrev: function (nextprev = 1) {

        const nsCurrent = $('.h-modal-namespace-active');

        const nsElements = $('[data-swiss-modal-namespace="'+$(nsCurrent).data("swiss-modal-namespace")+'"]:not(.c-modal__nextprev)');

        const nsIndex = $(nsElements).index(nsCurrent);

        if ( nsIndex+nextprev < 0 ) {
            return false;
        }

        if ( nsIndex+nextprev > nsElements.length-1 ) {
            return false;
        }

        const nsNew = $(nsElements).eq(nsIndex+nextprev);

        return nsNew;
        //console.log(nsNew,nsElements.length,nsIndex+nextprev);
    }

};

// finally boot the beast up
modal.init();
