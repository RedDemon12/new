<?php
include('controllerUserData.php');

$postId = mysqli_real_escape_string($con, $_POST['post_id']);
$commentText = mysqli_real_escape_string($con, $_POST['comment_text']);
$userId = mysqli_real_escape_string($con, $_SESSION['id']);

$insertQuery = "INSERT INTO post_comments (post_id, data, user_id,type,time) VALUES ('$postId', '$commentText', '$userId','text',NOW())";
if (mysqli_query($con, $insertQuery)) {
  $usernameQuery = mysqli_query($con, "SELECT username FROM users WHERE id = '$userId'");
  $usernameRow = mysqli_fetch_array($usernameQuery);
  $username = $usernameRow['username'];

  $query1 = mysqli_query($con, "SELECT user_id FROM post WHERE post_id = '$postId'");
  $rows = mysqli_fetch_array($query1);
  $likid = $rows['user_id'];
  $notification_text = "commented on your post";

if($likid != $userId){
  mysqli_query($con, "INSERT INTO notifications (notify_by,notify_to, message, time,status,type,post_id) VALUES ('$userId','$likid', '$notification_text', NOW(), 'unread','comment','$postId')");
}


  die(json_encode(array('success' => true, 'username' => $username, 'commentText' => $commentText)));
} else {
  die(json_encode(array('success' => false)));
}

?>