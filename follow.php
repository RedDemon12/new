<?php include('controllerUserData.php'); ?>


<?php

require 'dump.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $follow_by = $_SESSION['id'];
  $follow_by_username = $_SESSION['username'];
  $follow_to_id = $_POST['userid'];
  $follow_to = $_POST['username'];
  
  // Insert new row in follow_system table
  $sql = "INSERT INTO follow_system (follow_by, follow_by_u, follow_to, follow_to_u, time) VALUES ('$follow_by', '$follow_by_username', '$follow_to_id', '$follow_to', NOW())";
  $result = mysqli_query($con, $sql);



  $notification_text = "started following you";
  $sql2 = "INSERT INTO notifications (notify_by,notify_to, message, time,status,type) VALUES ('$follow_by','$follow_to_id', '$notification_text', NOW(), 'unread','follow')";
  $result2 = mysqli_query($con, $sql2);
  
  if ($result && $result2) {
    echo 'success';
  } else {
    echo 'error';
  }
}
  

?>
