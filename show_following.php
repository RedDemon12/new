<?php
include('controllerUserData.php');

$user_Id = $_POST['user_id'];


$query = mysqli_query($con, "SELECT * FROM follow_system WHERE follow_by = '$user_Id'");
if(mysqli_num_rows($query) == 0) {
  echo "<div style='text-align: center; padding: 20px;'>No likes</div>";
} else {
  while ($row = mysqli_fetch_array($query)) {
    $userId = $row['follow_to'];
    $userQuery = mysqli_query($con, "SELECT * FROM users WHERE id = '$userId'");
    $userData = mysqli_fetch_array($userQuery);
    $profile_pic_path = $userData['profile_pic_path'];

    echo "<div class='like'>";
if ($profile_pic_path == null) {
  echo '<img style="margin-right: 20px; margin-bottom: 5px;" src="assets copy/img/avatars/user.png" alt="' . $userData['username'] . '\'s profile pic" class="w-px-40 h-auto rounded-circle">';
} else {
  echo '<img style="margin-right: 20px; margin-bottom: 5px;" src="http://localhost/temp/' . $userData['profile_pic_path'] . '" alt="' . $userData['username'] . '\'s profile pic" class="w-px-40 h-auto rounded-circle">';
}
echo "<strong><span style='color: black;' class='like-username'><a href='clickablepro.php?id=" . $userData['id'] . "'>" . $userData['username'] . "</a></span></strong>";
echo "</div>";
  }
}

?>
 