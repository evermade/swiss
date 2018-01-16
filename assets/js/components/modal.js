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
<a href="https://www.youtube.com/watch?v=vr0qNXmkUJ8&t=16s" data-swiss-modal="youtube">Play Video</a>


IMAGE POPUP
--
<a href="/wp-content/uploads/2017/09/everblox_example_red.png" data-swiss-modal="image">View Image</a>


EXTERNAL WEBSITE HTML
--
<a href="/slug/ .b-footer" data-swiss-modal="external">Open External HTML</a>


INLINE
--
<a href="#example-id" data-swiss-modal="inline">Open Inline HTML</a>
<div id="example-id" class="h-hidden">
    <h2>Modal</h2>
    <p>This content will appear within the container of the modal.</p>
</div>


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

        $('html').on("click", '[data-modal-action="close"]' ,function(){
            modal.close($(this));
        });

        $('html').on("click", '[data-swiss-modal]' ,function(e){
            e.preventDefault();
            modal.clickOpen($(this));
        });

    },

    // On click open popup and get content for it
    clickOpen: function (clickedButton) {

        // get modal content
        const content = modal.getContent($(clickedButton).attr("href"), $(clickedButton).data("swiss-modal"));
        
        // position the window accordingly and disable scrolling
        $('body').attr("data-last-position",$(window).scrollTop());

        $('body').css({
            height: $(document).height() + 'px',
            overflowY: "scroll" 
        });

        $('html').css({
            maxHeight: '100vh',
            overflow: "hidden" 
        });

        // generate modal from template
        $('modals').append(modal.template(content, $(clickedButton).data("swiss-modal")));

    },

        // different ways to get content
        getContent: function(value = "Content undefined", type = "html"){
            if(type == "youtube"){
                return modal.getContentYoutube(value);
            }

            if(type == "image"){
                return modal.getContentImage(value);
            }

            if(type == "external"){
                return modal.getContentExternal(value);
            }

            if(type == "inline"){
                return modal.getContentInline(value);
            }

            return value;
        },


            // YOUTUBE: Create iframe and a youtube wrapper for the 16x9 ratio video
            getContentYoutube: function(value){

                let video_id = value.split('v=')[1];
                const ampersandPosition = video_id.indexOf('&');

                if(ampersandPosition != -1) {
                  video_id = video_id.substring(0, ampersandPosition);
                }

                const output = `<iframe src="https://www.youtube.com/embed/${video_id}" frameborder="0" allowfullscreen></iframe>`;

                return output;

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

            // INLINE: get content from a <div id="target-id"></div>
            getContentInline: function(value){
                return($(value).html());
            },

            // IMAGE: place image url within an img href and return the image html
            getContentImage: function(value){
                return(`<img src="${value}" >`);
            },



    // The popup template
    template: function(content = "<h1>Content has not been set</h1>", style = "default", workspace = "none") {

        const html = `<div class="c-modal" data-modal-style="${style}" data-modal-namespace="${workspace}">

            <div class="c-modal__shadow"></div>

            <div class="c-modal__wrapper">

                <div class="c-modal__container">

                    <div class="c-modal__interface">
                        <div class="c-modal__close" data-modal-action="close"></div>
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
    close: function (modal) {

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
        if($(modal).hasClass("c-modal")){
            $(modal).remove();
        } else {
            $(modal).closest(".c-modal").remove();
        }

    }

};

// finally boot the beast up
modal.init();
