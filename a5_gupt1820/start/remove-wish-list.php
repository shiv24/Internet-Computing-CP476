<?php
  session_start();

  if (isset($_GET['id'])) {
      $pid = $_GET['id'];
      foreach($_SESSION['wishlist'] as $subKey => $subArray){
           if($subArray[0] == $pid){
                unset($_SESSION['wishlist'][$subKey]);
           }
         }
  } else {
    session_destroy();
  }

  header('Location: view-wish-list.php');

?>
