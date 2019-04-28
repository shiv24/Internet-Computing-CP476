window.onload = function() {
  var picsToEnhance = document.getElementsByClassName("sub-product");
  var addedStyling = document.createElement("style");
  addedStyling.type = "text/css";
  addedStyling.innerHTML = ".sub-product>img:hover {transform: scale(1.5)}";
  for (var i = 0; i < picsToEnhance.length; i++) {
    picsToEnhance[i].appendChild(addedStyling);
    picsToEnhance[i].addEventListener("click", function() {
      var newTitle = this.getElementsByTagName("a")[0].innerHTML;
      document.getElementsByClassName(
        "myBox"
      )[0].children[0].innerHTML = newTitle;
      var mainImageSrc = document.getElementById("main-image").src;
      var currentSrc = this.getElementsByTagName("img")[0].src;
      currentSrc = currentSrc.replace(/small/gi, "medium");
      document.getElementById("main-image").src = currentSrc;
    });
  }
};
