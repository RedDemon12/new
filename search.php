
<?php
 require_once "controllerUserData.php"; 

$searchQuery = $_GET['search'];

$id = $_SESSION['id'];

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// Search for users with matching usernames
$sql = "SELECT username, profile_pic_path, id FROM users WHERE username LIKE '%$searchQuery%' AND id != $id";
$result = $con->query($sql);

// Store the search results in an array
$searchResults = array();
if ($result->num_rows > 0 ) {
  while ($row = $result->fetch_assoc()) {
    $searchResults[] = array(
      'username' => $row['username'],
      'profile_pic_url' => $row['profile_pic_path'],
      'user_id' => $row['id']
    );
  }
}

// Return the search results as JSON
header('Content-Type: application/json');
echo json_encode($searchResults);

$con->close();
?>
