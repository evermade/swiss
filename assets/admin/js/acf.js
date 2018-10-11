(function() {

    jQuery(function() {

        function collapse( el ) {
            el.addClass("-collapsed");
        }

        function styleSectionBlocks( el ) {
            if ( el.data('layout') == 'section' ) {

                el.css({'background': '#eee'});

                if ( found > 1 ) {
                    el.css({'margin-top': '40px'});
                }

                found++;

            }
        }

        function appendBlockTitles( el ) {

            // sniff the block title from the acf markup

            var $handle = el.find('.acf-fc-layout-handle');
            $handle.find('.js-block-title').remove();

            var blockTitle = '';

            var titleInput = el.find('input[name*="_title"],input[name*="_heading"]');
            blockTitle = titleInput.length ? titleInput.val() : '';

            if ( blockTitle == '' ) {
                // no title-field, try to find first header in a columns textarea
                var textarea = el.find('textarea[name*="_columns"]');
                if ( textarea.length ) {
                    blockTitle = jQuery( '<div>'+textarea.val()+'</div>' ).find('h1,h2,h3').text();
                }
            }

            if ( blockTitle != '' ) {
                var style = 'font-size: 85%; opacity: 0.6; margin-left: 1em;';
                $handle.append('<span class="js-block-title" style="'+style+'">'+blockTitle+'</span>');
            }

        }

        var found = 0;

        jQuery('.layout').each(function(index) {
            var $block = $(this);
            collapse( $block );
            styleSectionBlocks( $block );
            appendBlockTitles( $block );
        });

        // refresh block titles every 15 s
        setInterval(function(){
            jQuery('.layout').each(function(index) {
                appendBlockTitles( $(this) );
            });
        },1000*15);
    });

})();
