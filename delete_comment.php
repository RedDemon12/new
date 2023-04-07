<?php

if(isset($_POST['commentId'])) {
    $commentId = $_POST['commentId'];
    
    $deleteQuery = mysqli_query($con, "DELETE FROM post_comments WHERE post_comments_id = '$commentId'");
    if($deleteQuery) {
        echo "Comment deleted successfully";
    } else {
        echo "Error deleting comment";
    }
}
?>
