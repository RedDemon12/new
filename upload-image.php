<?php
// Set the upload directory path
$uploadDir = "imageposts/";

// Get the uploaded file info
$fileName = $_FILES["image"]["name"];
$fileTmpName = $_FILES["image"]["tmp_name"];
$fileType = $_FILES["image"]["type"];
$fileSize = $_FILES["image"]["size"];

// Set the target file path
$targetFilePath = $uploadDir . basename($fileName);

// Check if the file is an image and has a valid size
$validImageTypes = array("jpg", "jpeg", "png");
$fileExt = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
if (in_array($fileExt, $validImageTypes) && $fileSize < 5000000) {
  // Move the uploaded file to the target directory
  if (move_uploaded_file($fileTmpName, $targetFilePath)) {
    // Return the image file URL
    echo $targetFilePath;
  } else {
    // Return an error message
    echo "Failed to upload image";
  }
} else {
  // Return an error message
  echo "Invalid file type or size";
}
?>
