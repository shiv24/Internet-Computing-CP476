
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/reset.css" rel="stylesheet">
 </head>
 <body>

 <div id = 'main-page'>
     <?php
      include 'include/art-header.php'
     ?>

     <div class = "display-wish-list">
      <h3>Wish List Items </h3>

        <?php
        if (isset($_SESSION['wishlist'])) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Image</th>";
        echo "<th>Title</th>";
        echo "<th>Action</th>";
        echo "</tr>";
          foreach ($_SESSION['wishlist'] as $wish) {
            $pid = $wish[0];
            $imageName = $wish[1];
            $title = $wish[2];
            if (strlen($title) > 0) {
              echo "<tr>";
                echo "<td><img src='images/square-medium/$imageName.jpg'></td>";
                echo "<td><a href='single-painting.php?id=$pid'>$title</a></td>";
                echo "<td><a class='removeLinkStyle' href='remove-wish-list.php?id=$pid'>Remove</a></td>";
              echo "</tr>";
            }
          }
        echo "</table>";
        echo "<br>";
        echo "<td><a class = 'removeLinkStyle' href='remove-wish-list.php'>Remove All Items from Wish list</a></td>";

      }
        ?>


     </div>
   </div>


 </body>
 </html>
