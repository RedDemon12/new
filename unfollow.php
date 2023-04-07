<?php include('controllerUserData.php'); ?>


<?php

require 'dump.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $follow_by = $_SESSION['id'];
    $follow_to = $_POST['username'];
  
    // Delete row from follow_system table
    $sql = "DELETE FROM follow_system WHERE follow_by = '$follow_by' AND follow_to_u = '$follow_to'";
    $result = mysqli_query($con, $sql);
  
    if ($result) {
      echo 'success';
    } else {
      echo 'error';
    }
  }
?>

