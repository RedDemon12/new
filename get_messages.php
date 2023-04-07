<?php
include('controllerUserData.php');

$from = $_GET['from'];
$to = $_GET['to'];

$stmt = $db->prepare('SELECT message FROM message WHERE mssg_by = ? AND mssg_to = ?');
$stmt->bind_param('ii', $from, $to);
$stmt->execute();
$result = $stmt->get_result();
$messages = array();
while ($row = $result->fetch_assoc()) {
  $messages[] = $row;
}
$stmt->close();

// Check if any messages were found
if (count($messages) > 0) {
  // Return the messages as JSON
  header('Content-Type: application/json');
  echo json_encode($messages);
} else {
  // Return a "No conversation" message as JSON
  header('Content-Type: application/json');
  echo json_encode(array('message' => 'No conversation'));
}
?>
