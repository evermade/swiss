(function() {
    jQuery(function() {
        function collapse(el) {
            el.classList.add("-collapsed");
        }

        function styleSectionBlocks(el, first) {
            if (el.getAttribute("data-layout") == "section") {
                el.style.backgroundColor = "#eee";
                if (!first) {
                    el.style.marginTop = "40px";
                }
            }
        }

        function readTextInputs(el) {
            // define selectors to search
            var selectors = [
                'input[name*="_title"]',
                'input[name*="_heading"]'
            ];
            var textInput = el.querySelector(selectors.join(","));

            return textInput ? textInput.value : "";
        }

        function readTextareas(el) {
            // define selectors to search
            var selectors = [
                'textarea[name*="_columns"]',
                'textarea[name*="_hero"]',
                'textarea[name*="_section-header"]',
                'textarea[name*="_slide-list"]'
            ];
            var textarea = el.querySelector(selectors.join(","));

            return textarea
                ? jQuery("<div>" + textarea.value + "</div>")
                      .find("h1,h2,h3")
                      .text()
                : "";
        }

        function appendBlockTitle(el) {
            // sniff the block title from the acf markup

            // the handle is where we'll inject the title
            var handle = el.querySelector(".acf-fc-layout-handle");

            if (!handle) return false;

            // look for a title in some text -inputs first
            var blockTitle = readTextInputs(el);

            // if a title wasn't found in any text inputs, try wysiwyg editors
            blockTitle = blockTitle ? blockTitle : readTextareas(el);

            // inject the block title in the acf markup if found
            handle.setAttribute("data-block-title", blockTitle);
        }

        function runAll() {
            var blocks = document.querySelectorAll(".layout");

            for (var i = 0; i < blocks.length; i++) {
                collapse(blocks[i]);
                styleSectionBlocks(blocks[i], i == 0);
                appendBlockTitle(blocks[i]);
            }
        }

        // initial run
        runAll();
    });
})();
