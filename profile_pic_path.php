<?php 
 include('controllerUserData.php');

// assuming you have a database connection
$email = $_SESSION['email']; // replace with actual user ID
$profile_pic_path = $target_file; // the path where the file was uploaded

$sql = "UPDATE users SET profile_pic_path = '$profile_pic_path' WHERE email = $email";
$result = mysqli_query($con, $sql);
if ($result) {
  echo "File path stored in database.";
} else {
  echo "Error storing file path in database.";
}

?>