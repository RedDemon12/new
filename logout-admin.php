
<?php
session_start();


require "connection.php";





if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
    exit();
}

$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: admin.php");
exit();
?>
