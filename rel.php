<?php
// Check if the form has been submitted
if(isset($_POST['submit'])) {
    // Get the file details
    $fileName = $_FILES['profile-image']['name'];
    $fileTmpName = $_FILES['profile-image']['tmp_name'];
    $fileSize = $_FILES['profile-image']['size'];
    $fileError = $_FILES['profile-image']['error'];
    $fileType = $_FILES['profile-image']['type'];
    
    // Get the file extension
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    // Specify the allowed file types
    $allowed = array('jpg', 'jpeg', 'png');
    
    // Check if the file type is allowed
    if(in_array($fileActualExt, $allowed)) {
        // Check if there was an error uploading the file
        if($fileError === 0) {
            // Check if the file size is within the limit
            if($fileSize < 5000000) {
                // Generate a unique file name
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                // Set the file upload path
                $fileDestination = 'imageposts/' . $fileNameNew;
                // Move the uploaded file to the destination folder
                move_uploaded_file($fileTmpName, $fileDestination);
                // Return a success message
                alert( "Image uploaded successfully!");
            } else {
                // Return an error message if the file size is too large
                echo "File size exceeds the limit!";
            }
        } else {
            // Return an error message if there was an error uploading the file
            echo "There was an error uploading the file!";
        }
    } else {
        // Return an error message if the file type is not allowed
        echo "Invalid file type!";
    }
}
?>
