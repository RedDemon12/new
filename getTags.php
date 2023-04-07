<?php include('controllerUserData.php'); ?>

<?php

$tags = json_decode(file_get_contents('php://input'), true)['tags'];

$sessionId = $_SESSION['id'];
$query = "DELETE FROM tags WHERE user_id='$sessionId'";
mysqli_query($con, $query);
foreach ($tags as $tag) {
    $name = mysqli_real_escape_string($con, $tag);
    $query = "DELETE FROM tags (user_id, tags) VALUES ('$sessionId', '$name')";
    mysqli_query($con, $query);
  }
  
  mysqli_close($con);


?>