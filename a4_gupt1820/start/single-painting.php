<?php
include 'include/config.php';
include 'functions.php';
$conn = new mysqli($dbServer,$user, $pass, $db) or die("Unable to connect");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/reset.css" rel="stylesheet">
</head>
<body>
  <?php
    if (isset($_GET['id'])){
      $paintingId = $_GET['id'];
      $sql = "SELECT * FROM Paintings join Galleries on Paintings.GalleryID = Galleries.GalleryID join Artists on Paintings.ArtistID = Artists.ArtistID WHERE Paintings.PaintingID = '$paintingId';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);

      $PaintingId = utf8_encode($row['PaintingID']);
      $imageName = utf8_encode($row['ImageFileName']);
      $title = utf8_encode($row['Title']);
      $year = utf8_encode($row['YearOfWork']);
      $medium = utf8_encode($row['Medium']);
      $width = utf8_encode($row['Width']);
      $height = utf8_encode($row['Height']);
      $galleryName = utf8_encode($row['GalleryName']);
      $galleryCity = utf8_encode($row['GalleryCity']);
      $galleryCountry = utf8_encode($row['GalleryCountry']);
      $fname = utf8_encode($row['FirstName']);
      $lname = utf8_encode($row['LastName']);
      $excerpt = utf8_encode($row['Excerpt']);
      $msrp = number_format(utf8_encode($row['MSRP']));


      $sql = "SELECT * FROM Paintings join PaintingGenres on Paintings.PaintingID = PaintingGenres.PaintingID join Genres on PaintingGenres.GenreID = Genres.GenreID WHERE Paintings.PaintingID = '$paintingId';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $genreName = utf8_encode($row['GenreName']);


      $sql = "SELECT * FROM Paintings join PaintingSubjects on Paintings.PaintingID = PaintingSubjects.PaintingID join Subjects on PaintingSubjects.SubjectID = Subjects.SubjectID WHERE Paintings.PaintingID = '$paintingId';";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $subjectName = utf8_encode($row['SubjectName']);
    }
   ?>
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


    <div class = "myBox">
        <h3><?php echo $title?></h3>
        <p>By <a href = "#author"> <?php echo $fname." ".$lname?> </a>
        <img id = 'main-image' src = "images/medium/<?php echo $imageName?>.jpg">
        <div id = "right-hand-side">
        <p><?php echo $excerpt ?>
        </p>
        <h4 id = 'dollar-value'>$<?php echo $msrp?></h4>
        <div id = 'outside-buttons'>
          <div id = 'button-container'>
            <button class="main-buttons">Add to Wish List</button>
            <button class="main-buttons">Add to Shopping Cart</button>
          </div>
        </div>

        <h4>Product Details </h4>
        <hr>

        <table>
          <tr>
            <td>Date:</td>
            <td><?php echo $year?></td>
          </tr>
          <tr>
            <td>Medium:</td>
            <td><?php echo $medium?></td>
          </tr>
          <tr>
            <td>Dimensions:</td>
            <td><?php echo $height."cm x ".$width."cm"?></td>
          </tr>
          <tr>
            <td>Home:</td>
            <td><a href = '#'><?php echo $galleryName.", ".$galleryCity.", ".$galleryCountry ?></a></td>
          </tr>
          <tr>
            <td>Genres:</td>
            <td><a href = '#'><?php echo $genreName?></a></td>
          </tr>
          <tr>
            <td>Subjects:</td>
            <td><a href = '#'><?php echo $subjectName?></a></td>
          </tr>
        </table>
      </div>
      <h3 id = "similar">Similar Products</h3>
      <hr>
        <div class = 'sub-product'>
          <img src = 'images/square-medium/116010.jpg'>
          <a href= '#'> Artist Holding a Thistle </a>
          <div class = 'inner-buttons'>
            <button class="sub-button">View</button>
            <button class="sub-button">Wish</button>
            <button class="sub-button">Cart</button>
          </div>
        </div>
        <div class = 'sub-product'>
          <img src = 'images/square-medium/120010.jpg'>
          <a href= '#'> Portrait of Eleanor of Toledo </a>
          <div class = 'inner-buttons'>
            <button class="sub-button">View</button>
            <button class="sub-button">Wish</button>
            <button class="sub-button">Cart</button>
          </div>
        </div>
        <div class = 'sub-product'>
          <img src = 'images/square-medium/107010.jpg'>
          <a href= '#'> Madame de Pompadour </a>
          <div class = 'inner-buttons'>
            <button class="sub-button">View</button>
            <button class="sub-button">Wish</button>
            <button class="sub-button">Cart</button>
          </div>
        </div>
        <div class = 'sub-product'>
          <img src = 'images/square-medium/106020.jpg'>
          <a href= '#'> Girl with a Pearl Earring </a>
          <div class = 'inner-buttons'>
            <button class="sub-button">View</button>
            <button class="sub-button">Wish</button>
            <button class="sub-button">Cart</button>
          </div>
        </div>
    </div>
    <div id = 'footer'>
      <p id = 'copyright'> All images are copyright to their owners. This is just a hypothetical site &copy 2014 Copyright Art Store </p>
    </div>
  </div>


</body>
</html>
