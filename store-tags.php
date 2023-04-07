<?php
include('controllerUserData.php');

$tags = $_POST['tags'];
$postId = $_SESSION['postId'];
$next_post_id = $postId + 1;

$user_id = $_SESSION['id'];

// Loop through tags and insert into database
foreach ($tags as $tag) {
  $userId = $tag['userId'];
  $username = $tag['username'];
  $sql = "INSERT INTO taggings (taggings_id, taggings, taggings_time, post_id) VALUES ('$userId', '$username', NOW(), '$next_post_id')";
  $result = mysqli_query($con, $sql);

  $notification_text = "Tagged you in a post";
  mysqli_query($con, "INSERT INTO notifications (notify_by,notify_to, message, time,status,type,post_id) VALUES ('$user_id','$userId', '$notification_text', NOW(), 'unread','tag','$next_post_id')");

}

if ($result) {
  $response = array('success' => true, 'message' => 'Tags stored successfully.');
} else {
  $response = array('success' => false, 'message' => 'Error storing tags.');
}

// Return JSON response to client
header('Content-Type: application/json');
echo json_encode($response);

// Close database connection
mysqli_close($con);
?>
