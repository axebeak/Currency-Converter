var source = $("h2").attr("class");

$('.convertVal').keyup(function(){
  convertCur();
});

$(".cur").change(function() {
  convertCur();
});

$(".toConvert").change(function() {
  convertCur();
});

function convertCur(){
  $(".converter-output").html("");
  var input = $(".convertVal").val();
  var cur = $( ".cur option:selected" ).text();
  var baseCur = $(".toConvert option:selected").text();
  if (!$.isNumeric(input)){
    $(".result").val("");
    $(".result").val("Enter a number");
    return false;
  }
  if (cur == baseCur){
    $(".result").val("");
    $(".result").val(input);
    return true;
  }
  if (cur == "UAH"){
    return convertUAH(input, baseCur);
  }
  if (baseCur !== "UAH" && cur !== "UAH"){
      return convertOther(input, baseCur, cur);
  }
  if ($("#" + cur)){
    var rate = $("#" + cur).text().split(": ")[1];
    if (!$.isNumeric(rate)){
      $(".result").val("");
      $(".converter-output").append("<div class='alert alert-danger'>Something wrong with the exchange rate value for this currency. Please try again later.</div>");
      return false;
    }
  } else {
    $(".result").val("");
    $(".result").val("And error occured while converting the value.");
    return false;
  }
  var result = Number.parseFloat(input / rate).toFixed(2);
  $(".result").val("");
  $(".result").val(result);
  return true;
}

function convertUAH(val, cur){
    var rate = $("#" + cur).text().split(": ")[1];
    if (!$.isNumeric(rate)){
      $(".result").val("");
      $(".converter-output").append("<div class='alert alert-danger'>Something wrong with the exchange rate value for this currency. Please try again later.</div>");
      return false;
    }
    var result = Number.parseFloat(val * rate).toFixed(2);
    $(".result").val("");
    $(".result").val(result);
    return true;
}

function convertOther(val, baseCur, cur){
    var baseRate = $("#" + baseCur).text().split(": ")[1];
    var convRate = $("#" + cur).text().split(": ")[1];
    if (!$.isNumeric(convRate) || !$.isNumeric(baseRate)){
      $(".result").val("");
      $(".converter-output").append("<div class='alert alert-danger'>Something wrong with the exchange rate value for this currency. Please try again later.</div>");
      return false;
    }
    var rate = baseRate / convRate;
    var result = Number.parseFloat(val * rate).toFixed(2);
    $(".result").val("");
    $(".result").val(result);
    return true;
}
