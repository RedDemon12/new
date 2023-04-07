<?php
$target_dir = "uploads/";

if (!is_dir($target_dir) || !is_writable($target_dir)) {
    if (!mkdir($target_dir, 0777, true)) {
        die('Failed to create directory ' . $target_dir);
    }
}

$target_file = $target_dir . uniqid() . ".png";


// resize and crop the image to a square shape
list($width, $height, $type, $attr) = getimagesize($_FILES["profile_pic"]["tmp_name"]);
$size = min($width, $height);
$image = imagecreatefromstring(file_get_contents($_FILES["profile_pic"]["tmp_name"]));
$cropped = imagecrop($image, ['x' => ($width - $size) / 2, 'y' => ($height - $size) / 2, 'width' => $size, 'height' => $size]);
$resized = imagescale($cropped, 200);

// save the image as a PNG file
imagepng($resized, $target_file);

?>