const block = {

    // create some properties
    elements: [],
    y: false,

    init: function () {
        this.capture();
    },

    capture: function () {
        this.elements = document.querySelectorAll('.b-test');
        console.log(this.elements.length);
    }

};

// finally boot the beast up
block.init();
