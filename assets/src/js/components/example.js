// an example using an object liternal notation to encapsulate into a nice package
const example = {

  // create some properties
  elements: [],
  y: false,

  init: function () {
    this.capture();
  },

  capture: function () {
    this.elements = document.querySelectorAll('.something');
  }

};

// finally boot the beast up
example.init();
