<?php 

include('controllerUserData.php'); 

$postId = $_SESSION['postId'];

// Check if the video file was uploaded successfully
if (isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {

  // Get the name and temporary location of the uploaded file
  $fileName = $_FILES['video']['name'];
  $tmpName = $_FILES['video']['tmp_name'];

  // Save the video to the "videoposts" folder
  move_uploaded_file($tmpName, 'videoposts/' . $fileName);

  $sql = "SELECT * FROM video_post WHERE post_id = '{$postId}'";
  $result = mysqli_query($con, $sql);

  if (!$result) {
    die('Error: ' . mysqli_error($con));
  }

  $num_rows = mysqli_num_rows($result);
  if ($num_rows > 0) {

    $sql = "UPDATE video_post SET video = '{$fileName}' WHERE post_id = '{$postId}'";
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
  echo 'Error uploading video';
}
?>