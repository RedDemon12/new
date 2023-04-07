<?php include('controllerUserData.php'); 


$userId = $_SESSION['id'];
$user_id = $_POST['username'];

$message = $_POST['message'];

$username_query = mysqli_query($con, "SELECT username FROM users WHERE id = '$userId'");
$username_row = mysqli_fetch_array($username_query);
$username = $username_row['username'];

$notification_text = 'messaged you!! <a href="clickablemessage.php?username=' . $username_row['username'] . '">Click here to view the message</a>';

$sql = "INSERT INTO notifications (notify_by,notify_to, message, time,status,type) VALUES ('$userId','$user_id', '$notification_text', NOW(), 'unread','message')";
$result = mysqli_query($con, $sql);



$con->close();

$response = array("status" => "success");
echo json_encode($response);
?>


