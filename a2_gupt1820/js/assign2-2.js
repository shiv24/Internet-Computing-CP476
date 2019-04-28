window.onload = function() {
  function processForm(e) {
    if (e.preventDefault) e.preventDefault();
    var inputs, index;

    inputs = document.getElementsByTagName("input");
    for (index = 0; index < inputs.length; ++index) {
      item = inputs[index];
      if (inputs[index].value == "") {
        item.classList.add("red-bg", "red-border");
      } else {
        item.classList.remove("red-bg", "red-border");
      }
    }
    var radios = document.querySelectorAll('input[type="radio"]:checked');
    var value = radios.length > 0 ? radios[0].value : null;

    if (!value) {
      document.getElementById("radio-button-container").classList.add("red-bg");
    } else {
      document
        .getElementById("radio-button-container")
        .classList.remove("red-bg");
    }

    var agreeButton = document.getElementById("termConfirm").children[0]
      .checked;

    if (!agreeButton) {
      var subtext = document.createElement("h4");
      var t = document.createTextNode(
        "You must agree to the terms of the site"
      );
      if (!document.getElementById("error-message")) {
        subtext.id = "error-message";
        subtext.appendChild(t);
        myagree = document.getElementById("termConfirm");
        myagree.appendChild(subtext);
        myagree.classList.add("red-bg");
      }
    } else {
      myagree.classList.remove("red-bg");
      toRemove = document.getElementById("error-message");
      myagree.removeChild(toRemove);
    }
    return false;
  }

  var form = document.getElementById("my-form");
  if (form.attachEvent) {
    form.attachEvent("submit", processForm);
  } else {
    form.addEventListener("submit", processForm);
  }
};
