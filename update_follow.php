<?php include('controllerUserData.php'); ?>

<?php
$username = $_POST['username'];
$following = $_POST['following'];

// Prepare the SQL query
$stmt = mysqli_prepare($con, "UPDATE users SET following = ? WHERE username = ?");
mysqli_stmt_bind_param($stmt, 'is', $following, $username);

// Execute the query and check for errors
if (mysqli_stmt_execute($stmt)) {
  // Return a success response to the client
  http_response_code(200);
  echo json_encode(array('success' => true));
} else {
  // Return an error response to the client
  http_response_code(500);
  echo json_encode(array('success' => false, 'error' => mysqli_error($con)));
}

// Close the prepared statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
