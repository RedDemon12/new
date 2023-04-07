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

            <li class="menu-item active">
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
            

            <?php
    $user_id = $_SESSION['id'];
    // Count number of unread notifications for the user
    $sql = "SELECT COUNT(*) AS count FROM notifications WHERE notify_to = $user_id AND status = 'unread'";

    $result = mysqli_query($con, $sql);
    $count = mysqli_fetch_assoc($result)['count'];
?>

<li class="menu-item">
    <a href="notify.php" class="menu-link">
        <i class="menu-icon tf-icons bx bxs-bell-ring"></i>
        <div data-i18n="Account Settings">Notifications
        <?php if ('count' > 0) {
            // Display the count as a badge
            echo '<span class="badge">' . $count . '</span>';
            // Update the status of all unread notifications to 'read'
            $sql = "UPDATE notifications SET status = 'read' WHERE notify_to = $user_id AND status = 'unread'";
            mysqli_query($con, $sql);
        } 
        
        else {
          // Display the count as a badge without CSS
          echo '<span class="badge-no">' . $count . '</span>';
      } ?>
        </div>
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

                 
                  <?php if(isset($_POST['submit']))
                      {?>
                      <div id="myDiv" class="alert alert-success alert-dismissable">
                       <button type="button" onclick="closeDiv()" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Profile Updated!!!</b></div>
                      <?php }?>
                  
 <?php $query=mysqli_query($con,"select * from users where email='".$_SESSION['email']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                 
                    <h5 class="card-header"><?php echo htmlentities($row['firstname']);?>'s Profile Details</h5>


                    
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">

                        <div class="button-wrapper"> 
                          
                          
REGISTERED
                          
                      <input type="text" name="regdate" required="required" value="<?php echo htmlentities($row['signup']);?>" class="form-control" readonly>
 </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="post" name="profile">
                        <div class="row">
                          <div class="mb-3 col-md-3 ">
                            <label for="firstName" class="form-label">username</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="username" required="required" value="<?php echo htmlentities($row['username']);?>"
                              readonly
                            />
                          </div>

                          <div class="mb-3 col-md-3 ">
                            <label for="firstName" class="form-label">Firstname</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="firstname" required="required" value="<?php echo htmlentities($row['firstname']);?>"
                            />
                          </div>

                          <div class="mb-3 col-md-2 ">
                            <label for="firstName" class="form-label">Surname</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="surname" required="required" value="<?php echo htmlentities($row['surname']);?>"
                              
                            />
                          </div>

                          <div class="mb-3 col-md-4">
                            <label for="email" class="form-label">E-Mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="useremail" required="required" value="<?php echo htmlentities($row['email']);?>"
                              readonly
                            />
                          </div>

                          <div class="mb-3 col-md-4">
                            <label for="bio" class="form-label">Bio</label>
                            <div class="emoji-picker-container">
                            <textarea
                            data-emojiable="true"
                            placeholder="Enter Something About Yourself"
                              class="form-control"
                              type="textarea"
                              id="bio"
                              name="userbio" ><?php echo htmlentities($row['bio']);?></textarea></div>


                              <script>
      $(function() {
        // Initializes and creates emoji set from sprite sheet
        window.emojiPicker = new EmojiPicker({
          emojiable_selector: '[data-emojiable=true]',
          assetsPath: 'lib/img/',
          popupButtonClasses: 'fa fa-smile-o' // far fa-smile if you're using FontAwesome 5
        });
        // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
        // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
        // It can be called as many times as necessary; previously converted input fields will not be converted again
        window.emojiPicker.discover();
      });
    </script>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">Phone Number</span>
                              <input
                                type="text"
                                id="phoneNumber"
                                name="contactno" 
                                maxlength = "10" value="<?php echo htmlentities($row['mobile']);?>"
                                class="form-control" 
                              />
                            </div>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="city" class="form-label">Instagram</label>
                            <input class="form-control" type="text" id="state" name="insta" placeholder="Instagram" value="<?php echo htmlentities($row['instagram']);?>" />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="city" class="form-label">LinkedIN</label>
                            <input class="form-control" type="text" id="state" name="linkedin" placeholder="LinkedIn" value="<?php echo htmlentities($row['facebook']);?>" />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="city" class="form-label">Twitter</label>
                            <input class="form-control" type="text" id="state" name="twitter" placeholder="Twitter" value="<?php echo htmlentities($row['twitter']);?>" />
                          </div>


                          <div class="mb-3 col-md-6">
                            <label for="city" class="form-label">YouTube</label>
                            <input class="form-control" type="text" id="state" name="youtube" placeholder="YouTube" value="<?php echo htmlentities($row['youtube']);?>" />
                          </div>
                          
                          <div class="mb-3 col-md-6 tag>
                            <label for="city" class="form-label">Website</label>
                            <input class="form-control" type="text" id="state" name="website" placeholder="Website" value="<?php echo htmlentities($row['website']);?>" />
                          </div>
                          <?php } ?>
                          <div class="mb-3 col-md-2">
                            <label for="city" class="form-label">Add Tags</label>
                            <input class="form-control" name ="tag-input" id="tag-input" type="text" placeholder="Add Tags" />
                            
                          </div>
                          <div class="mb-3 col-md-2">
                            <label for="city" class="form-label">(MINIMAL)</label>
                            <button type="button" name="addtag" class="btn btn-primary me-2 form-control" onclick="addTag()">ADD</button>
                            
                          </div>
                           
                          <label for="tags" class="form-label">TAGS LIST</label>
                          <?php $query=mysqli_query($con,"select * from tags where user_id='".$_SESSION['id']."'");
                        while($row=mysqli_fetch_array($query)) { ?>
                            <div class="tag-list" id="tag-list"><?php echo htmlentities($row['tags']);?></div>
                            <?php } ?>
                          
                          

                        </div>

                        
                        <div class="mt-2">
                          <button type="submit" name="submit" class="btn btn-primary me-2" onclick="fetchTags()">Save changes</button>
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
    
    <script>
    function addTag() {
  const tagInput = document.getElementById('tag-input');
  const tagList = document.getElementById('tag-list');
  const tag = document.createElement('div');
  const tagText = document.createTextNode(tagInput.value);
  tag.classList.add('tag');
  tag.appendChild(tagText);
  tagList.appendChild(tag);
  tagInput.value = '';
  tagList.appendChild(document.createTextNode(' ')); 


  tag.addEventListener('click', () => {
    tag.remove();

  });
  
  var tags = document.getElementsByClassName("tag");

  var tagNames = [];
  for (var i = 0; i < tags.length; i++) {
    tagNames.push(tags[i].innerText.trim());
  }

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "saveTags.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };
  xhr.send(JSON.stringify({ tags: tagNames }));
}
    </script>
<script>
    function closeDiv() {
        document.getElementById("myDiv").style.display = "none";
    }
    </script>

  </body>
</html>

