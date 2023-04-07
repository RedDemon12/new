<?php
include('controllerUserData.php');

$postId = $_POST['post_id'];
$postContent = $_POST['post_content'];


// Query the database to get the post with the specified post ID
$query = mysqli_query($con, "SELECT * FROM post WHERE post_id = '$postId'");
$row = mysqli_fetch_array($query);


if ($row['type'] == 'image') {
mysqli_query($con, "UPDATE image_post SET about = '$postContent' WHERE post_id = '$postId'"); }

else if ($row['type'] == 'video') {
    mysqli_query($con, "UPDATE video_post SET about = '$postContent' WHERE post_id = '$postId'"); }

    else if ($row['type'] == 'audio') {
        mysqli_query($con, "UPDATE audio_post SET about = '$postContent' WHERE post_id = '$postId'"); }

    else if ($row['type'] == 'document') {
        mysqli_query($con, "UPDATE doc_post SET about = '$postContent' WHERE post_id = '$postId'"); }

        else if ($row['type'] == 'text') {
            mysqli_query($con, "UPDATE text_post SET text = '$postContent (edited)' WHERE post_id = '$postId'"); }

header("Location: home.php");
?>