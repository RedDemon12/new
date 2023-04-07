<?php include('controllerUserData.php'); ?>

<?php


$location = $_POST["location"];
$fontSize = $_POST['fontSize'];
$caption = $_POST["caption"];
$userId = $_POST["userId"];

$sql = "INSERT INTO post (address, user_id, time, font_size,type) VALUES ('$location', '$userId', NOW(), '$fontSize','image')";
$result = mysqli_query($con, $sql);
$postId = mysqli_insert_id($con);

$_SESSION['postId'] = $postId;
header("Location: save.php");

$filter = isset($_POST["filter"]) ? $_POST["filter"] : "";


$sql = "INSERT INTO image_post (post_id, filter, about) VALUES ('$postId', '$filter', '$caption' )";
$result = mysqli_query($con, $sql);

if ($result) {
  echo "Post inserted successfully!";
} else {
  echo "Error inserting post: " . mysqli_error($con);
}

mysqli_close($con);

?>



