$(document).ready(function(){
function defaultActive(){
  if ($(".activeMenuItem").length == 0){
    $('#home-item').addClass("activeMenuItem");
    var startLocation = $(".activeMenuItem").position().left;
    var startWidth =   $(".activeMenuItem").width();
    moveSelector(startLocation, startWidth, 0);
    return true;
  }
  return false;
}

function headerSet(){
  var containerWidth = $("#main").width();
  var containerPad = parseInt( $(".container").css("padding-left") );
  var containerMar = parseInt( $(".container").css("margin-left") );
  $("header").css("width", containerWidth);
  $("header").css("padding-left", containerPad);
  $("header").css("margin-left", containerMar);
  return true;
}

function moveSelector(location, width, time){
  $(".selector").animate({
      left: location,
      width: width
  }, time);
}

$(".nav-item").click(function(){
  $(".nav-item").removeClass("activeMenuItem");
  $(this).addClass("activeMenuItem");
  var location = $(this).position().left;
  var width = $(this).width();
  var apiVal = $(this).attr("id");
  apiVal = apiVal.replace("-item", "");
  moveSelector(location, width, 500);
  $("#main").html('');
  $(".lds-ring").show();
  $.ajax({
    url: "/api?load-page=" + apiVal,
    cache: false,
    error: function(){
      var errorMes = "<div class='alert alert-danger'>Some error occured. Please check the logs for additional information or try again later.</div>"
      $(".lds-ring").hide();
      $("#main").append(errorMes);
    },
    success: function(html){
      $(".lds-ring").hide();
      $("#main").html('');
      $("#main").append(html);
    }
  });
});

$(window).resize(function() {
  var activeLocation = $(".activeMenuItem").position().left;
  var activeWidth =   $(".activeMenuItem").width();
  moveSelector(activeLocation, activeWidth, 0);
  headerSet();
});

headerSet();
defaultActive();

});
