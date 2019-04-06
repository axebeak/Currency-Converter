clearInterval(ratesAjax);

getRates();

var ratesAjax = setInterval(function() {
  getRates();
}, 5000);

function getRates() {
  $.ajax({
    url: '/api?rates=' + source,
    success: function(data) {
      updateRates(data);
      return data;
    },
    error: function(){
      console.log('Error fetching currency data. Please check the logs.');
      return false;
    }
  });
}

function updateRates(rates){
    for (var key in rates) {
        var value = key + ': ' + rates[key];
        var curClass = '#' + key;
        if ($(curClass)[0]){
          $(curClass).html('');
          $(curClass).append(value);
        } else {
          if (rates[key]){
            var newCur = '<li id="' + key + '" class="cur">' + key + ": " + rates[key] + "</li>";
            $('.curList').append(newCur);
            $('select').append('<option value="' + key + ' ">' + key + '</option>');
          } else {
            var newCur = '<li id="' + key + '">' + key + ": Error occured while fetching the value. Check if it exists on source</li>";
            $('.curList').append(newCur);
          }
        }
    }
    return true;
}
