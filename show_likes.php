<?php
include('controllerUserData.php');

$postId = $_POST['postId'];


$query = mysqli_query($con, "SELECT * FROM post_likes WHERE post_id = '$postId'");
if(mysqli_num_rows($query) == 0) {
  echo "<div style='text-align: center; padding: 20px;'>No likes</div>";
} else {
  while ($row = mysqli_fetch_array($query)) {
    $userId = $row['post_like_by'];
    $userQuery = mysqli_query($con, "SELECT * FROM users WHERE id = '$userId'");
    $userData = mysqli_fetch_array($userQuery);
    $profile_pic_path = $userData['profile_pic_path'];

    echo "<div class='like'>";
if ($profile_pic_path == null) {
  echo '<img style="margin-right: 20px; margin-bottom: 5px;" src="assets copy/img/avatars/user.png" alt="' . $userData['username'] . '\'s profile pic" class="w-px-40 h-auto rounded-circle">';
} else {
  echo '<img style="margin-right: 20px; margin-bottom: 5px;" src="http://localhost/temp/' . $userData['profile_pic_path'] . '" alt="' . $userData['username'] . '\'s profile pic" class="w-px-40 h-auto rounded-circle">';
}
echo "<strong><span style='color: black;' class='like-username'>" . $userData['username'] . "</strong></span>";
echo "</div>";
  }
}

?>
 