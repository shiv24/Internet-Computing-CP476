window.onload = function() {
  function processForm(e) {
    if (e.preventDefault) e.preventDefault();

    var errorlist = [];
    var inputs, index;

    var fname = document.getElementsByName("firstname")[0].value;
    var lname = document.getElementsByName("lastname")[0].value;
    var email = document.getElementsByName("email")[0].value;
    var pass1 = document.getElementsByName("password")[0].value;
    var pass2 = document.getElementsByName("passwordrepeat")[0].value;
    var phone = document.getElementsByName("phone")[0].value;

    function DueDiligence(
      goahead,
      elemName,
      elemVar,
      emptyErr,
      invalidErr,
      elist
    ) {
      // Declare a function
      if (goahead) {
        document
          .getElementsByName(elemName)[0]
          .classList.add("red-bg", "red-border");

        var subtext = document.createElement("h5");
        if (elemVar.length == 0) {
          var inside = document.createTextNode(emptyErr);
          subtext.appendChild(inside);
        } else {
          var inside = document.createTextNode(invalidErr);
          subtext.appendChild(inside);
        }
        elist.push(subtext);
      } else {
        document
          .getElementsByName(elemName)[0]
          .classList.remove("red-bg", "red-border");
      }
    }

    var namecheck = /^[A-Za-z]+$/;
    var emailcheck = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    DueDiligence(
      !fname.match(namecheck),
      "firstname",
      fname,
      "Firstname required",
      "Invalid Firstname",
      errorlist
    );

    DueDiligence(
      !lname.match(namecheck),
      "lastname",
      lname,
      "Lastname required",
      "Invalid Lastname",
      errorlist
    );
    DueDiligence(
      !emailcheck.test(email),
      "email",
      email,
      "Email Required",
      "Invalid Email",
      errorlist
    );

    String.prototype.isEmpty = function() {
      return this.length === 0 || !this.trim();
    };

    if (pass1.isEmpty() || pass2.isEmpty() || pass1 !== pass2) {
      document
        .getElementsByName("password")[0]
        .classList.add("red-bg", "red-border");
      document
        .getElementsByName("passwordrepeat")[0]
        .classList.add("red-bg", "red-border");

      var subtext = document.createElement("h5");
      var inside = document.createTextNode(
        "Passwords are required and must match"
      );
      errorlist.push(subtext);
      subtext.appendChild(inside);
    } else {
      document
        .getElementsByName("password")[0]
        .classList.remove("red-bg", "red-border");
      document
        .getElementsByName("passwordrepeat")[0]
        .classList.remove("red-bg", "red-border");
    }
    var phonePattern = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/;

    DueDiligence(
      !phone.match(phonePattern),
      "phone",
      phone,
      "phone number required",
      "Invalid phone number",
      errorlist
    );

    var agreeButton = document.getElementById("termConfirm").children[0]
      .checked;

    if (!agreeButton) {
      myagree = document.getElementById("termConfirm");
      var subtext = document.createElement("h5");
      var inside = document.createTextNode(
        "Terms of site need to be agreed to"
      );
      errorlist.push(subtext);
      subtext.appendChild(inside);
      myagree.classList.add("red-bg", "red-border");
    } else {
      myagree.classList.remove("red-bg", "red-border");
    }

    if (errorlist.length > 0) {
      if (document.getElementById("problem-container")) {
        var element = document.getElementById("problem-container");
        element.parentNode.removeChild(element);
      }
      var problems = document.createElement("div");
      problems.id = "problem-container";
      var probCont = document.createElement("h3");
      var line = document.createElement("hr");
      var bigMessage = document.createTextNode("Errors were encountered");
      probCont.appendChild(bigMessage);

      problems.appendChild(probCont);
      problems.appendChild(line);

      var theList = document.createElement("div");
      theList.id = "problem-list";

      errorlist.forEach(function(message) {
        theList.appendChild(message);
      });

      problems.appendChild(theList);

      appendTo = document.getElementById("termConfirm");

      appendTo.appendChild(problems);
      ready = false;
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
