<?php
include('controllerUserData.php');

$postId = $_GET['post_id'];

$query = mysqli_query($con, "SELECT * FROM image_post WHERE post_id = '$postId'");
$row = mysqli_fetch_array($query);
?>


  <form method="post" action="delupdate_post.php">
    <input type="hidden" name="post_id" value="<?php echo $postId; ?>">
    <p>Are you sure you want to permanently delete your Post?</p>
    <input type="submit" name="no" value="No" style="background-color: blue;margin-top: 20px; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">

    <input type="submit" name="yes" value="Yes" style="background-color: blue;margin-top: 20px; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">
  </form>


