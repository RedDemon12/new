<?php
include('controllerUserData.php');

$username = $_POST['username'];

$sql = "DELETE FROM taggings WHERE taggings = '$username'";
$result = mysqli_query($con, $sql);

if ($result) {
  $response = array('success' => true, 'message' => 'Tag deleted successfully.');
} else {
  $response = array('success' => false, 'message' => 'Error deleting tag.');
}


echo json_encode($response);
// Close database connection
mysqli_close($con);
?>
