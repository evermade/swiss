// an example using an object liternal notation to encapsulate into a nice package
const blog = {

  // create some properties
  elements: [],
  y: false,

  init: function () {
    this.setupMobileClick();
  },

  setupMobileClick: function () {
    $('.js-blog__sidebar-mobile').on("click", function () {
      $(this).parent().toggleClass("c-sidebar-widget--open");
    });
  }

};

// finally boot the beast up
blog.init();
