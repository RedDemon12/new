<?php include('controllerUserData.php'); ?>

<?php
// Check if the connection was successful
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Query the database to get the user data
$sql = "SELECT * FROM users ORDER BY RAND() LIMIT 10"; // Change "users" to your table name

$result = $con->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    $users = array();
    // Loop through each row and add it to the $users array
    while($row = $result->fetch_assoc()) {
        if ($row['profile_pic_path'] == null) {
            // If profile_pic_path is null, set $profile_pic to the default image path
            $profile_pic = 'assets copy/img/avatars/user.png';
        } else {
            // If profile_pic_path is not null, set $profile_pic to the user's profile pic path
            $profile_pic = 'http://localhost/temp/' . $row['profile_pic_path'];
        }
        
        $following = $row['following'];
        $followButton = '';
        if ($following == 0) {
            $followButton = '<button class="follow-btn">Follow</button>';
        } else {
            $followButton = '<button class="following-btn">Following</button>';
        }

        $user = array(
            'first_name' => $row['firstname'],
            'last_name' => $row['surname'],
            'user_name' => $row['username'],
            'profile_picture' => $profile_pic, // Change "profile_picture" to your column name
            'following' => $following,
            'follow_button' => $followButton
        );
        array_push($users, $user);
    }
} else {
    // If there are no rows, set $profile_pic to the default image path and create a dummy user
    $profile_pic = 'assets copy/img/avatars/user.png';
    $user = array(
        'first_name' => 'John',
        'last_name' => 'Doe',
        'user_name' => 'john_doe',
        'profile_picture' => $profile_pic,
        'following' => 1,
        'follow_button' => '<button class="follow-btn">Follow</button>'
    );
    $users = array($user);
}

// Encode the $users array as a JSON object and return it
echo json_encode($users);

// Close the database connection
$con->close();



?>
