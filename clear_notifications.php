<?php include('controllerUserData.php'); ?>

<?php


$user_id = $_SESSION['id'];

// Update status of all notifications as "read"
$sql = "UPDATE notifications SET status = 'read' WHERE notify_to = $user_id";
$result = mysqli_query($con, $sql);

// Check if the update was successful
if ($result) {
    echo "success";
} else {
    echo "error";
}
?>