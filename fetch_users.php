<?php include('controllerUserData.php'); ?>


<?php

$logged_in_user = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email != '$logged_in_user' ORDER BY RAND() LIMIT 4";
$result = mysqli_query($con, $query);

// Display the users in the table format
echo '<table>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>';
if ($row['profile_pic_path'] == null) {
    // If profile_pic_path is null, display a default image with its src and alt attributes set to the user's username
    echo '<img src="assets copy/img/avatars/user.png" alt="' . $row['username'] . '\'s profile pic">';
} else {
    // If profile_pic_path is not null, display the user's profile pic with its src and alt attributes set to the user's username
    echo '<img src="http://localhost/temp/img/avatars/' . $row['profile_pic_path'] . '" alt="ProfilePic">';
}
echo '</td>';

    echo '<td><b>' . $row['username'] . '</b></td>';
    echo '<td>';
if ($row['following'] == 1) {
    echo '<button class="follow-btn following" data-username="' . $row['username'] . '" onclick="toggleFollow(this)">Following</button>';
} else {
    echo '<button class="follow-btn" data-username="' . $row['username'] . '" onclick="toggleFollow(this)">Follow</button>';
}
echo '</td>';
    echo '</tr>';
}
echo '</table>';
?>
