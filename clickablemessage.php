<?php include('controllerUserData.php'); ?>

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



        .comment-input {

  display: flex;
  align-items: center;
  
}

.comment-input input[type="text"] {
  flex: 1;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #f5f5f5;
  width: 15%;
}
.comment-input button {
  padding: 10px;
  background-color: #eee;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-left: 2px;
  
}

.comment-input button:hover {
  background-color: #ddd;
}

.message {
  display: flex;
  flex-direction: row-reverse;
  margin-bottom: 10px;
  
}

#notours{
  display: flex;
  flex-direction: row;
  margin-bottom: 10px;
}
.message p {
  margin: 0;
}

.message img {
  max-width: 100%;
  margin-top: 5px;
  width: 30px;
  height: 30px;
}

#onlyimg {
  max-width: 100%;
  margin-top: 5px;
  width: 40%;
  height: 40%;
  margin-right: 8px;

}

#onlyvid {
  max-width: 100%;
  margin-top: 5px;
  width: 40%;
  height: 40%;
  margin-right: 8px;

}

#onlyaud {
  max-width: 100%;
  width: 240;
  height: 240;
  margin-right: 8px;

}

#onlyauds {
  max-width: 100%;
  width: 240;
  height: 240;
  margin-left: 8px;

}

#onlyvids {
  max-width: 100%;
  margin-top: 5px;
  width: 40%;
  height: 40%;
  margin-left: 8px;

}

#onlyimgs {
  max-width: 100%;
  margin-top: 5px;
  width: 40%;
  height: 40%;
  margin-left: 8px;

}

.no-conversations {
        opacity: 0.5;
        text-align: center;
        margin-bottom: 20px;
    }

    .dropdown {
    position: relative;
    display: block;
  }
  
  #dropdown-menu {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  font-size: 15px;
  left: -100px; 
  top: 0; 
}

  
  #dropdown-menu a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  #dropdown-menu a:hover {
    background-color: #f1f1f1;
  }

  .modals {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 400px;
  height: 200px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
  z-index: 9999;
  padding: 20px;
}

.modals-content {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
}
	</style>

    <script src="assets copy/js/config.js"></script>
  </head>

  <body>
  <?php

		// Get logged-in user
		$logged_in_user = $_SESSION['email'];
    $logged_in_userId = $_SESSION['id']; 


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

            <li class="menu-item">
              <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-circle"></i>
                <div data-i18n="Layouts">Explore</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="change-password.php" class="menu-link">
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
              img.src = 'assets copy/img/avatars/user.png'; 
            }
            img.alt = user.username + "'s profile picture";
            img.classList.add('profile-pics');
            listItem.appendChild(img);
            const usernameLink = document.createElement('a');  
            usernameLink.href = 'clickablesearch.php?username=' + user.username; 
            usernameLink.textContent = user.username; 
            usernameLink.classList.add('username'); 
            listItem.appendChild(usernameLink);  

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
                    <div class="col-lg-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <form method="post" action="#">
    <input type="text" id="search-inputs" class="form-control searchis" name="search" placeholder="Search Conversation" autocomplete="off">
    
    <div id="search-resultss">&nbsp;</div>
</form>


                          </div>
                          
                          <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);" onclick="focusSearchInput()"><i class="bx bx-plus me-1"></i>&nbsp; Start a Conversation</a>
                    </li>
                  </ul>                      
                <hr>
  
                <?php 
    $logged_in_userId = $_SESSION['id']; 
    $sql = "SELECT DISTINCT mssg_to FROM message WHERE mssg_by = '$logged_in_userId'";
    $result = mysqli_query($con, $sql);
   
    if(mysqli_num_rows($result) > 0) {
        // Display success message
        while($row = mysqli_fetch_assoc($result)) {
            $clg = $row['mssg_to'];
            $query=mysqli_query($con,"select * from users where id='".$clg."'");
            if($user_row=mysqli_fetch_array($query)) {

              $sqls = "SELECT COUNT(*) AS count FROM message WHERE mssg_to = $logged_in_userId AND mssg_by = $clg AND status = 'unread'";

              $resulta = mysqli_query($con, $sqls);
              $count = mysqli_fetch_assoc($resulta)['count'];
    

                $profile_pic_src = ($user_row['profile_pic_path'] == null) ? 'assets copy/img/avatars/user.png' : 'http://localhost/temp/' . $user_row['profile_pic_path'];
                echo '<a href="clickablemessage.php?username=' . $user_row['username'] . '" onclick="updateMessageStatus(\'' . $logged_in_userId . '\', \'' . $clg . '\')"><div class="alert alert-success" style="color: #007bff"><img style="margin-right: 28px;" src="' . $profile_pic_src . '" alt="Profile Picture" class="w-px-40 h-auto rounded-circle"></img><span style="font-size: 18px;">' . $user_row['username'] . '<span class="badge">' . $count . ' NEW MSGS'.'</span></span></div></a>';

              }
        }               
    } else {
        // Display no conversations message
        echo "<div class='card-body'>
            <div class='d-flex align-items-center justify-content-center'>
              <div class='button-wrapper'>
              <img src='img/logo.png' alt='Logo' height='150' width='150' style='opacity: 0.5;'>
              <p class='text-muted mb-0 abd' style='text-align: center;'>No Conversations</p>
              </div>
            </div>
        </div>";
    }
?>


<script>
function updateMessageStatus(mssg_by, mssg_to) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_message_status.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log(mssg_by); 
          console.log(mssg_to);        }
    };
    xhr.send("mssg_by=" + mssg_to + "&mssg_to=" + mssg_by);
}
</script>


                </div>

                <script>
    function focusSearchInput() {
        document.getElementById("search-inputs").focus();
    }
</script>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="card">
                        <div class="card-body" id="refreshed">
                          <div class="card-title d-flex align-items-start justify-content-between" id="amazing" >
                          <?php        
                $user = $_GET['username'];
                $query = mysqli_query($con,"SELECT * FROM users WHERE username='$user'");
                $row = mysqli_fetch_array($query);
                if(!$row){
                 echo "User not found";
                    exit();
                    }
                $user_id = $row['id'];  

                         echo '<table id="tables" style="width: 100%; table-layout: fixed;">';
              echo  '<tr>';
              echo  '<td style="width: 33%;">';
              
          if ($row['profile_pic_path'] == null) {
            echo '<img src="assets copy/img/avatars/user.png" alt="' . $row['username'] . '\'s profile pic" class="w-px-40 h-auto rounded-circle">';
          } else {
            echo '<img src="http://localhost/temp/' . $row['profile_pic_path'] . '" alt="Profile Picture" class="w-px-40 h-auto rounded-circle">';
          }
          echo '</td>'; ?>


          <td style="width: 110%;">
          <a href="clickablesearch.php?username=<?php echo $row['username']; ?>" class="mb-0"><?php echo $row['username']; ?></a>
          </td>
          <td style="width: 5%;">
  <div class="dropdown">
    <button onclick="toggleDropdown()"><i class="fa fa-ellipsis-h"></i></button>
    <div id="dropdown-menu">
      <a href="#" onclick="openClearForm(<?php echo $user_id; ?>)">Clear Chat</a>
    </div>
  </div>
</td>
        </tr>
      </table>



      <script>
  function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdown-menu");
    if (dropdownMenu.style.display === "none") {
      dropdownMenu.style.display = "block";
    } else {
      dropdownMenu.style.display = "none";
    }
  }
</script>

<script>

function openClearForm($user_id) {
  console.log($user_id);

  var modal = document.createElement('div');
  modal.classList.add('modals');
  modal.style.width = "700px";
  modal.style.height = "150px";
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    console.log("readyState=", xhr.readyState, "status=", xhr.status);

    if (xhr.readyState == 4 && xhr.status == 200) {
      modal.innerHTML = xhr.responseText;
    }
  };
  xhr.open('GET', 'clear_chat.php?user_id=' + $user_id, true);
  xhr.send();

  document.body.appendChild(modal);}

</script>
                        </div>      <hr>
                        <div id="messageonly" style="overflow-y: scroll; height: 400px;">

                            <?php
$query0 = mysqli_query($con, "SELECT message_id FROM message WHERE mssg_by = '$logged_in_userId' AND mssg_to = '$user_id'");
$postIds = array();

while($rows = mysqli_fetch_array($query0)) {
  $postIds[] = $rows['message_id'];
}

  $query1 = mysqli_query($con, "SELECT message_id FROM message WHERE mssg_by = '$user_id' AND mssg_to = '$logged_in_userId'");
  while($rowss = mysqli_fetch_array($query1)) {
        $postIds[] = $rowss['message_id'];
    }

$postIds = array_unique($postIds);
sort($postIds); 
if (empty($postIds)) {
 echo '<img id="noimg" src="img/logo.png" alt="Logo" style="display:block; margin:auto; margin-top:100px; opacity:0.5; height:150px; width:150px;">';

  echo '<div id="noconvo" class="container text-center"><p>No conversations !!</p></div>';
} else {

foreach($postIds as $postId) {
  $query = mysqli_query($con, "SELECT * FROM message WHERE message_id = '$postId'");
  while($row = mysqli_fetch_array($query)) {
  

if(mysqli_num_rows($query) == 0){
    echo "<img src='img/logo.png' id='no-img' alt='Logo' height='150' width='150' style='opacity: 0.5; display: block; margin: 0 auto;'>";
    echo '<p class="no-conversations" id="no-convo">No Conversations!!</p>';
} else {
 

      $query2 = mysqli_query($con, "SELECT * FROM users WHERE id = '$row[mssg_by]'");

      if($row['mssg_by'] == $logged_in_userId){
        echo '<div class="message">';

      $rowing = mysqli_fetch_array($query2);

      if ($rowing['profile_pic_path'] == null) {
          echo '<img src="assets copy/img/avatars/user.png" alt="' . $rowing['username'] . '\'s profile pic">';
      } else {
          echo '<img src="http://localhost/temp/' . $rowing['profile_pic_path'] . '" alt="Profile Picture">';
      }

      // If row type is "image", display the image file instead of the message
      if ($row['type'] == 'image') {
        echo '<img id="onlyimg" src="http://localhost/temp/' . $row['message'] . '" alt="Profile Picture" height="40%" width="40%" margin-right="8px">';
      }  
      else if ($row['type'] == 'video') {
        echo '<video id="onlyvid" height="40%" width="40%" margin-right="8px" controls>
                <source src="http://localhost/temp/' . $row['message'] . '" type="video/mp4">
              </video>';
      }
      else if ($row['type'] == 'audio') {
        
        echo '<audio controls id="onlyaud">
                <source src="http://localhost/temp/' . $row['message'] . '" type="audio/mpeg">
              </audio>';
    }
        else {
          echo '<p style="font-weight: bold; margin-top: 8px; margin-right: 8px;">' . $row['message'] . '</p>';
      }
      
      echo '</div>'; }
      else{
        
        echo '<div class="message" id="notours">';

        $rowing = mysqli_fetch_array($query2);


      if ($rowing['profile_pic_path'] == null) {
          echo '<img src="assets copy/img/avatars/user.png" alt="' . $rowing['username'] . '\'s profile pic">';
      } 
      else {
          echo '<img src="http://localhost/temp/' . $rowing['profile_pic_path'] . '" alt="Profile Picture">';
      }

      // If row type is "image", display the image file instead of the message
      if ($row['type'] == 'image') {
        echo '<img id="onlyimgs" src="http://localhost/temp/' . $row['message'] . '" alt="Profile Picture" height="40%" width="40%" margin-right="8px">';
      } else if ($row['type'] == 'video') {
        echo '<video id="onlyvids" height="40%" width="40%" margin-right="8px" controls>
                <source src="http://localhost/temp/' . $row['message'] . '" type="video/mp4">
              </video>';
      }
      else if ($row['type'] == 'audio') {
        echo '<audio controls id="onlyauds">
                <source src="http://localhost/temp/' . $row['message'] . '" type="audio/mpeg">
              </audio>';
      }
      else {
          echo '<p style="font-weight: bold; margin-top: 8px; margin-left: 8px;">' . $row['message'] . '</p>';
      }
      
      echo '</div>';
      }
  }
}
}
}


?>
                        </div>
                        <div id="messages">
                        <div id="chat-input" class="comment-input">
                        <input type="text" id="message-input" class="form-control" placeholder="Type your message here...">
                        <label for="image-upload" style="margin-left: 13px; margin-right: 13px;"><i class="fa fa-camera"></i></label>
                        <input type="file" id="image-upload" accept="image/*" style="display:none; height: 40%; width: 40%;">
                        <button id="send-button">Send</button>
                        </div>

              </div>
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

    <script>

const searchInputs = document.getElementById('search-inputs');
const searchResultss = document.getElementById('search-resultss');


  
  searchInputs.addEventListener('input', function() {
    if (this.value.trim() !== '') {
      searchResultss.style.display = 'block';
    } else {
      searchResultss.style.display = 'none';
    }
  });
 

  searchInputs.addEventListener('input', function() {
  // Get the search query from the input value
  const searchQuery = searchInputs.value;

  // Make an AJAX request to the PHP script to search for users
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Parse the JSON response and update the search results div
        const results = JSON.parse(xhr.responseText);
        searchResultss.innerHTML = '';
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
              img.src = 'assets copy/img/avatars/user.png'; 
            }
            img.alt = user.username + "'s profile picture";
            img.classList.add('profile-pics');
            listItem.appendChild(img);
            const usernameLink = document.createElement('a');  
            usernameLink.href = 'clickablemessage.php?username=' + user.username; 
            usernameLink.textContent = user.username; 
            usernameLink.classList.add('username'); 
            listItem.appendChild(usernameLink);  

            resultList.appendChild(listItem);
          });
          searchResultss.appendChild(resultList);
        } else {
          searchResultss.textContent = 'No results found.';
        }
      } else {
        // Handle any errors
        searchResultss.textContent = 'Error: ' + xhr.statusText;
      }
    }
  };
  xhr.open('GET', 'search.php?search=' + encodeURIComponent(searchQuery));
  xhr.send();
});

    
    const messageInput = document.getElementById('message-input');
    const fileInput = document.getElementById('image-upload');
    const sendButton = document.getElementById('send-button');
    const messageOnly = document.getElementById('messageonly');

    sendButton.addEventListener('click', function() {
  
    const messageText = messageInput.value.trim();

  
  let fileData = null;
  if (fileInput.files.length > 0) {
    fileData = fileInput.files[0];
  }


  if (!messageText && !fileData) {
    return;
  }

  const noconvo = document.getElementById('noconvo');
  const noimg = document.getElementById('noimg');

  if (noconvo && noimg) {
  noconvo.style.display = 'none';
  noimg.style.display = 'none';
}


      

  const messageDiv = document.createElement('div');
  messageDiv.classList.add('message');

  
  const messageTextP = document.createElement('p');
  messageTextP.textContent = messageText;
  messageTextP.style.fontWeight = 'bold';
  messageTextP.style.marginTop = "8px";
  messageTextP.style.marginRight = "8px";




  <?php 
$query = mysqli_query($con, "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "'");
$row = mysqli_fetch_array($query);

if ($row['profile_pic_path'] == null) {
  // If profile_pic_path is null, display a default image with its src and alt attributes set to the user's username
  $profilePicUrl = "assets copy/img/avatars/user.png";
  $altText = $row['username'] . "'s profile pic";
} else {
  // If profile_pic_path is not null, display the user's profile pic with its src and alt attributes set to the user's username
  $profilePicUrl = "http://localhost/temp/" . $row['profile_pic_path'];
  $altText = "ProfilePic";
}
      ?>;

const profilePicImg = document.createElement('img');
profilePicImg.src = <?php echo json_encode($profilePicUrl); ?>;
profilePicImg.alt = 'Profile Picture';
profilePicImg.style.height = '30px';
profilePicImg.style.width = '30px';


messageDiv.appendChild(profilePicImg);

 
  if (fileData) {
    const fileUrl = URL.createObjectURL(fileData);
    const fileImg = document.createElement('img');
    fileImg.src = fileUrl;
    fileImg.alt = fileData.name;
    fileImg.style.height = '40%';
    fileImg.style.width = '40%';
    fileImg.style.marginRight = "8px";

    
profilePicImg.src = <?php echo json_encode($profilePicUrl); ?>;
profilePicImg.alt = 'Profile Picture';
profilePicImg.style.height = '30px';
profilePicImg.style.width = '30px';



messageDiv.appendChild(profilePicImg);

    messageDiv.appendChild(fileImg);
  }
 
messageDiv.appendChild(messageTextP);

  
messageOnly.appendChild(messageDiv);

messageOnly.scrollTop = messageOnly.scrollHeight;


<?php        
                $user = $_GET['username'];
                $query = mysqli_query($con,"SELECT * FROM users WHERE username='$user'");
                $row = mysqli_fetch_array($query);
                if(!$row){
                 echo "User not found";
                    exit();
                    }
                $user_id = $row['id'];  
                ?>

const xhrs = new XMLHttpRequest();
  const url = 'notifications-message.php';
  const formDataa = new FormData();

  formDataa.append('username', <?php echo json_encode($user_id); ?>);

  xhrs.open('POST', url);
  xhrs.send(formDataa);

const formData = new FormData();
formData.append('message', messageInput.value);
if (fileInput.files.length > 0) {
  formData.append('image', fileData);
}
formData.append('user_id', <?php echo json_encode($user_id); ?>); // Append the user_id value to formData
var xhr = new XMLHttpRequest();
xhr.open("POST", "server-side-script.php");
xhr.onreadystatechange = function() {
  if (xhr.readyState === 4 && xhr.status === 200) {

}
};
xhr.send(formData);

 

  
  messageInput.value = '';
  fileInput.value = '';

});

    </script>
<script>
  window.onload = function() {
    var messageonlyDiv = document.getElementById("messageonly");
    messageonlyDiv.scrollTop = messageonlyDiv.scrollHeight;
  };
</script>



  </body>
</html> <?php }?>