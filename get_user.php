<?php
// Establish a database connection using PDO
$db = new PDO('mysql:host=localhost;dbname=inhouse', 'root', '');

// Check for a search query and fetch matching users
if (isset($_GET['query'])) {
  $query = $_GET['query'];

  // Prepare a SQL statement to select users that match the query
  $stmt = $db->prepare('SELECT * FROM users WHERE username LIKE :query');
  $stmt->bindValue(':query', '%'.$query.'%');
  $stmt->execute();
  $matchingUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Return the matching users as a JSON response
  header('Content-Type: application/json');
  echo json_encode($matchingUsers);
}
?>
