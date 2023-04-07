<?php include('controllerUserData.php'); ?>

<head> 
    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<?php

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$user_id = $_SESSION['id'];
// Fetch images from database
$sql = "SELECT post_id, image, about FROM image_post";
$result = mysqli_query($con, $sql);

// Display images in a 3-column grid
echo "<div class='image-grid'>";

$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
    if ($i % 3 == 0) {
        // Add extra spacing to first row
        if ($i == 0) {
            echo "<div class='row' style='margin-bottom: 30px;'>";
        } else {
            echo "<div class='row' style='margin-bottom: 30px;'>";
        }
    }
    echo "<div class='col'>";
    echo "<a href='post.php?id=" . $row["post_id"] . "&user_id=" . $user_id . "'>";
    echo "<img src='imageposts/" . $row["image"] . "' alt='" . $row["about"] . "' style='width: 200px; height: 200px;'>";
    echo "</a>";
    echo "</div>";
    if (($i + 1) % 3 == 0) {
        echo "</div>";
    }
    $i++;
}

// Close the last row
if ($i % 3 != 0) {
    echo "</div>";
}

echo "</div>";

// Close database connection
mysqli_close($con);

?>





