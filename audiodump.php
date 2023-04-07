<?php include('controllerUserData.php'); ?>

<head> 
    
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<?php

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch videos from database
$user_id = $_SESSION['id'];

// Fetch videos from database
$sql = "SELECT post_id, audio, about FROM audio_post";
$result = mysqli_query($con, $sql);

// Check if there are any videos
if (mysqli_num_rows($result) > 0) {

    // Display videos in a 3-column grid
    echo "<div class='video-grid'>";

    $i = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        if ($i % 3 == 0) {
            // Add extra spacing to first row
            if ($i == 0) {
                echo "<div class='row' style='margin-bottom: 30px;'>";
            } else {
                echo "<div class='row'>";
            }
        }
        echo "<div class='col'>";
        echo "<a href='post.php?id=" . $row["post_id"] . "&user_id=" . $user_id . "'>";
        echo "<audio controls src='audioposts/" . $row["audio"] . "' style='width: 200px; height: 200px;'>";
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

} else {

    // Display message if no videos are found
    echo "<div class='card-body'>
    <div class='d-flex align-items-center justify-content-center'>
      <div class='button-wrapper'>
        <img src='img/logo.png' alt='Logo' height='150' width='150'>
        <p class='text-muted mb-0 abd' style='text-align: center;'>No Audios To Explore</p>
      </div>
    </div>
</div>";

}

// Close database connection
mysqli_close($con);

?>





