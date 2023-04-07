<?php 
include('controllerUserData.php');

if(isset($_POST['user_id']) && isset($_POST['post_id'])) {
  $user_id = $_POST['user_id'];
  $post_id = $_POST['post_id'];

  $update_query = "UPDATE post SET report='inprocess' WHERE post_id=$post_id";
  $result = mysqli_query($con, $update_query);


  if($result) {
    echo json_encode(array('success' => true));
  } else {
    echo json_encode(array('success' => false, 'error' => mysqli_error($con)));
  }
}
?>
