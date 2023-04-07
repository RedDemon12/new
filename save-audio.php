<?php 

include('controllerUserData.php'); 

$postId = $_SESSION['postId'];

// Check if the audio file was uploaded successfully
if (isset($_FILES['audio']) && $_FILES['audio']['error'] === UPLOAD_ERR_OK) {

  // Get the name and temporary location of the uploaded file
  $fileName = $_FILES['audio']['name'];
  $tmpName = $_FILES['audio']['tmp_name'];

  // Save the audio to the "audioposts" folder
  move_uploaded_file($tmpName, 'audioposts/' . $fileName);

  $sql = "SELECT * FROM audio_post WHERE post_id = '{$postId}'";
  $result = mysqli_query($con, $sql);

  if (!$result) {
    die('Error: ' . mysqli_error($con));
  }

  $num_rows = mysqli_num_rows($result);
  if ($num_rows > 0) {

    $sql = "UPDATE audio_post SET audio = '{$fileName}' WHERE post_id = '{$postId}'";
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
  echo 'Error uploading audio';
}
?>
