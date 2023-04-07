<?php
include('controllerUserData.php');

if (isset($_POST['yes'])) {
  $user_id = $_POST['user_id'];

  // delete messages with mssg_to = $user_id and mssg_by = $_SESSION['id']
  $sql = "DELETE FROM message WHERE mssg_to = ? AND mssg_by = ?";
  $stmt = $con->prepare($sql);
  $stmt->bind_param("ii", $user_id, $_SESSION['id']);
  $stmt->execute();
  $stmt->close();

  header("Location: chat.php");
} else {
  header("Location: chat.php");
}

$con->close();
?>

