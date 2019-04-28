<?php
  include 'include/config.php';
  $conn = new mysqli($dbServer,$user, $pass, $db) or die("Unable to connect");
  $sql = "SELECT * FROM Artists;";
  $result = mysqli_query($conn,$sql);
  $resultCheck = mysqli_num_rows($result);

  $data = array();
  if ($resultCheck > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      // $data["lastName"] =  utf8_encode($row['LastName']);

    if(!isset($data["lastName"])) {
        $data["lastName"] = array();
    } else {
    array_push($data["lastName"], utf8_encode($row['LastName']));
  }
      // echo "<option val = '$var'>$var</option>";
    }
  }

  $sql = "SELECT * FROM Galleries;";
  $result = mysqli_query($conn,$sql);


  $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0){
      while ($row = mysqli_fetch_assoc($result)) {
        if(!isset($data["museums"])) {
            $data["museums"] = array();
        } else {
        array_push($data["museums"], utf8_encode($row['GalleryName']));
        }
      }
    }


    $sql = "SELECT * FROM Shapes;";
    $result = mysqli_query($conn,$sql);


    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0){
      while ($row = mysqli_fetch_assoc($result)) {
        if(!isset($data["shapes"])) {
            $data["shapes"] = array();
        } else {
        array_push($data["shapes"], utf8_encode($row['ShapeName']));
      }
      }
    }


  echo json_encode($data);

?>
