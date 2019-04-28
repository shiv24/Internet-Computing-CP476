$(document).ready(function() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var myObj = JSON.parse(this.responseText);
      var firstSelect = $("#artist-select");
      $.each(myObj["lastName"], function(val, text) {
        firstSelect.append(
          $("<option></option>")
            .val(text)
            .html(text)
        );
      });

      var secondSelect = $("#museum-select");
      $.each(myObj["museums"], function(val, text) {
        secondSelect.append(
          $("<option></option>")
            .val(text)
            .html(text)
        );
      });

      var thirdSelect = $("#shape-select");
      $.each(myObj["shapes"], function(val, text) {
        thirdSelect.append(
          $("<option></option>")
            .val(text)
            .html(text)
        );
      });
    }
  };
  xmlhttp.open("GET", "listInfo.php", true);
  xmlhttp.send();
});
