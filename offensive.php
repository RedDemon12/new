<?php
include('controllerUserData.php');
if(isset($_POST['yes'])) {
  


  $postId = $_POST['post_id'];
  $userId = $_POST['user_id'];

  $postQuery = "DELETE FROM post WHERE post_id = ? ";
  $postStmt = $con->prepare($postQuery);
  $postStmt->bind_param("i", $postId);
  $postStmt->execute();

  
  $notification_text = "We reviewed and deleted your post. Regards ADMIN";

  mysqli_query($con, "INSERT INTO notifications (notify_to, message, time,status,type,post_id) VALUES ('$userId', '$notification_text', NOW(), 'unread','report',$postId)");

  $con->close();
  header("Location: adminhome.php");
}

else{
    $postId = $_POST['post_id'];

    $postQuerys = "UPDATE post SET report = 'no' WHERE post_id = ?";
    $postStmt = $con->prepare($postQuerys);
    $postStmt->bind_param("i", $postId);
    $postStmt->execute();
    $con->close();
  header("Location: adminhome.php");

}
  
  ?>