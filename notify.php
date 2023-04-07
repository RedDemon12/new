<?php include('controllerUserData.php'); ?>


<?php

$email = $_SESSION['email'];
$password = $_SESSION['password'];

if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];

        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}

if(isset($_POST['addtag']))
{
  $tagInput = mysqli_real_escape_string($con, $_POST['tag-input']);
  $sessionId = $_SESSION['id'] ;

$query1 = mysqli_query($con,"insert into tags (user_id,tags) values ('$sessionId','$tagInput')");
}


if(isset($_POST['submit']))
{

$fname=$_POST['firstname'];
$lname=$_POST['surname'];
$bio=$_POST['userbio'];
$mobile=$_POST['contactno'];
$insta=$_POST['insta'];
$youtube=$_POST['youtube'];
$website=$_POST['website'];
$linkedin=$_POST['linkedin'];
$twitter=$_POST['twitter'];



$query=mysqli_query($con,"update users set firstname='$fname',surname='$lname',bio='$bio',mobile ='$mobile',twitter ='$twitter',youtube ='$youtube',website ='$website',facebook ='$linkedin',instagram ='$insta' where email='".$_SESSION['email']."'");


}

       
?>  

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets copy/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>InfoServOps Forum</title>

    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="assets copy/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets copy/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets copy/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets copy/css/demo.css" />
    <link rel="stylesheet" href="assets copy/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/css/emoji.css" rel="stylesheet">




    <link rel="stylesheet" href="assets copy/vendor/libs/apex-charts/apex-charts.css" />
    <script src="assets copy/vendor/js/helpers.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">  
    <script src="assets copy/js/config.js"></script>
  </head>

  <body>

    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="home.php" class="app-brand-link">
                <img src="img/logo.png" alt="Main Logo"
                  width="55" >
              <span class="app-brand-text demo menu-text fw-bolder ms-2">InfoServOps<br>In-House<br>Forum</span>
            </a>
          </div>

          <ul class="menu-inner py-1">
            <li class="menu-item">
              <a href="home.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Home</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="#" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="Authentications">Edit Profile</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="explore.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-circle"></i>
                <div data-i18n="Layouts">Explore</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="media.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxl-tiktok"></i>
                <div data-i18n="Layouts">Media</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="bookmark.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-save"></i>
                <div data-i18n="Layouts">Saved</div>
              </a>
            </li>
            

            <li class="menu-item active">
              <a href="register-complaint.php" class="menu-link">
              <i class="menu-icon tf-icons bx bxs-bell-ring"></i>
                <div data-i18n="Account Settings">Notifications</div>
              </a>
            </li>
          
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">Settings</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="accprivacy.php" class="menu-link">
                    <div data-i18n="Complaints">Account Privacy</div>
			
                  </a>
                </li>
                <li class="menu-item">
                  <a href="delaccount.php" class="menu-link">
                    <div data-i18n="Without navbar">Delete Account</div>
                    
                  </a>
                </li>
                <li class="menu-item">
                  <a href="logdetails.php" class="menu-link">
                    <div data-i18n="Container">Login Details</div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </aside>

        <div class="layout-page">
            
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
    
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
           <b> USER NOTIFICATION PANEL </b>
           <ul class="navbar-nav flex-row align-items-center ms-auto">
           <?php $query=mysqli_query($con,"select * from users where email='".$_SESSION['email']."'");
                        while($row=mysqli_fetch_array($query)) { ?> 
                <li class="nav-item navbar-dropdown dropdown-user ">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                    <?php
if ($row['profile_pic_path'] == null) {
  // If profile_pic_path is null, display a default image with its src and alt attributes set to the user's username
  echo '<img src="assets copy/img/avatars/user.png" alt="' . $row['username'] . '\'s profile pic">';
} else {
  // If profile_pic_path is not null, display the user's profile pic with its src and alt attributes set to the user's username
  echo '<img src="http://localhost/temp/' . $row['profile_pic_path'] . '" alt="Profile Picture" class="w-px-40 h-auto rounded-circle">';
}
?>                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">

                            <?php
if ($row['profile_pic_path'] == null) {
  // If profile_pic_path is null, display a default image with its src and alt attributes set to the user's username
  echo '<img src="assets copy/img/avatars/user.png" alt="' . $row['username'] . '\'s profile pic" class="w-px-40 h-auto rounded-circle">';
} else {
  // If profile_pic_path is not null, display the user's profile pic with its src and alt attributes set to the user's username
  echo '<img src="http://localhost/temp/' . $row['profile_pic_path'] . '" alt="Profile Picture" class="w-px-40 h-auto rounded-circle">';
}
?>                            </div>
                          </div>
                          <div class="flex-grow-1">

                                          
                          
                            <span class="fw-semibold d-block">@<?php echo htmlentities($row['username']);?> 
</span> 
                            <small class="text-muted"><?php echo htmlentities($row['firstname']);echo('&nbsp'); echo htmlentities($row['surname']);?> </small> 
                            
                          </div>      

                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="about.php">
                        <i class="bx bxs-user me-2"></i>
                        <span class="align-middle">@<?php echo htmlentities($row['username']); ?></span> <?php }?>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout-user.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
            
          <div class="content-wrapper">
            
            <div class="container-xxl flex-grow-1 container-p-y">
              
            <div class="content-wrapper">
            <!-- Content -->
                   
            
            <div class="container-xxl flex-grow-1 container-p-y">
                
              <div class="row">
                <div class="col-md-12">
                  
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
                    </li>
                  </ul>
                  <div class="card mb-4">
                 
                  
 <?php $query=mysqli_query($con,"select * from users where email='".$_SESSION['email']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                 
                    <h5 class="card-header"><?php echo htmlentities($row['firstname']);?>'s Notifications <?php }?>  
                  <div class="clear-notifications">
  <button id="clear-notifications-btn">
    <i class="fa fa-trash"></i>
  </button>
</div>
                    </h5>
                
 
                    <script>
                    $(document).ready(function() {
  // Handle clear notifications button click event
  $('#clear-notifications-btn').click(function() {
    // Send an AJAX request to mark all notifications as read
    $.ajax({
      url: 'clear_notifications.php',
      type: 'POST',
      data: { user_id: <?php echo $_SESSION['id']; ?> },
      success: function(response) {
        // Clear the notifications div and display "No notifications"
        $('#not').html('<span style="display: block; text-align: center;">No notifications</span>');
        // Update the notifications count badge to 0
        $('.notifications-count').text(0).hide();

        // Send another AJAX request to delete all read notifications for the user
        $.ajax({
          url: 'delete_notifications.php',
          type: 'POST',
          data: { user_id: <?php echo $_SESSION['id']; ?> },
          success: function(response) {
            // Do nothing
          }
        });
      }
    });
  });
});

</script>
                    
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <div class="not" id="not">



<?php
$user_id = $_SESSION['id'];

$sql = "SELECT * FROM notifications WHERE notify_to = $user_id";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // User has notifications
    while ($row = mysqli_fetch_assoc($result)) {
        $noti_id = $row['notify_by'];
        $time_now = $row['time'];
        $posters = $row['post_id'];

        if($row['type'] == 'report'){
          echo '<td class="align-middle"><strong>' . $row['message'] . '</strong>';
          echo '</td>';
          exit();
        }
        $sql_users = "SELECT username, profile_pic_path FROM users WHERE id = $noti_id";
        $result_users = mysqli_query($con, $sql_users);

      
        if (mysqli_num_rows($result_users) > 0) {
          echo '<table class="table">';
          while ($row_users = mysqli_fetch_assoc($result_users)) {
            $username = $row_users['username'];
            $profile_pic_path = $row_users['profile_pic_path'];
            echo '<tr>';
            echo '<td class="align-middle">';
            if ($profile_pic_path == null) {
              // If profile_pic_path is null, display a default image with its src and alt attributes set to the user's username
              echo '<img src="assets copy/img/avatars/user.png" alt="' . $username . '\'s profile pic" class="w-px-40 h-auto rounded-circle">';
            } else {
              // If profile_pic_path is not null, display the user's profile pic with its src and alt attributes set to the user's username
              echo '<img src="http://localhost/temp/' . $profile_pic_path . '" alt="' . $username . '\'s profile pic" class="w-px-40 h-auto rounded-circle">';
            }
            echo '</td>';
            echo '<td class="align-middle"><strong>' . $username . '</strong>' . '&nbsp'. '&nbsp'. '&nbsp'. '&nbsp'. '&nbsp'. '&nbsp'. '&nbsp';
            echo '</td>';
            echo '<td class="align-middle"><strong>' . $row['message'] . '</strong>';
            echo '</td>';
            echo '<td class="align-middle"><strong>' . $time_now . '</strong>';
            echo '</td>';
            
            if($row['type'] == 'like' || $row['type'] == 'tag'){

      
              $sql_post = "SELECT type FROM post WHERE post_id = $posters ORDER BY time DESC LIMIT 1";
                          $result_post = mysqli_query($con, $sql_post);
                          $row_post = mysqli_fetch_assoc($result_post);
                          $type = $row_post['type'];
              
            if ($type == 'image') {
                $sql_image = "SELECT image FROM image_post WHERE post_id = $posters";
                $result_image = mysqli_query($con, $sql_image);
                $row_image = mysqli_fetch_assoc($result_image);
                $image_path = $row_image['image'];
                echo '<td class="align-middle"><a href="post.php?id=' . $row["post_id"] . '&user_id=' . $user_id . '"><img src="http://localhost/temp/imageposts/' . $image_path . '" alt="Image" class="w-px-40 h-auto"></a></td>';

              } 
             else if ($type == 'video') {
                $sql_video = "SELECT video FROM video_post WHERE post_id = $posters";
                $result_video = mysqli_query($con, $sql_video);
                $row_video = mysqli_fetch_assoc($result_video);
                $video_path = $row_video['video'];
                echo '<td class="align-middle"><a href="post.php?id=' . $row["post_id"] . '&user_id=' . $user_id . '"><video width="320" height="240" controls><source src="http://localhost/temp/videoposts/' . $video_path . '" type="video/mp4"></video></a></td>';
            } elseif ($type == 'audio') {
              $sql_audio = "SELECT audio FROM audio_post WHERE post_id = $posters";
              $result_audio = mysqli_query($con, $sql_audio);
              $row_audio = mysqli_fetch_assoc($result_audio);
              $audio_path = $row_audio['audio'];
              echo '<td class="align-middle"><a href="post.php?id=' . $row["post_id"] . '&user_id=' . $user_id . '"><audio controls><source src="http://localhost/temp/audioposts/' . $audio_path . '" type="audio/mpeg"></audio></a></td>';
          }elseif ($type == 'document') {
            $sql_document = "SELECT document_path FROM document_post WHERE post_id = $posters";
            $result_document = mysqli_query($con, $sql_document);
            $row_document = mysqli_fetch_assoc($result_document);
            $document_path = $row_document['document_path'];
            echo '<td class="align-middle"><a href="http://localhost/temp/documentposts/' . $document_path . '" target="_blank">' . $document_path . '</a></td>';
        } elseif ($type == 'text') {
            $sql_text = "SELECT text FROM text_post WHERE post_id = $posters";
            $result_text = mysqli_query($con, $sql_text);
            $row_text = mysqli_fetch_assoc($result_text);
            $text = $row_text['text'];
            echo '<td class="align-middle"><a href="post.php?id=' . $row["post_id"] . '&user_id=' . $user_id . '">' . $text . '</a></td>';
        }
      } else if($row['type'] == 'comment'){
        $sql_text = "SELECT data FROM post_comments WHERE post_id = $posters";
        $result_text = mysqli_query($con, $sql_text);
        $row_text = mysqli_fetch_assoc($result_text);
        $text = $row_text['data'];
        echo '<td class="align-middle"><a href="post.php?id=' . $row["post_id"] . '&user_id=' . $user_id . '">' . $text . '</a></td>';

      }
              
                echo '</div>';
                echo '</tr>';
                echo '</table>';

              }
        } else {
            echo "0 results";
        }

        
    }
} else {
    // User has no notifications
    echo "<span style='display: block; text-align: center;'>No notifications</span>";
}
?>


                    </div>
                        </div>
                      </div>
                    </div>
                 
                  
                  
         
                <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  
, made by
                  <b>Aryan, & Dhairya</b>
                </div>
              </div>
            </footer>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="assets copy/vendor/js/refresh.js"></script>

    <script src="assets copy/vendor/libs/jquery/jquery.js"></script>
    <script src="assets copy/vendor/libs/popper/popper.js"></script>
    <script src="assets copy/vendor/js/bootstrap.js"></script>
    <script src="assets copy/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets copy/vendor/js/menu.js"></script>
    <script src="assets copy/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets copy/js/main.js"></script>
    <script src="assets copy/js/dashboards-analytics.js"></script>

    <script src="lib/js/config.min.js"></script>
    <script src="lib/js/util.min.js"></script>
    <script src="lib/js/jquery.emojiarea.min.js"></script>
    <script src="lib/js/emoji-picker.min.js"></script>
    
    

  </body>
</html>

