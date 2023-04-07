<?php 

include('controllerUserData.php'); 
$data = json_decode(file_get_contents('php://input'), true);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $post_id = $data['post_id'];
  $user_id = $data['user_id'];
  $sql = "INSERT INTO bookmarks (post_id, user_id,bookmark_time) VALUES ('$post_id', '$user_id',NOW())";

  if ($con->query($sql) === TRUE) {
    echo "Bookmark added successfully";
  } else {
    echo "Error adding bookmark: " . $con->error;
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    
$post_id = $data['post_id'];
$user_id = $data['user_id'];
  $sql = "DELETE FROM bookmarks WHERE post_id=$post_id AND user_id=$user_id";
  if ($con->query($sql) === TRUE) {
    echo "Bookmark removed successfully";
  } else {
    echo "Error removing bookmark: " . $con->error;
  }
}

$con->close();
?>