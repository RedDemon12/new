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
    <link rel="stylesheet" href="assets copy/vendor/libs/apex-charts/apex-charts.css" />
    <script src="assets copy/vendor/js/helpers.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// Attach click event to follow button
			$('body').on('click', '.follow-btn', function() {
				var username = $(this).data('username');
				var btn = $(this);
				$.ajax({
					url: 'follow.php',
					method: 'POST',
					data: { username: username },
					success: function(response) {
						if (response == 'success') {
							btn.text('Following');
							btn.addClass('following');
						}
					}
				});
			});
		});
	</script>
  <style type="text/css">
		.user {
			margin: 10px;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			display: inline-block;
			text-align: center;
		}
		.follow-btn {
			margin-top: 10px;
			padding: 5px 10px;
			border-radius: 5px;
			background-color: #0099ff;
			color: white;
			cursor: pointer;
		}
		.following {
			background-color: #00ff00;
		}
	</style>

    <script src="assets copy/js/config.js"></script>
  </head>

  <body>
  <?php

		// Get logged-in user
		$logged_in_user = $_SESSION['email']; // Replace with actual logged-in user

		// Get random users (excluding the logged-in user)
		$query = "SELECT * FROM users WHERE email != '$logged_in_user' ORDER BY RAND() LIMIT 4";
		$result = mysqli_query($con, $query);
	?>

  
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="#" class="app-brand-link">
                <img src="img/logo.png" alt="Main Logo"
                  width="55" >
              <span class="app-brand-text demo menu-text fw-bolder ms-2">InfoServOps<br>In-House<br>Forum</span>
            </a>
          </div>


          <ul class="menu-inner py-1">
            <li class="menu-item ">
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

            <li class="menu-item active">
              <a href="#" class="menu-link">
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
            <form method="post" action="#">
    <input type="text" id="search-input" class="form-control searchi" name="search" placeholder="Search InfoServOps Forum">
    
    <div id="search-results"></div>
</form>


<script>

const searchInput = document.getElementById('search-input');
  const searchResults = document.getElementById('search-results');
  
  searchInput.addEventListener('input', function() {
    if (this.value.trim() !== '') {
      searchResults.style.display = 'block';
    } else {
      searchResults.style.display = 'none';
    }
  });
  

  
  searchInput.addEventListener('input', function() {
  // Get the search query from the input value
  const searchQuery = searchInput.value;

  // Make an AJAX request to the PHP script to search for users
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Parse the JSON response and update the search results div
        const results = JSON.parse(xhr.responseText);
        searchResults.innerHTML = '';
        if (results.length > 0) {
          const resultList = document.createElement('ul');
          resultList.classList.add('res-list'); // Add a class
          results.forEach(function(user) {
            const listItem = document.createElement('li');
            listItem.classList.add('item-list'); // Add a class
            const img = document.createElement('img');
            if (user.profile_pic_url && user.profile_pic_url.trim() !== '') {
              img.src = user.profile_pic_url;
            } else {
              img.src = 'assets copy/img/avatars/user.png'; // Set default image URL
            }
            img.alt = user.username + "'s profile picture";
            img.classList.add('profile-pics'); // Add a class for styling
            listItem.appendChild(img);
            const usernameSpan = document.createElement('span');
            usernameSpan.textContent = user.username;
            usernameSpan.classList.add('username'); // Add a class for styling
            listItem.appendChild(usernameSpan);
            resultList.appendChild(listItem);
          });
          searchResults.appendChild(resultList);
        } else {
          searchResults.textContent = 'No results found.';
        }
      } else {
        // Handle any errors
        searchResults.textContent = 'Error: ' + xhr.statusText;
      }
    }
  };
  xhr.open('GET', 'search.php?search=' + encodeURIComponent(searchQuery));
  xhr.send();
});




</script>



    <span class="fw-bold fa fa-search form-control-feedback" style="padding-left: 160px;"></span>
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
?>
                    </div>
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
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="about.php">
                        <i class="bx bxs-user me-2"></i>
                        <span class="align-middle">@<?php echo htmlentities($row['username']); ?></span> 
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
              <div class="row">
                <div class="col-lg-12 mb-2 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                    </div>
                  </div>
                </div>
                <div>
                <div class="row">
                    <div class="col-lg-8">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            
                            <ul id="ul-nb">
                                <li><a href="#" onclick="showPeople()">People</a></li>
                                <li><a href="#" onclick="showPhotos()">Photos</a></li>
                                <li><a href="#" onclick="showVideos()">Videos</a></li>
                                <li><a href="#" onclick="showAudios()">Audios</a></li>
                                <li><a href="#">Groups</a></li>

                            </ul>
                             
                          </div>
                            </div>
                      </div>
                      <div class="card">
                        <div class="card-body" id="user-list">
                          <div class="card-title d-flex align-items-start justify-content-between"></div>
                          
                         
<script>
function showPeople() {
  
  $.ajax({
    type: 'GET',
    url: 'dump.php',
    success: function(response) {
      
      $('#user-list').html(response);
    },
    error: function() {
      alert('An error occurred.');
    }
  });
}
</script>
<script>
function showPhotos() {
  
  $.ajax({
    type: 'GET',
    url: 'photodump.php',
    success: function(response) {
      
      $('#user-list').html(response);
    },
    error: function() {
      alert('An error occurred.');
    }
  });
}
</script>
<script>
function showVideos() {
  $.ajax({
    type: 'GET',
    url: 'videodump.php',
    success: function(response) {
      $('#user-list').html(response);
    },
    error: function() {
      alert('An error occurred.');
    }
  });
}
</script>
<script>
function showAudios() {
  $.ajax({
    type: 'GET',
    url: 'audiodump.php',
    success: function(response) {
      $('#user-list').html(response);
    },
    error: function() {
      alert('An error occurred.');
    }
  });
}
</script>


                            </div>
                      </div >
                    </div>
                    <div class="col-lg-4">
                      


   



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


    

  </body>
</html> <?php }?>