<?php include('controllerUserData.php'); ?>

<?php

$tags = json_decode(file_get_contents('php://input'), true)['tags'];

// Insert the tags into the database
$sessionId = $_SESSION['id'];
$query = "DELETE FROM tags WHERE user_id='$sessionId'";
mysqli_query($con, $query);
foreach ($tags as $tag) {
  $name = mysqli_real_escape_string($con, $tag);
  $query = "INSERT INTO tags (user_id, tags) VALUES ('$sessionId', '$name')";
  mysqli_query($con, $query);
}

mysqli_close($con);

?>