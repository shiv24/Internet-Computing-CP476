<?php
session_start();
?>
<?php
  if (isset( $_SESSION['wishlist'])) {
    $val = sizeof($_SESSION['wishlist']);
  } else {
    $val = 0;
  }
?>

    <ul class="topnav">
      <li class = 'top' href="#myAccount">My Account</a>
      <li class = 'top' href="#">
        <a class = "wishLink" style = 'text-decoration: none; color:inherit;'href ="../start/view-wish-list.php">Wish List</a> <?php
        if ($val >0){
          echo "<h4 style='color: red;'>$val</h4>";
        }
      ?></li>
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
