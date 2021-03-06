function outputResponse(response){
    $(".output").append(response);
    $(".output").css("opacity", 0);
    $(".output").css("top", "50px");
    $(".output").animate({
        opacity: 1,
        top: "0px",
        }, 1000, function() {
            return true;
    });
}

if(typeof ratesAjax !== "undefined"){
  clearInterval(ratesAjax);
}

$(document).on("click",".fa-times",function(){
     var parent = $(this).parent();
     $(parent).remove();
});

$(".btn-add").click(function(){
    var newCur = "<div class=\"d-flex\"><input type=\"text\" class=\"cur\" placeholder=\"Currency\"><input class=\"ml-4 curVal\" type=\"text\" placeholder=\"Value for 'Local File'\"><i class=\"ml-2 fa fa-times\" aria-hidden=\"true\"></i></div>";
    $(".currencies").append(newCur);
});

$(".btn-sbt").click(function(){
    var currencies = [];
    var values = [];

    var curVals = {};

    $(".cur").each(function(){
        $(".output").html("");
        $("input").css("border-bottom", "1px solid #f7911d");
        var thisVal = $(this).val();
        if (!thisVal){
            currencies.push("PASSTHIS");
        } else {
            currencies.push(thisVal);
        }
    });

    $(".curVal").each(function(){
        var thisVal = $(this).val();
        values.push(thisVal);
    });

    for (i = 0; i < values.length; i++){
        curVals[currencies[i]] = values[i];
    }

    for (var cur in curVals) {
        if (cur == "PASSTHIS") {
            delete curVals[cur];
            continue;
        }
        if (!$.isNumeric(curVals[cur])){
            outputResponse("<div class='alert alert-danger'>ERROR! The currency value must be numeric!</div>");
            return false;
        }
    }

    var vals = JSON.stringify(curVals);
    $(".lds-ellipsis").show();
    $("button").hide();
    $.ajax({
        url: "/api?currencies=" + vals,
        success: function(data) {
            $("button").show();
            $(".lds-ellipsis").hide();
            outputResponse("<div class='alert alert-info'>Currencies succesfully updated. It may take several seconds for the updates to be displayed.</div>");
        },
    });
});
