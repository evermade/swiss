$('.js-toolbox-switch').on("click", function () {
  var activateScheme = $(this).attr("data-activate-scheme");
  $('#js-toolbox-scheme-target').attr("class", "b-toolbox__scheme-wrapper " + activateScheme);
});
