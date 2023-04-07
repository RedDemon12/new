<?php include('controllerUserData.php'); ?>


<?php

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

// Get the total number of users
$result = $con->query("SELECT COUNT(*) as total FROM users");
$row = $result->fetch_assoc();
$total = $row['total'];

// Generate 10 random user IDs
$random_user_ids = array();
while(count($random_user_ids) < 10) {
    $random_user_id = rand(1, $total);
    if(!in_array($random_user_id, $random_user_ids)) {
        $random_user_ids[] = $random_user_id;
    }
}

// Retrieve data from your database for the random user IDs
$sql = "SELECT * FROM users WHERE id IN (".implode(",", $random_user_ids).")";
$result = $con->query($sql);

$data = array();

// Convert the data to a JSON-encoded string
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

echo json_encode($data);

$con->close();
?>


