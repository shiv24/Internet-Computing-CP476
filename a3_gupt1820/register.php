<html>
<head>
  <title>Page Title</title>
  <link rel="stylesheet" href="./css/assign1.css">
  <link rel="stylesheet" href="./css/assign3.css">
  <script type="text/javascript" src="./js/assign3.js"></script>
</head>
<body background="images/stucco/stucco_@2X.png">

  <?php

    $err_array = array();
    $fname_error = $lname_error = $pass_error = $email_error = $phone_error = $check_error = null;
    $fname= $lname = $pass1 = $pass2 = $email = $phone = "";

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if (empty($_POST["firstname"])) {
        $fname_error = "First name is Required";
        array_push($err_array, $fname_error);
      } else {
        $fname = test_input($_POST["firstname"]);
        if(!preg_match("/^[A-Za-z]+$/", $fname)){
          $fname_error = "First Name can only be letters";
          array_push($err_array, $fname_error);
        }
      }


      if (empty($_POST["lastname"])) {
          $lname_error = "Last name is Required";
          array_push($err_array, $lname_error);
        } else {
          $lname = test_input($_POST["lastname"]);
          if(!preg_match("/^[A-Za-z]+$/", $lname)){
            $lname_error = "Last name can only be letters";
            array_push($err_array, $lname_error);
          }
      }

      if (empty($_POST["email"])) {
          $email_error = "Email is Required";
          array_push($err_array, $email_error);
        } else {
          $email = test_input($_POST["email"]);
          if(!preg_match("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/", $email)){
            $email_error = "Please enter a valid email";
            array_push($err_array, $email_error);
          }
      }

      if (empty($_POST["password"]) || empty($_POST["passwordrepeat"]) ) {
          $pass_error = "Both password fields need to be filled and match";
          array_push($err_array, $pass_error);
        } else {
          $pass1 = test_input($_POST["password"]);
          $pass2 = test_input($_POST["passwordrepeat"]);
          if($pass1 <> $pass2){
            $pass_error = "The passwords must match!";
            array_push($err_array, $pass_error);
          }
      }



      if (empty($_POST["phone"])) {
          $phone_error = "Phone number is Required";
          array_push($err_array, $phone_error);
        } else {
          $phone = test_input($_POST["phone"]);
          if(!preg_match("/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/", $phone)){
            $phone_error = "Phone number must be 10 digits and in the proper format";
            array_push($err_array, $phone_error);
          }
      }

      if (!isset($_POST['agreement'])){
        $check_error = "You must accept the terms and conditions"; // Displays value of checked checkbox.
        array_push($err_array, $check_error);
      } else {
        $check_error = "";
      }

  }?>

<div id = 'main-page'>
    <ul class="topnav">
      <li class = 'top' href="#myAccount">My Account</a>
      <li class = 'top' href="#wishList">Wish List</a>
      <li class = 'top' href="#shoppingCart">Shopping Cart</a>
      <li class = 'top' href="#checkout">Checkout</a>
    </ul>

    <h1 id = 'main-title'>Art Store</h1>

    <ul class="lowerNav">
      <li class = "lower" href="#home">Home</a>
      <li class = "lower" href="#aboutUs">About Us</a>
      <li class = "lower" href="#artWorks">Art Works</a>
      <li class = "lower" href="#artists">Artists</a>
    </ul>

    <div class = "thank-you">
      <?php

      if (sizeof($err_array) == 0 && isset($_POST['submit'])) {
        echo '<div id = "submit-confirmation">';
        echo "<strong>";
        echo "<h1>Thank You! You have succesfully registered</h1>";
        printf("%-30s %-30s\n", "First Name:", $fname );
        echo "<br>";
        printf("%-30s %s\n", "Last Name:", $lname );
        echo "<br>";
        printf("%-30s %s\n", "Email:", $email );
        echo "<br>";
        printf("City: %s",$_POST["city"]);
        echo "<br>";
        printf("State: %s",$_POST["state"]);
        echo "<br>";
        printf("Zip: %s",$_POST["zip"]);
        echo "<br>";
        printf("Phone number: %s",$phone);
        echo "<br>";
        printf("Country: %s",$_POST["country"]);
        echo "<br>";
        printf("Continent: %s",$_POST["continent"]);
        echo "<br>";
        printf("Birth Day: %s",$_POST["birthday"]);
        echo "<br>";
        printf("Favorite Color: %s",$_POST["colors"]);
        echo "</strong>";
        echo "</div>";

        die();
      }

      ?>
    </div>

    <div class = "mySecondBox">
      <form name= "form1" action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method = "post" id = "my-form">
      <h2> Customer Registration </h2>
      <h3 class = "category"> 1. User info </h3>
      <hr>
      <table>
        <tr colspan="2">
          <td>
            First name<br>
            <?php
              if (isset($fname_error)) {
                echo '<input class = "red-bg" type="text" name="firstname"><br>';
              } else {
                echo '<input type="text" name="firstname"><br>';
              }

            ?>
          </td>
          <td>
            Last name<br>
            <?php
            if (isset($lname_error)) {
              echo '<input class = "red-bg" type="text" name="lastname"><br>';
            } else {
              echo '<input type="text" name="lastname"><br>';
            }
            ?>
          </td>
        </tr>
        <tr>
          <td>
            Email<br>
            <?php
              if(isset($email_error)) {
                echo '<input class = "red-bg" type="text" name="email" placeholder="format for email is xxx@yyy.zzz"><br>';
              } else {
                echo '<input type="text" name="email" placeholder="format for email is xxx@yyy.zzz"><br>';
              }
            ?>
          </td>
        </tr>
        <tr>
          <td>
            Password<br>
            <?php
              if (isset($pass_error)) {
                echo '<input class = "red-bg" type="text" name="password" placeholder = "at least 8 characters"><br>';
              } else {
                echo '<input type="text" name="password" placeholder = "at least 8 characters"><br>';
              }
             ?>
          </td>
          <td>
            Password Repeat<br>
            <?php
              if (isset($pass_error)){
                echo '<input class="red-bg" type="text" name="passwordrepeat" placeholder = "at least 8 characters"><br>';
              }else{
                echo '<input type="text" name="passwordrepeat" placeholder = "at least 8 characters"><br>';
              }
            ?>
          </td>
        </tr>
      </table>

      <h3 class = "category">2. Location</h3>
      <hr>
      <table>
        <tr>
          <td>
            Address<br>
            <input type="text" name="address"><br>
          </td>
        </tr>
        <tr class = "geographics">
            <td>
              City<br>
              <input type="text" name="city"><br>
            </td>
            <td>
              State<br>
              <input type="text" name="state"><br>
            </td>
            <td>
              Zip<br>
              <input type="text" name="zip"><br>
            </td>
        </tr>
        <tr>
          <td>
            Phone<br>
            <?php
              if (isset($phone_error)){
                echo '<input class="red-bg" type="text" name="phone" placeholder = "NNN-NNN-NNNN"><br>';
              } else {
                echo '<input type="text" name="phone" placeholder = "NNN-NNN-NNNN"><br>';
              }

            ?>
          </td>
          <td>
            Country<br>
            <select name = "country">
            	<option value="Canada">Canada</option>
            	<option value="United States">United States</option>
            	<option value="Japan">Japan</option>
            </select>

          </td>
        </tr>
        <tr>
          <td>
            <div id = 'radio-button-container'>
            Continent<br>
            <input type="radio" name="continent" value ="North America"> North America<br>
            <input type="radio" name="continent" value ="Europe"> Europe<br>
            <input type="radio" name="continent" value ="South America"> South America<br>
          </div>


          </td>
        </tr>
      </table>

      <h3 class = "category">3. Personal Details</h3>
      <hr>
      <table>
        <tr>
          <td>
            Birth Day<br>
            <input type="text" name="birthday"><br>
          </td>
          <td>
            Favorite Color<br>

            <select name="colors" class="colors">
              <option value = "None">─────</option>
              <option value = "Green">Green</option>
              <option value = "Blue">Blue</option>
              <option value = "Red">Red</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>
            Interest in Art<br>
            <label for="artlove">Minimal</label>
            <input type="range" min="Minimal" max="Love it!" name = 'artlove'>
            <label for="artlove">Love it!</label>
          </td>
        </tr>
      </table>

      <h3 class = "category">4. All Done</h3>
      <hr>
      <table>
        <tr>
          <div id = "termConfirm">
          <input type="checkbox" name="agreement" value="agree"> I agree to the <a href = "#">Terms of the Site</a><br>
          </div>

        <div id = "error-box" class = "red-bg">
          <?php
            if (sizeof($err_array) !== 0){
              echo '<h2>Errors were encountered</h3>';
              foreach($err_array as $err){
                print_r($err);
                echo "<br>";
              }
            }
          ?>
        </div>
        </tr>
        <tr>
          <button type="submit" id="submit-button" name="submit">
            Sign me up!
          </button>
        </tr>
      </table>
    </form>
    </div>
    <div id = 'footer'>
      <p id = 'copyright'> All images are copyright to their owners. This is just a hypothetical site &copy 2014 Copyright Art Store </p>
    </div>
</div>
</body>
</html>
