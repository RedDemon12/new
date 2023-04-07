<?php 

include('controllerUserData.php'); 

$postId = $_SESSION['postId'];

// Check if the image file was uploaded successfully
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
  // Get the filter value from the POST data
  $filterValue = isset($_POST['filter']) ? $_POST['filter'] : '';

  // Get the name and temporary location of the uploaded file
  $fileName = $_FILES['image']['name'];
  $tmpName = $_FILES['image']['tmp_name'];

  // Create a new image from the uploaded file
  $image = imagecreatefromstring(file_get_contents($tmpName));

  // Apply the selected filter to the image
  if ($filterValue === 'grayscale(100%)') {
    imagefilter($image, IMG_FILTER_GRAYSCALE);
  } elseif ($filterValue === 'brightness(50%)') {
    imagefilter($image, IMG_FILTER_BRIGHTNESS, -50);
  } elseif ($filterValue === 'contrast(200%)') {
    imagefilter($image, IMG_FILTER_CONTRAST, 200);
  } elseif ($filterValue === 'sepia(100%)') {
    imagefilter($image, IMG_FILTER_GRAYSCALE);
    imagefilter($image, IMG_FILTER_COLORIZE, 100, 50, 0);
  } elseif ($filterValue === 'invert(100%)') {
    imagefilter($image, IMG_FILTER_NEGATE);
  }

  // Save the filtered image to the "imageposts" folder
  imagejpeg($image, 'imageposts/' . $fileName);

  // Clean up the image resources
  imagedestroy($image);



  $sql = "UPDATE image_post SET image = '{$fileName}' WHERE post_id = '{$postId}'";
  $result = mysqli_query($con, $sql);

  if (!$result) {
    die('Error: ' . mysqli_error($con));
  }

  echo 'Post uploaded successfully';
} else {
  echo 'Error uploading image';
}
?>
