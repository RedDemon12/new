<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<?php
include('controllerUserData.php');

$postId = $_POST['postId'];

// Fetch the comments data
$query = mysqli_query($con, "SELECT * FROM post_comments WHERE post_id = '$postId'");
$count = mysqli_num_rows($query);

if ($count > 0) {
    echo "<table>";
    while ($row = mysqli_fetch_array($query)) {
        $userId = $row['user_id'];
        $userQuery = mysqli_query($con, "SELECT * FROM users WHERE id = '$userId'");
        $userData = mysqli_fetch_array($userQuery);

        // Display the user data in the table
        echo "<tr>";
        echo "<td style='width:3%;'><img src='{$userData['profile_pic_path']}' alt='{$userData['username']}' class='like-image' width='40' height='40'></td>";
        echo "<td style='width:20%;'><b><span class='like-username'>{$userData['username']}</span></b></td>";
        echo "<td style='width:25%;'><b><span class='like-username'>{$row['data']}</span></b></td>";
        echo "<td><span class='like-username'>{$row['time']}</span></td>";
        echo "<td><span ";
        if($row['user_id'] == $postId || $row['user_id'] == $_SESSION['id']) {
            echo "style='display: inline-block;'";
        } else {
            echo "style='display: none;'";
        }
        echo "><button class='clear-comment-btn' data-commentid='{$row['post_comments_id']}'><i class='fa fa-trash'></i></button></span></td>";

        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<div style='text-align: center;'><b>No Comments</b></div>";
}


if(isset($_POST['commentId'])) {
    $commentId = $_POST['commentId'];
    
    // Delete the comment from the database
    $deleteQuery = mysqli_query($con, "DELETE FROM post_comments WHERE post_comments_id = '$commentId'");
    if($deleteQuery) {
        echo "Comment deleted successfully";
    } else {
        echo "Error deleting comment";
    }
}



?>

