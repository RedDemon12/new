<?php
include('controllerUserData.php');

$postId = mysqli_real_escape_string($con, $_POST['post_id']);
$userId = $_SESSION['id'];
$isLiked = $_POST['is_liked'];

if ($isLiked == '1') {
    mysqli_query($con, "DELETE FROM post_likes WHERE post_id = '$postId' AND post_like_by = '$userId'");
} else {
  mysqli_query($con, "INSERT INTO post_likes (post_id, post_like_by,time) VALUES ('$postId', '$userId',NOW())");
}

// Return the updated like count
$query = mysqli_query($con, "SELECT COUNT(*) as likes FROM post_likes WHERE post_id = '$postId'");
$row = mysqli_fetch_array($query);
$response = array('likesCount' => $row['likes']); // <- Change this line
error_log(print_r($response, true));
echo json_encode($response);


?>
