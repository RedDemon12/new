<?php include('controllerUserData.php'); 
$username = $_GET['username'];

$query = mysqli_query($con, "SELECT id FROM users WHERE username = '" . mysqli_real_escape_string($con, $username) . "'");
$row = mysqli_fetch_array($query);
$clickedUserId = $row['id'];

echo $clickedUserId;





?>
