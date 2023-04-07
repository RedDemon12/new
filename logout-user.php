
<?php
session_start();


// Save the session end time to the database
require "connection.php";


date_default_timezone_set('Asia/Kolkata');// change according timezone
$session_end_time = date('Y-m-d H:i:s');



if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
    exit();
}

$user_id = $_SESSION['id'];

$query = "UPDATE login SET logout = ? WHERE user_id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("si", $session_end_time, $user_id);
$stmt->execute();
$stmt->close();

$con->close();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: login-user.php");
exit();
?>
