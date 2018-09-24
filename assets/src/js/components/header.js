import Headroom from 'headroom.js';

const header = {

    el: null,
    toggle: null,
    headroom: null,

    init: function () {
        this.capture();
        this.setupHeadroom();
        this.setupToggle();
    },

    capture: function () {
        this.el = document.querySelector('.js-header');
        this.toggle = document.querySelector('.js-header-toggle');
    },

    setupHeadroom: function() {
        this.headroom = new Headroom(this.el, {
            "offset": 110,
            "tolerance": 5,
        });

        this.headroom.init();
    },

    setupToggle: function() {
        $(this.toggle).on('click', function(e) {
            e.preventDefault();
            $('body').toggleClass('open-mobile-menu');
        });
    }

};

// finally boot the beast up
header.init();