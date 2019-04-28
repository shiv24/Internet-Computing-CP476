<?php


  session_start();

   if( isset( $_SESSION['wishlist'] ) ) {
     $wPaintId = $_GET['id'];
     $wImageName = $_GET['ImageFileName'];
     $wTitle = $_GET['Title'];
     array_push($_SESSION['wishlist'],array($wPaintId, $wImageName, $wTitle));

   }else {

     if (isset($_GET['id']) and isset($_GET['ImageFileName']) and isset($_GET['Title'])) {
       $wPaintId = $_GET['id'];
       $wImageName = $_GET['ImageFileName'];
       $wTitle = $_GET['Title'];
       $_SESSION['wishlist'] =  array(
         array($wPaintId, $wImageName, $wTitle)
       );
     }
   }

   $_SESSION['wishlist'] = array_map("unserialize", array_unique(array_map("serialize", $_SESSION['wishlist'])));
   $size = sizeof($_SESSION['wishlist']);
   echo($size);

   header('Location: view-wish-list.php');






 ?>
