<?php
include('controllerUserData.php');

$postId = $_SESSION['postId'];

// Check if the document file was uploaded successfully
if (isset($_FILES['document']) && $_FILES['document']['error'] === UPLOAD_ERR_OK) {
  // Get the name and temporary location of the uploaded file
  $fileName = $_FILES['document']['name'];
  $tmpName = $_FILES['document']['tmp_name'];

  // Save the document to the "documentposts" folder
  move_uploaded_file($tmpName, 'docposts/' . $fileName);

  $sql = "SELECT * FROM doc_post WHERE post_id = '{$postId}'";
  $result = mysqli_query($con, $sql);

  if (!$result) {
    die('Error: ' . mysqli_error($con));
  }

  $num_rows = mysqli_num_rows($result);
  if ($num_rows > 0) {
    $sql = "UPDATE doc_post SET doc = '{$fileName}' WHERE post_id = '{$postId}'";
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
  echo 'Error uploading document';
}
?>
