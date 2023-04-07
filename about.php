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


<style>
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
}

.modal-content {
  background-color: white;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 60%;
  max-width: 800px; /* add a max-width to prevent the modal from becoming too large */
}

</style>


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
              <a href="edit-profile.php" class="menu-link">
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
            

            <li class="menu-item">
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
           <b> USER PANEL </b>
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
  echo '<img src="assets copy/img/avatars/user.png" alt="' . $row['username'] . '\'s profile pic">';
} else {
  // If profile_pic_path is not null, display the user's profile pic with its src and alt attributes set to the user's username
  echo '<img src="http://localhost/temp/' . $row['profile_pic_path'] . '" alt="Profile Picture" class="w-px-40 h-auto rounded-circle">';
}
?>                            </div>
                          </div>
                          <div class="flex-grow-1">

                                          
                          
                            <span class="fw-semibold d-block">@<?php echo htmlentities($_SESSION['username']);?> 
</span> 
                            <small class="text-muted"><?php echo htmlentities($row['firstname']);echo('&nbsp'); echo htmlentities($row['surname']);?> </small> 
                            
                          </div>      

                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bxs-user me-2"></i>
                        <span class="align-middle">@<?php echo htmlentities($row['username']); ?></span> <?php }?>
                      </a>
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
                  
                  
                  <div class="card mb-4">

 <?php $query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                 
                    <h5 class="card-header"><?php echo htmlentities($row['firstname']);?>'s Profile Details</h5>
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4 profile-picture">


                     


                    <?php
if ($row['profile_pic_path'] == null) {
  // If profile_pic_path is null, display a default image with its src and alt attributes set to the user's username
  echo '<img src="assets copy/img/avatars/user.png" alt="' . $row['username'] . '\'s profile pic" class="d-block rounded" height="100"
  width="100" id="uploadedAvatar">';
} else {
  // If profile_pic_path is not null, display the user's profile pic with its src and alt attributes set to the user's username
  echo '<img src="http://localhost/temp/' . $row['profile_pic_path'] . '" alt="Profile Picture" class="d-block rounded" height="100"
  width="100" id="uploadedAvatar">';
}
?>     
 <div class="button-wrapper change-picture"> 
 
                    <form method="POST" enctype="multipart/form-data">
    <div class="profile-picture">
      <div class="change-picture">
        <input type="file" name="profile-image">
        <button type="submit">Change</button>
      </div>
    </div>
  </form>

  <?php
    // Connect to the database
  

    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }

    if (isset($_FILES["profile-image"]) && $_FILES["profile-image"]["error"] == UPLOAD_ERR_OK) {
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["profile-image"]["name"]);
      if (move_uploaded_file($_FILES["profile-image"]["tmp_name"], $target_file)) {
        $filename = basename($_FILES["profile-image"]["name"]);
        echo "<script>document.querySelector('.profile-picture img').src = 'uploads/$filename';</script>";

        // Update the profile picture path in the database
        $sql = "UPDATE users SET profile_pic_path='$target_file' WHERE id = " . $_SESSION['id'];
        if ($con->query($sql) === TRUE) {
        } else {
          echo "Error updating profile picture path in the database: " . $con->error;
        }
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

  ?>

             
                          
                          

                          <p class="text-muted mb-0 abd">Allowed JPG, GIF or PNG. Max size of 800KB</p>
                          <p class="text-muted mb-0 abd">Reg Date</p>
                      <input type="text" name="regdate" required="required" value="<?php echo htmlentities($row['signup']);?>" class="form-control" readonly>
 </div>
 <div class="button-wrapper change-picture"> 
 
                   <h2> @<?php  echo htmlentities($row['username']); ?> </h2>
                   <h6> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<?php  echo htmlentities($row['firstname']); ?> <?php  echo htmlentities($row['surname']); ?>)</h6>

                          <p class="text-muted mb-0 abd"><?php  echo htmlentities($row['bio']); ?></p>
                           <?php } ?>
                          <p class="mb-0 abd">Tags:-</p> 
                          <?php $query=mysqli_query($con,"select * from tags where user_id='".$_SESSION['id']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
                      <input type="text" name="regdate" required="required" value="#<?php echo htmlentities($row['tags']);?>" class="form-control" readonly>
 </div><?php }?>
                        </div>
                      </div>
                    </div>



                    <div class="card mb-4">
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">

 <div class="button-wrapper posts"> POSTS
 </div>
 <div class="button-wrapper posts"> 
 FOLLOWERS
 </div>
 <div class="button-wrapper posts"> FOLLOWING
 </div>
 <div class="button-wrapper posts"> 
 PROFILE VIEWS
 </div>
                        </div>

                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <div class="button-wrapper count">

                        <?php 
                        $user_id = $_SESSION['id'];
                        $sql = "SELECT COUNT(*) AS post_count FROM post WHERE user_id = '$user_id' AND post_of = 'user'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $post_count = $row['post_count'];

 ?> 
                      <h6> <a href="media.php"><?php echo $post_count?></a></h6>                      

                </div>    
                <div class="button-wrapper counts">
                <?php 
                        $user_id = $_SESSION['id'];
                        $sql = "SELECT COUNT(*) AS follow_count FROM follow_system WHERE follow_to = '$user_id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);    
                        $follow_count = $row['follow_count'];
?>


                <h6 style= "cursor: pointer" id="likes_<?php echo $user_id; ?>" onclick="showLikesModal('<?php echo $user_id; ?>')"><a href="#"><?php echo $follow_count?></a></h6>                      

                </div>

                <div class="button-wrapper countss">
                <?php 
                        $user_id = $_SESSION['id'];
                        $sql = "SELECT COUNT(*) AS following_count FROM follow_system WHERE follow_by = '$user_id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);    
                        $follow_count = $row['following_count'];
?>
                <h6 style= "cursor: pointer" id="likes_<?php echo $user_id; ?>" onclick="showCommentsModal('<?php echo $user_id; ?>')"><a href="#"><?php echo $follow_count?></a></h6>                      
                <div id="likes-modal" class="modal" style="cursor: pointer">
<div class="modal-content" id="likes-modal-content" style="cursor: pointer;">
    <span class="close">&times;</span>
    <p>Loading...</p>
  </div>
</div>
                </div>

                <script>
const modal = document.getElementById("likes-modal");

const span = document.getElementsByClassName("close")[0];

function showLikesModal(user_id) {
  modal.style.display = "block";
  const modalContent = document.getElementById("likes-modal-content");
  modalContent.innerHTML = "Loading...";

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "show_followers.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.readyState === xhr.DONE && xhr.status === 200) {
      modalContent.innerHTML = xhr.responseText;
    }
  };
  xhr.send("user_id=" + user_id);
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function showCommentsModal(user_id) {
  const modal = document.getElementById("likes-modal");

  const modalContent = document.getElementById("likes-modal-content");
  modal.style.display = "block";
  modalContent.innerHTML = "Loading...";

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "show_following.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.readyState === xhr.DONE && xhr.status === 200) {
      modalContent.innerHTML = xhr.responseText;
    }
  };
  xhr.send("user_id=" + user_id);
}


</script>
      
                <div class="button-wrapper countsss">
                <?php 
                         $query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
                        while($row=mysqli_fetch_array($query)) 
                        {
                        ?> 
                <h6><?php echo htmlentities($row['profile_views']);?></h6>                      

                </div><?php }?>
</div>

                      </div>
                    </div>






                    
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="post" name="profile">
                        <div class="row">
                          
                        </div>

                        
                        <div class="mt-2">
                          <button type="submit" name="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                      </form>
                    </div>
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


    <script src="assets copy/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets copy/vendor/js/menu.js"></script>
    <script src="assets/js/common-scripts.js"></script>

<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

<script src="assets/js/bootstrap-switch.js"></script>

<script src="assets/js/jquery.tagsinput.js"></script>


<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


<script src="assets/js/form-component.js"></script>    


<script>
 

  $(function(){
      $('select.styled').customSelect();
  });

</script>
    <!-- Vendors JS -->
    <!-- Main JS -->
    <script src="assets copy/js/main.js"></script>
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
  
    <script src="assets copy/js/pages-account-settings-account.js"></script>


    
  </body>
</html>

