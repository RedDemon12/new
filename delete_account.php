<?php include('controllerUserData.php'); ?>

<?php

if(isset($_POST['password'])) {
    $password = $_POST['password'];
    $user_id = $_SESSION['id'];

    // Get the hashed password from the database
    $sql = "SELECT password FROM users WHERE id = $user_id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['password'];

    // Verify the password
    if(password_verify($password, $hashed_password)) {
        // Delete the user from the database
        $sql = "DELETE FROM users WHERE id = $user_id";
        $result = mysqli_query($con, $sql);

        // Check if the deletion was successful
        if($result) {
            // Log the user out and redirect to the homepage
            session_destroy();
            header('Location: signup-user.php');
            exit();
        } else {
            // Display an error message
            echo "Error deleting account";
        }
    } else {
        // Display an error message
        echo "Incorrect password";
    }
}
?>
