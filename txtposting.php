<?php include('controllerUserData.php'); ?>

<?php


$userId = $_POST["userId"];

$sql = "INSERT INTO post (address, user_id, time, font_size,type) VALUES ('', '$userId', NOW(), '','text')";
$result = mysqli_query($con, $sql);
$postId = mysqli_insert_id($con);

$_SESSION['postId'] = $postId;
header("Location: save-txt.php");

$sql = "INSERT INTO text_post (post_id) VALUES ('$postId')";
$result = mysqli_query($con, $sql);

if ($result) {
  echo "Post inserted successfully!";
} else {
  echo "Error inserting post: " . mysqli_error($con);
}

mysqli_close($con);

?>



