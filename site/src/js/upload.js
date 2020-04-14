//=========================================================================
$("#uploadFileMenuDescription").click(function() {
  var isHidden = $("#uploadFileMenuContainerDescription").is(":hidden");
  if (isHidden) {
    if ($("#uploadFileMenuContainerOptions").is(":hidden")) {
      $('#uploadFileMenuContainerDescription').slideDown();
      $('#uploadFileMenuDescription').css('background-color', '#FAFAFA');
      $('#uploadFileMenuDescription').css('color', '#323232');
    }
    if ($("#uploadFileMenuContainerAdvanced").is(":hidden")) {
      $('#uploadFileMenuContainerDescription').slideDown();
      $('#uploadFileMenuDescription').css('background-color', '#FAFAFA');
      $('#uploadFileMenuDescription').css('color', '#323232');
    }
  } else {
    $('#uploadFileMenuContainerDescription').slideUp();
    $('#uploadFileMenuDescription').css('background-color', '#FFFFFF');
    $('#uploadFileMenuDescription').css('color', '#AFAFAF');
  }
});
//=========================================================================
$("#uploadFileMenuOptions").click(function() {
  var isHidden = $("#uploadFileMenuContainerOptions").is(":hidden");
  if (isHidden) {
    $('#uploadFileMenuContainerOptions').slideDown();
    $('#uploadFileMenuOptions').css('background-color', '#FAFAFA');
    $('#uploadFileMenuOptions').css('color', '#323232');
  } else {
    $('#uploadFileMenuContainerOptions').slideUp();
    $('#uploadFileMenuOptions').css('background-color', '#FFFFFF');
    $('#uploadFileMenuOptions').css('color', '#AFAFAF');
  }
});
//=========================================================================
$("#uploadFileMenuAdvanced").click(function() {
  var isHidden = $("#uploadFileMenuContainerAdvanced").is(":hidden");
  if (isHidden) {
    $('#uploadFileMenuContainerAdvanced').slideDown();
    $('#uploadFileMenuAdvanced').css('background-color', '#FAFAFA');
    $('#uploadFileMenuAdvanced').css('color', '#323232');
  } else {
    $('#uploadFileMenuContainerAdvanced').slideUp();
    $('#uploadFileMenuAdvanced').css('background-color', '#FFFFFF');
    $('#uploadFileMenuAdvanced').css('color', '#AFAFAF');
  }
});
//=========================================================================
