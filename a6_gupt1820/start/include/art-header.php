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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0">
        <title>Assignment 1 - Page 1</title>
        <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">
        <link href="../css/reset.css" rel="stylesheet">
        <!-- <link href="../css/styles.css" rel="stylesheet"> -->
        <link href="../open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>
    <body>
      <div class = "container">
      <main style="overflow:auto;">
        <div id = 'main-page'>


        <div>
        <ul class="topnav">
          <div class = "row">
            <div class = "col-md-5">
            <li class = 'top'> Welcome to art store,<a href = "#"> Log in</a> or <a href = "#">Create new account</a> </li>
            </div>
            <div class = "col-md-7">
              <Span>
            <li class = 'top' href="#myAccount">My Account</a>
              <li class = 'top' href="#">
                <span class="oi oi-heart" title="heart" aria-hidden="true"></span>
                <a class = "wishLink" style = 'text-decoration: none; color:inherit;'href ="../start/view-wish-list.php">Wish List</a> <?php
                if ($val >0){
                  echo "<h4 style='color: red;'>$val</h4>";
                }
              ?></li>
              <span class="oi oi-cart"></span>
              <li class = 'top' href="#shoppingCart">Shopping Cart</a>
              <span class="oi oi-arrow-thick-right"></span>
              <li class = 'top' href="#checkout">Checkout</a>
              </Span>
            </div>
          </div>
        </ul>
      </div>
      <div class = "col-md-12">
        <div class = "col-md-5">
          <h1 id = 'main-title' style="font-family: 'Sawarabi Mincho', sans-serif;">Art Store</h1>
        </div>
      <form>
      <div class = "col-md-3">
      <div class="input-group">
        <input id="search" type="text" class="form-control" name="search" placeholder="search">
        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
      </div>
    </div>
      </form>
    </div>

    <ul class="lowerNav">
      <div class = "row">
        <div class = "col-md-5">
          <li class = "lower" href="#home">Home</a>
          <li class = "lower" href="#aboutUs">About Us</a>
          <li class = "lower" href="#artWorks">Art Works</a>
          <li class = "lower" href="#artists">Artists</a>
        </div>
        <div class = "col-md-7">
        </div>
      </div>
    </ul>
