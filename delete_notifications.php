<?php include('controllerUserData.php'); ?>

<?php

$user_id = $_SESSION['id'];


        // Delete the notification from the database by its ID
        $sql = "DELETE FROM notifications WHERE notify_to = $user_id AND status = 'read'";
        $result = mysqli_query($con, $sql);

        // Check if the deletion was successful
        if($result) {
            echo "success";
        } else {
            echo "error";
        }
    
?>
