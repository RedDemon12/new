<?php
if(isset($_POST['yes'])) {
  include('controllerUserData.php');


  $postId = $_POST['post_id'];

  $imageQuery = "SELECT image FROM image_post WHERE post_id = ?";
  $imageStmt = $con->prepare($imageQuery);
  $imageStmt->bind_param("i", $postId);
  $imageStmt->execute();
  $imageResult = $imageStmt->get_result();

  if ($imageResult->num_rows > 0) {
    $imageRow = $imageResult->fetch_assoc();
    $filename = $imageRow['image'];
    unlink("imageposts/$filename"); 
    $imageQuery = "DELETE FROM image_post WHERE post_id = ?";
    $imageStmt = $con->prepare($imageQuery);
    $imageStmt->bind_param("i", $postId);
    $imageStmt->execute();
  }

  $postQuery = "DELETE FROM post WHERE post_id = ?";
  $postStmt = $con->prepare($postQuery);
  $postStmt->bind_param("i", $postId);
  $postStmt->execute();

  $con->close();
  header("Location: home.php");

}
else{
    header("Location: home.php");

}
?>