<?php include('controllerUserData.php'); ?>

<?php

$location = $_POST["location"];
$fontSize = $_POST['fontSize'];
$caption = $_POST["caption"];
$userId = $_POST["userId"];

$sql = "INSERT INTO post (address, user_id, time, font_size,type) VALUES ('$location', '$userId', NOW(), '$fontSize','audio')";
$result = mysqli_query($con, $sql);
$postId = mysqli_insert_id($con);

$_SESSION['postId'] = $postId;
header("Location: save-audio.php");

$sql = "INSERT INTO audio_post (post_id, about) VALUES ('$postId', '$caption' )";
$result = mysqli_query($con, $sql);

if ($result) {
  echo "Post inserted successfully!";
} else {
  echo "Error inserting post: " . mysqli_error($con);
}

mysqli_close($con);

?>



