<?php
include('controllerUserData.php');

$postId = $_GET['post_id'];

// Query the database to get the post with the specified post ID
$query = mysqli_query($con, "SELECT * FROM post WHERE post_id = '$postId'");
$row = mysqli_fetch_array($query); ?>

<form method="post" action="update_post.php">
  <input type="hidden" name="post_id" value="<?php echo $postId; ?>">
  <?php
  if ($row['type'] == 'image') {
    $query = mysqli_query($con, "SELECT * FROM image_post WHERE post_id = '$postId'");
    $row = mysqli_fetch_array($query);
    echo '<input type="text" class="form-control" name="post_content" value="' . $row['about'] . '">';
  } else if ($row['type'] == 'video') {
    $query = mysqli_query($con, "SELECT * FROM video_post WHERE post_id = '$postId'");
    $row = mysqli_fetch_array($query);
    echo '<input type="text" class="form-control" name="post_content" value="' . $row['about'] . '">';
  } else if ($row['type'] == 'audio') {
    $query = mysqli_query($con, "SELECT * FROM audio_post WHERE post_id = '$postId'");
    $row = mysqli_fetch_array($query);
    echo '<input type="text" class="form-control" name="post_content" value="' . $row['about'] . '">';
  }else if ($row['type'] == 'document') {
    $query = mysqli_query($con, "SELECT * FROM doc_post WHERE post_id = '$postId'");
    $row = mysqli_fetch_array($query);
    echo '<input type="text" class="form-control" name="post_content" value="' . $row['about'] . '">';
  }
  else if ($row['type'] == 'text') {
    $query = mysqli_query($con, "SELECT * FROM text_post WHERE post_id = '$postId'");
    $row = mysqli_fetch_array($query);
    echo '<input type="text" maxlength="1000" class="form-control" name="post_content" value="' . $row['text'] . '">';
  }
  ?>
  
  <input type="submit" value="Save" style="background-color: blue;margin-top: 20px; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">

</form>

