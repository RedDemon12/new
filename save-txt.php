<?php
include('controllerUserData.php');

$postId = $_SESSION['postId'];

if(isset($_POST['text'])) {
  $text = $_POST['text'];

  $sql = "SELECT * FROM text_post WHERE post_id = '{$postId}'";
  $result = mysqli_query($con, $sql);

  if (!$result) {
    die('Error: ' . mysqli_error($con));
  }

  $num_rows = mysqli_num_rows($result);
  if ($num_rows > 0) {
    $sql = "UPDATE text_post SET text = '{$text}' WHERE post_id = '{$postId}'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
      die('Error: ' . mysqli_error($con));
    }

    echo 'Post uploaded successfully';
  } else {
    // Post ID not found in database
    echo 'Error: Post ID not found';
  }
} else {
  echo 'Error uploading text';
}
?>
