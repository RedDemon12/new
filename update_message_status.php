<?php 
include('controllerUserData.php'); 

if(isset($_POST['mssg_by']) && isset($_POST['mssg_to'])) {
    $mssg_by = $_POST['mssg_by'];
    $mssg_to = $_POST['mssg_to'];

    $update_query = "UPDATE message SET status = 'read' WHERE mssg_by = '$mssg_by' AND mssg_to = '$mssg_to'";
    mysqli_query($con, $update_query);
}
?>