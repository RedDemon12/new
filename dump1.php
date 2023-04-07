<?php include('controllerUserData.php'); ?>

<head> 
    <style>
table {
    font-family: Arial, sans-serif;
    font-size: 13px;

}

th {
    background-color: #f2f2f2;
    text-align: left;
    padding: 8px;
}

td {
    padding: 8px;
    text-align: center;
}

.follow-button, .following-button {
    color: white;
    font-weight: bold;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
}

.follow-button {
    background-color: blue;
}

.following-button {
    background-color: rgb(100, 251, 84);
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<?php

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$logged_in_username = $_SESSION['id'];
// Select all users from the users table
$sql = "SELECT * FROM users WHERE id != '$logged_in_username' ORDER BY RAND() LIMIT 4";
$result = mysqli_query($con, $sql);

// Check if there are any users in the result set
// Start the container div
echo '<table style="width:100%;border-collapse:collapse;">';

if (mysqli_num_rows($result) > 0) {
    // Output the users
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        // Limit the results to 10
        if ($count >= 10) {
            break;
        }

        // Get the profile picture for the user
        $profile_pic = $row['profile_pic_path'];
        if ($profile_pic === null) {
            $profile_pic = 'assets copy/img/avatars/user.png';
        } else {
            $profile_pic = 'http://localhost/temp/' . $profile_pic;
        }

        // Check if the user is already followed by the logged-in user
        $followed_to = $row['username'];
        $sql2 = "SELECT * FROM follow_system WHERE follow_by = '$logged_in_username' AND follow_to_u = '$followed_to'";
        $result2 = mysqli_query($con, $sql2);

        if (mysqli_num_rows($result2) > 0) {
            // User is already followed, display "Following" button
            echo '<tr>';
            echo '<td style="padding:8px;"><img src="' . $profile_pic . '" style="width:50px;height:50px;"></td>';
            echo '<td style="padding:8px;"><a href="clickablepro.php?id=' . $row['id'] . '">' . $row['username'] . '</a></td>';
            echo '<td style="padding:8px;"><button class="following-button" data-username="' . $row['username'] . '" data-userid="' . $row['id'] . '">Following</button></td>';
            echo '</tr>';
        } else {
            // User is not followed, display "Follow" button
            echo '<tr>';
            echo '<td style="padding:8px;"><img src="' . $profile_pic . '" style="width:50px;height:50px;"></td>';
            echo '<td style="padding:8px;"><a href="clickablepro.php?id=' . $row['id'] . '">' . $row['username'] . '</a></td>';
            echo '<td style="padding:8px;"><button class="follow-button" data-username="' . $row['username'] . '" data-userid="' . $row['id'] . '">Follow</button></td>';
            echo '</tr>';
        }

        $count++;
    }
} else {
    echo "<tr><td colspan='3' style='padding:8px;text-align:center;'>No users found.</td></tr>";
}

// End the table
echo '</table>';


?>


<script>


$(document).ready(function() {
  // Click event listener for follow buttons
  $('button.follow-button, button.following-button').click(function() {
    var username = $(this).data('username');
    var userid = $(this).data('userid');
    var button = $(this);

    if (button.hasClass('following-button')) {
      // If the button is already in the "Following" state, make an AJAX call to remove the follow entry from the database
      $.ajax({
        type: 'POST',
        url: 'unfollow.php',
        data: {
          username: username
          
        },
        success: function(response) {
          // Update button text and style on success
          button.removeClass('following-button');
          button.addClass('follow-button');
          button.text('Follow');
        },
        error: function() {
          alert('An error occurred.');
        }
      });
    } else {
      // If the button is in the "Follow" state, make an AJAX call to add the follow entry to the database
      $.ajax({
        type: 'POST',
        url: 'follow.php',
        data: {
          username: username,
          userid: userid
        },
        success: function(response) {
          // Update button text and style on success
          button.removeClass('follow-button');
          button.addClass('following-button');
          button.text('Following');
        },
        error: function() {
          alert('An error occurred.');
        }
      });
    }
  });
});

</script>

