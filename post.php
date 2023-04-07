<?php
include('controllerUserData.php'); 

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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

#selected-image {
  max-height: 200px;
  max-width: 200px;
    margin-bottom: 10px;
}


/* Style the post and cancel buttons */
#post-btn, #cancel-btn {
  background-color: #1e90ff;
  color: white;
  border: none;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

#post-btn:hover, #cancel-btn:hover {
  background:rgb(100, 251, 84);
}

#post-btn:focus, #cancel-btn:focus {
  outline: none;
}
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.styled-select select {
  background-color: #f7f7f7;
  border: none;
  font-size: 16px;
  height: 40px;
  padding: 10px;
  width: 100%;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 4px;
  position: relative;
  margin-bottom: 10px;


}

/* Add a down arrow icon */
.styled-select i {
  position: absolute;
  top: 14px;
  right: 14px;
  font-size: 12px;
  color: #333;
}

/* Style the select element when it's open */
.styled-select select:focus {
  outline: none;
  box-shadow: 0 0 5px rgba(81, 203, 238, 1);
  border-radius: 4px;
}

/* Style the options */
.styled-select select option {
  background-color: #f7f7f7;
  border: none;
  color: #333;
  font-size: 16px;
  padding: 10px;
  cursor: pointer;
}

/* Style the selected option */
.styled-select select option:checked {
  background-color: #51cbee;
  color: white;
}

.dropdown-menu {
  position: absolute;
  z-index: 1;
  top: 50px;
  right: 0;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  border-radius: 4px;
  display: none;
  min-width: 100px;
}
.font-size {
  position: relative;
  display: inline-block;
}

.btn {
  background-color: #51cbee;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 10px;
}

.dropdown-menu button {
  background-color: #f9f9f9;
  border: none;
  color: #333;
  padding: 10px 20px;
  text-align: left;
  text-decoration: none;
  display: block;
  font-size: 16px;
  cursor: pointer;
}

.dropdown-menu button:hover {
  background-color: #ddd;
}

/* Show the dropdown menu when the font size button is clicked */
#location-btn {
  background-color: #51cbee;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 10px;
}

#location-btn:hover {
  background-color: #2a92bf;
}

.dropdowns {
  position: relative;
  display: inline-block;
  width: 10%;
}

.dropdowns-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #fff;
  border: 1px solid #ccc;
  padding: 10px;
  font-size: 12px;

}

.dropdowns-content a {
  color: #333;
  display: flex;
  padding: 5px 0;
  text-decoration: none;
  transition: all 0.2s;
}

.dropdowns-content a:hover {
  background-color: #f5f5f5;
}

.dropdowns-content.show {
  display: block;
  width: 140%;

}



.dropbtn{
  border: none;
  background-color: white; 
}

.post {
  display: flex;
  align-items: center;
}

button {
  padding: 10px 20px;
  background-color: #eee;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:focus {
  outline: none;
}

button i {
  margin-right: 5px;
}

button span {
  margin-left: 5px;
}

.like-icon.filled {
  display: none;
}

.like-icon.empty {
  display: inline-block;
}

.like-button.liked .like-icon.filled {
  display: inline-block;
}

.like-button.liked .like-icon.empty {
  display: none;
}

.like-button.liked .like-text {
  color: #007bff;
}

.comment-button {
  margin-left: 20px;
  padding: 10px 20px;
  background-color: #eee;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.save-button{
  margin-left: 418px;
}

.comment-button:hover {
  background-color: #ddd;
}

/* Style the comment input box */
.comment-input {
  margin-left: 20px;

  display: flex;
  align-items: center;
}

.comment-input input[type="text"] {
  flex: 1;
  padding: 10px;
  border: none;
  border-radius: 5px;
  background-color: #f5f5f5;
}
.comment-input button {
  padding: 10px;
  background-color: #eee;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-left: 10px;
}

.comment-input button:hover {
  background-color: #ddd;
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
    <input type="text" id="search-input" class="form-control searchi" name="search" placeholder="Search InfoServOps Forum" autocomplete="off">
    
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
                            <div class="avatar flex-shrink-0">

                        <?php    if ($row['profile_pic_path'] == null) {
  // If profile_pic_path is null, display a default image with its src and alt attributes set to the user's username
  echo '<img src="assets copy/img/avatars/user.png" alt="' . $row['username'] . '\'s profile pic">';
} else {
  // If profile_pic_path is not null, display the user's profile pic with its src and alt attributes set to the user's username
  echo '<img src="http://localhost/temp/' . $row['profile_pic_path'] . '" alt="ProfilePic">';
}
?>
                            </div>
                            <input
                              class="form-controls"
                              type="text"
                              id="firstName"
                              placeholder = "What's new going on @<?php echo htmlentities($row['username']); ?>"
                              name="firstname" />
                          </div><?php }?><ul id="ul-nbs">
                                <li><a href="#" id="home-link">Image</a></li>
                                <li><a href="#">Video</a></li>
                                <li><a href="#">Audio</a></li>
                                <li><a href="#">Document</a></li>
                                <li><a href="#">Location</a></li>

                            </ul>
                            </div>
                      </div>

                      <label for="file-input">
</label>
<input name="profile-image" id="file-input" type="file" accept=".jpg,.png" style="display: none;">
<div id="modal" class="modal">
  <div class="modal-content">

    <span class="close">&times;</span>
    <!-- Add a select element with filter options -->

    <div class="styled-select">
  <select id="filter-select">
    <option value="">None</option>
    <option value="grayscale(100%)">Grayscale</option>
    <option value="brightness(50%)">Low Brightness</option>
    <option value="contrast(200%)">High Contrast</option>
    <option value="sepia(100%)">Sepia</option>
    <option value="invert(100%)">Invert</option>
  </select>
  <i class="fa fa-chevron-down"></i>
</div>
<div class="button-wrapper"> 

    <img id="selected-image" src="">  

    <div class="font-size">
  <button class="btn">Font Size</button>
  
  <div class="dropdown-menu">
    <button class="dropdown-item" data-font-size="12">12px</button>
    <button class="dropdown-item" data-font-size="14">14px</button>
    <button class="dropdown-item" data-font-size="16">16px</button>
    <button class="dropdown-item" data-font-size="18">18px</button>
</div>
</div>  
<button class="btn" id="location-btn">Location</button>
<button class="btn" id="tag-link"><label for="tag-input">Tag</label></button>
<div id="tag-selections"></div>

  <div id="tag-input-container">
    <input type="text" id="tag-input">
  </div>
  <ul id="tag-suggestions"></ul>


    </div>

   <b> <p id="location" style="display:none;"></p></b>
    <textarea id="caption" class="my-textarea" placeholder="Enter your caption here..."></textarea>
    <button type="submit" name="submit "id="post-btn">Post</button>
    <button id="cancel-btn">Cancel</button>
  </div>
</div>



<script>
  // Wait for the DOM to load
  document.addEventListener("DOMContentLoaded", function() {
    // Get references to the relevant elements
    var postBtn = document.getElementById("post-btn");
    var location = document.getElementById("location");
    var caption = document.getElementById("caption");
    var userId = "<?php echo $_SESSION['id']; ?>";
    var filterSelect = document.getElementById("filter-select");
    var fontSizeBtns = document.querySelectorAll("[data-font-size]");

    // Add click event listener to the post button
    postBtn.addEventListener("click", function() {
      // Get the selected filter value
      if (filterSelect) {
        var selectedFilter = filterSelect.value;
      } else {
        var selectedFilter = "";
      }

      // Get the selected font size
      var selectedFontSize = "";
      fontSizeBtns.forEach(function(btn) {
        if (btn.classList.contains("active")) {
          selectedFontSize = btn.getAttribute("data-font-size");
        }
      });

      // Send an AJAX request to insert the post into the database
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "posting.php");
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
        //  window.location.reload();
        }
      };
      xhr.send("location=" + location.textContent + "&caption=" + caption.value + "&userId=" + userId + "&filter=" + selectedFilter + "&fontSize=" + selectedFontSize);
    });

    // Add click event listeners to the font size buttons
    fontSizeBtns.forEach(function(btn) {
      btn.addEventListener("click", function() {
        fontSizeBtns.forEach(function(btn) {
          btn.classList.remove("active");
        });
        this.classList.add("active");
      });
    });
  });
</script>






<script>
var tagLink = document.getElementById('tag-link');
var tagInputContainer = document.getElementById('tag-input-container');
var tagInput = document.getElementById('tag-input');
var tagSuggestions = document.getElementById('tag-suggestions');
var tagSelections = document.getElementById('tag-selections');

tagInputContainer.style.display = 'none';

tagLink.addEventListener('click', function() {
  tagInputContainer.style.display = 'block';
});

tagInput.addEventListener('keyup', function() {
  tagSuggestions.innerHTML = '';

  // Get the search query
  var query = tagInput.value.trim().toLowerCase();

  if (query !== '') {
    fetch('get_user.php?query=' + query)
      .then(function(response) {
        return response.json();
      })
      .then(function(users) {
        users.forEach(function(user) {
          var li = document.createElement('li');
          li.textContent = user.username;
          li.setAttribute('data-user-id', user.id); // Set user ID as data attribute

          li.addEventListener('click', function() {
            var tag = document.createElement('span');
            tag.textContent = user.username;
            tag.classList.add('tag');
            tagSelections.appendChild(tag);
            tag.addEventListener('click', function() { 
              tagSelections.removeChild(tag);

              // Remove the corresponding row from the database
              var username = user.username;
              $.ajax({
                url: 'delete-tag.php',
                method: 'POST',
                data: {
                  username: username
                },
                success: function(response) {
                  console.log('Tag deleted successfully.');
                  console.log('User ID: ' + response.userId);
                  console.log('Username: ' + response.username);
                },
                error: function(xhr, status, error) {
                  console.log('Error deleting tag: ' + error);
                }
              });
            });
            
            var data = [];
            var userId = user.id;
            var username = user.username;
            data.push({userId: userId, username: username});

            // Send AJAX request to server to store the selected tag
            $.ajax({
              url: 'store-tags.php',
              method: 'POST',
              data: {
                tags: data
              },
              success: function(response) {
                console.log('Tag stored successfully.');
                console.log('User ID: ' + response.userId);
                console.log('Username: ' + response.username);
              },
              error: function(xhr, status, error) {
                console.log('Error storing tag: ' + error);
              }
            });
          });
          tagSuggestions.appendChild(li);
        });
      })
      .catch(function(error) {
        console.error('Error fetching users:', error);
      });
  }
});

</script>




<script>

var locationBtn = document.getElementById('location-btn');
var locationElem = document.getElementById('location');

locationBtn.addEventListener('click', function() {
  navigator.geolocation.getCurrentPosition(function(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    fetch('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + latitude + ',' + longitude + '&key=AIzaSyCXKFAtXLGEJH7bu2yvwlUxVufc1ZIrO78')
      .then(function(response) {
        return response.json();
      })
      .then(function(data) {
        var streetAddress, city;
        for (var i = 0; i < data.results.length; i++) {
          var result = data.results[i];
          if (result.types.includes('street_address')) {
            streetAddress = result.formatted_address;
          } else if (result.types.includes('locality')) {
            city = result.formatted_address;
          }
        }
        
        locationElem.textContent = streetAddress + ' near ' + city;
        
        if (locationElem.style.display === "none") {
          locationElem.style.display = "block";
        } else {
          locationElem.style.display = "none";
        }
      });
  });
});


  </script>

<script>

var fontSizeBtn = document.querySelector('.font-size .btn');

// Get the dropdown menu
var dropdownMenu = document.querySelector('.font-size .dropdown-menu');

// Add a click event listener to the font size button
fontSizeBtn.addEventListener('click', function() {
  // Toggle the "show" class on the dropdown menu
  dropdownMenu.classList.toggle('show');
});

// Add click event listeners to the font size options
var fontSizeOptions = document.querySelectorAll('.font-size .dropdown-menu button');
for (var i = 0; i < fontSizeOptions.length; i++) {
  fontSizeOptions[i].addEventListener('click', function() {
    // Get the font size from the data-font-size attribute
    var fontSize = this.getAttribute('data-font-size');
    
    // Set the font size of the textarea
    document.getElementById('caption').style.fontSize = fontSize + 'px';
    
    // Hide the dropdown menu
    dropdownMenu.classList.remove('show');
  });
}

</script>

<script>
var filterSelect = document.getElementById("filter-select");
var selectedImage = document.getElementById("selected-image");

// Add an event listener to the select element
filterSelect.addEventListener("change", function() {
  // Get the selected filter
  var selectedFilter = filterSelect.value;
  
  // Apply the filter to the modal image
  selectedImage.style.filter = selectedFilter;
});

// Reset the filter when the modal box is closed
modal.addEventListener("hidden.bs.modal", function() {
  selectedImage.style.filter = "";
});
  </script>

  

                      <script>
document.getElementById("home-link").addEventListener("click", function(event) {
  event.preventDefault();
  document.getElementById("file-input").click();
});

document.getElementById("file-input").addEventListener("change", function() {
  var reader = new FileReader();
  reader.onload = function(event) {
    document.getElementById("selected-image").src = event.target.result;
  }
  reader.readAsDataURL(this.files[0]);
  document.getElementById("modal").style.display = "block";
});

// Close the modal when the user clicks on the close button or outside the modal
document.getElementsByClassName("close")[0].addEventListener("click", function() {
  document.getElementById("modal").style.display = "none";
});

window.addEventListener("click", function(event) {
  if (event.target == document.getElementById("modal")) {
    document.getElementById("modal").style.display = "none";
  }
});

// Handle the post and cancel buttons
document.getElementById("post-btn").addEventListener("click", function() {
  var caption = document.getElementById("caption").value;
  // Do something with the selected image and caption
  document.getElementById("modal").style.display = "none";
});

document.getElementById("cancel-btn").addEventListener("click", function() {
  document.getElementById("modal").style.display = "none";
});
  </script>

<?php 

$id = $_GET["id"];
$user_id = $_GET["user_id"];

    $query = mysqli_query($con, "SELECT * FROM post WHERE post_id = '$id'");
    $row = mysqli_fetch_array($query) 
  
?>




                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">

                          <?php  
$query = mysqli_query($con, "SELECT * FROM users WHERE id = '" . $row['user_id'] . "'");
$row = mysqli_fetch_array($query);

if ($row['profile_pic_path'] == null) {
  // If profile_pic_path is null, display a default image with its src and alt attributes set to the user's username
  echo '<img src="assets copy/img/avatars/user.png" alt="' . $row['username'] . '\'s profile pic">';
} else {
  // If profile_pic_path is not null, display the user's profile pic with its src and alt attributes set to the user's username
  echo '<img src="http://localhost/temp/' . $row['profile_pic_path'] . '" alt="ProfilePic">';
}

?>

</div>
&nbsp;
&nbsp;
&nbsp;
&nbsp;

    <h5><?php echo '<a href="clickablepro.php?id=' . $row['id'] . '">'?><?php echo htmlentities($row['username']); ?></a><br> <span style="  font-size: small;">
    <?php echo htmlentities($row['firstname'] . ' ' . $row['surname']); ?><span></h5><?php ?>    

<?php  
$query = mysqli_query($con, "SELECT * FROM post WHERE post_id = '$id'");  
$rows = mysqli_fetch_array($query); ?>
    <input
                              class="form-controlss"
                              type="text"
                              id="firstName"
                              value = "<?php echo htmlentities($rows['address']); ?>"; 
                              name="firstname" readonly />

                              <div class="dropdowns">
  <button class="dropbtn"><i class="fa fa-bars huh"></i>
</button>
  <div class="dropdowns-content">
    <?php
  if($rows['user_id'] == $id || $rows['user_id'] == $_SESSION['id']) {
    echo '<a href="#" onclick="openEditForm(' . $id . ')">Edit Post</a>'; 
    echo '<a href="#" onclick="openDeleteForm(' . $id . ')">Delete Post</a>';}?>
    <a href="#">Report Post</a>
  </div>
</div>
<script>

function openEditForm(id) {
  console.log("openEditForm called with postId=", id);
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
  xhr.open('GET', 'edit_post.php?post_id=' + id, true);
  xhr.send();

  document.body.appendChild(modal);}

</script>
<script>

function openDeleteForm(id) {
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
  xhr.open('GET', 'del_post.php?post_id=' + id, true);
  xhr.send();

  document.body.appendChild(modal);}

</script>

<script>
  window.onload = function() {
    var dropdowns = document.querySelectorAll(".dropdowns");
    
    dropdowns.forEach(function(dropdown) {
      var dropdownContent = dropdown.querySelector(".dropdowns-content");
      var dropdownButton = dropdown.querySelector(".dropbtn");

      dropdownButton.addEventListener("click", function() {
        dropdownContent.classList.toggle("show");
      });
    });
  };
</script>



                          </div><hr>
                          <div style="text-align:center;"><?php
$query = mysqli_query($con, "SELECT * FROM image_post WHERE post_id = '$id'");  
$row = mysqli_fetch_array($query); 

if ($rows['type'] == 'image') {
  echo '<b><input class="form-controlss" style="color: black; font-weight: bolder; font-size: ' . $rows['font_size'] . 'px;" type="text" id="firstName" value="' . $row['about'] . '" name="firstname" readonly /></b>';

    echo '<img src="http://localhost/temp/imageposts/' . $row['image'] . '" alt="Image Post" width="400" height="300">';
} elseif ($rows['type'] == 'video') {
  $query = mysqli_query($con, "SELECT * FROM video_post WHERE post_id = '$id'");  
  $row = mysqli_fetch_array($query); 
  echo '<b><input class="form-controlss" style="color: black; font-weight: bolder; font-size: ' . $rows['font_size'] . 'px;" type="text" id="firstName" value="' . $row['about'] . '" name="firstname" readonly /></b>';

  echo '<video width="400" height="300" controls>';
  echo '<source src="http://localhost/temp/videoposts/' . $row['video'] . '" type="video/mp4">';
  echo '</video>';
} elseif ($rows['type'] == 'audio') {
  $query = mysqli_query($con, "SELECT * FROM audio_post WHERE post_id = '$id'");  
  $row = mysqli_fetch_array($query); 
  echo '<b><input class="form-controlss" style="color: black; font-weight: bolder; font-size: ' . $rows['font_size'] . 'px;" type="text" id="firstName" value="' . $row['about'] . '" name="firstname" readonly /></b>';

  echo '<audio controls>';
  echo '<source src="http://localhost/temp/audioposts/' . $row['audio'] . '" type="audio/mpeg">';
  echo '</audio>';
} elseif ($rows['type'] == 'document') {
  $query = mysqli_query($con, "SELECT * FROM doc_post WHERE post_id = '$id'");
  $row = mysqli_fetch_array($query);
  echo '<b><input class="form-controlss" style="color: black; font-weight: bolder; font-size: ' . $rows['font_size'] . 'px;" type="text" id="firstName" value="' . $row['about'] . '" name="firstname" readonly /></b>';
  
  echo '<iframe src="http://localhost/temp/docposts/' . $row['doc'] . '" frameborder="0" style="width:100%; height:500px;"></iframe>';
  }

  elseif ($rows['type'] == 'text') {
    $query = mysqli_query($con, "SELECT * FROM text_post WHERE post_id = '$id'");  
    $row = mysqli_fetch_array($query);   
    $text = $row['text'];
    echo '<div style="background-color: #f9f9f9; padding: 20px;">';
    echo '<p style="font-size: 1.2rem; line-height: 1.5; color: #333; font-family: Montserrat;">' . $text . '</p>';
    echo '</div>';  }
?>


</div><hr>

<h6>
<?php  
$query = mysqli_query($con, "SELECT COUNT(*) as likes FROM post_likes WHERE post_id = '$id'");  
$row = mysqli_fetch_array($query); ?>
<span class="lik" style= "cursor: pointer" id="likes_<?php echo $id; ?>" onclick="showLikesModal('<?php echo $id; ?>')"> <?php echo htmlentities($row['likes']); ?> Likes</span>

<?php  
$query = mysqli_query($con, "SELECT COUNT(*) as comments FROM post_comments WHERE post_id = '$id'");  
$row = mysqli_fetch_array($query); ?>
<span class="com"  style= "cursor: pointer" id="comments_<?php echo $id; ?>" onclick="showCommentsModal('<?php echo $id; ?>')"> <?php echo htmlentities($row['comments']); ?> Comments</span>

</h6><hr>

<!-- Modal -->
<div id="likes-modal" class="modal" style="cursor: pointer">
<div class="modal-content" id="likes-modal-content" style="cursor: pointer;">
    <span class="close">&times;</span>
    <p>Loading...</p>
  </div>
</div>
<script>
    $(document).on('click', '.clear-comment-btn', function() {
        var commentId = $(this).data('commentid');
            $.ajax({
                url: 'show_comments.php',
                type: 'post',
                data: {commentId: commentId},
                success: function(response) {
                    // Refresh the comments section
                window.location.reload();
                }
            });
        
    });
</script>


<script>
const modal = document.getElementById("likes-modal");

const span = document.getElementsByClassName("close")[0];

function showLikesModal(id) {
  modal.style.display = "block";
  const modalContent = document.getElementById("likes-modal-content");
  modalContent.innerHTML = "Loading...";

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "show_likes.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.readyState === xhr.DONE && xhr.status === 200) {
      modalContent.innerHTML = xhr.responseText;
    }
  };
  xhr.send("postId=" + id);
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function showCommentsModal(id) {
  const modal = document.getElementById("likes-modal");

  const modalContent = document.getElementById("likes-modal-content");
  modal.style.display = "block";
  modalContent.innerHTML = "Loading...";

  const xhr = new XMLHttpRequest();
  xhr.open("POST", "show_comments.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.readyState === xhr.DONE && xhr.status === 200) {
      modalContent.innerHTML = xhr.responseText;
    }
  };
  xhr.send("postId=" + id);
}


</script>

<div class="post" id="post_<?php echo $id ?>">
  <?php
$userId = $_SESSION['id'];
  $query = mysqli_query($con, "SELECT * FROM post_likes WHERE post_id = '$id' AND post_like_by = '$userId'");
  $isLiked = mysqli_num_rows($query) > 0;
  ?>
  <button class="like-button<?php echo $isLiked ? ' liked' : ''; ?>" onclick="toggleLike(this)" data-post-id="<?php echo $id ?>">
    <i class="far fa-heart like-icon empty"></i>
    <i class="fas fa-heart like-icon filled"></i>
    <span class="like-text"><?php echo $isLiked ? 'Liked' : 'Like'; ?></span>
  </button>


    <script>
function toggleLike(button) {
  var postId = button.dataset.id;
  var isLiked = button.classList.contains("liked"); // Check whether the post is already liked or not
  var xhr = new XMLHttpRequest();
  xhr.open('POST', isLiked ? 'unlike.php' : 'like.php'); // Send the request to like.php if the post is not already liked, or unlike.php otherwise
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    if (xhr.status === 200 && xhr.responseText) {
      console.log(xhr.responseText);

      var response = JSON.parse(xhr.responseText);
      var likesCount = response.likesCount;

      // Update the UI to show the new like count
      var likeCountElem = document.querySelector('#likes_' + id);
      likeCountElem.innerHTML = likesCount + ' Likes';

      // Update the like button to show whether the post is liked or not
      button.classList.toggle("liked");
      var emptyHeart = button.querySelector(".like-icon.empty");
      var filledHeart = button.querySelector(".like-icon.filled");
      if (button.classList.contains("liked")) {
        button.querySelector(".like-text").innerText = "Liked";
        emptyHeart.style.display = "none";
        filledHeart.style.display = "inline-block";
      } else {
        button.querySelector(".like-text").innerText = "Like";
        emptyHeart.style.display = "inline-block";
        filledHeart.style.display = "none";
      }
    }
  };
  xhr.send('post_id=' + encodeURIComponent(postId) + '&is_liked=' + (isLiked ? '1' : '0')); 
}


</script>
  
<button class="comment-button" onclick="showCommentInput(this)">
    <i class="far fa-comment"></i>
    <span>Comment</span>
  </button>
  <div class="comment-input" style="display:none;">
    <input type="text" placeholder="Write a Comment">
    <button class="send-button" data-post-id="<?php echo $id; ?>">
  <i class="fas fa-paper-plane"></i>
</button>

  </div>

 <?php
// Check if current user has bookmarked the post
$sql = "SELECT * FROM bookmarks WHERE post_id='$id' AND user_id='$userId'";
$result = mysqli_query($con, $sql);

// Add is-bookmarked class if the user has bookmarked the post
$buttonClass = "save-button";
if (mysqli_num_rows($result) > 0) {
    $buttonClass .= " is-bookmarked";
}
?>

<button class="<?php echo $buttonClass ?>" onclick="toggleBookmark(this)" data-post-id="<?php echo $id ?>" data-user-id="<?php echo $userId ?>">
  <i class="fa <?php echo (mysqli_num_rows($result) > 0) ? 'fa-bookmark' : 'fa-bookmark-o' ?>"></i>
</button>
</div>
</div> 

<script>
function toggleBookmark(button) {
  var bookmarkIcon = button.querySelector("i.fa");
  var post_id = button.dataset.postId;
  var user_id = button.dataset.userId;
  
  if (bookmarkIcon.classList.contains("fa-bookmark-o")) {
    bookmarkIcon.classList.remove("fa-bookmark-o");
    bookmarkIcon.classList.add("fa-bookmark");

    // Add post_id and user_id to bookmark table
    fetch('addbook.php', {
      method: 'POST',
      body: JSON.stringify({ post_id: post_id, user_id: user_id }),
      headers: {
        'Content-Type': 'application/json'
      }
    }).then(response => {
      if (response.ok) {
        console.log("Bookmark added successfully");
        button.classList.add("is-bookmarked");
        bookmarkIcon.classList.remove("fa-bookmark-o");
        bookmarkIcon.classList.add("fa-bookmark");
      } else {
        console.error("Error adding bookmark:", response.statusText);
      }
    });
  } else {
    bookmarkIcon.classList.remove("fa-bookmark");
    bookmarkIcon.classList.add("fa-bookmark-o");

    // Remove post_id and user_id from bookmark table
    fetch('addbook.php', {
      method: 'DELETE',
      body: JSON.stringify({ post_id: post_id, user_id: user_id }),
      headers: {
        'Content-Type': 'application/json'
      }
    }).then(response => {
      if (response.ok) {
        console.log("Bookmark removed successfully");
        button.classList.remove("is-bookmarked");
        bookmarkIcon.classList.remove("fa-bookmark");
        bookmarkIcon.classList.add("fa-bookmark-o");
      } else {
        console.error("Error removing bookmark:", response.statusText);
      }
    });
  }
}

</script>

<script>
function showCommentInput(button) {
  var commentInput = button.parentNode.querySelector(".comment-input");
  var likeButton = button.parentNode.querySelector(".like-button");
  var saveButton = button.parentNode.querySelector(".save-button");

  if (commentInput.style.display === "flex") {
    commentInput.style.display = "none";
    likeButton.style.display = "inline-block";
    saveButton.style.display = "inline-block";
  } else {
    commentInput.style.display = "flex";
    likeButton.style.display = "none";
    saveButton.style.display = "none";
  }
}
</script>



                            </div>    

                      </div>
                    </div>
                    <br>
                    <div class="col-lg-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="fa fa-refresh" style="font-size: 32px; COLOR: BLACK; position:absolute; right:2px; bottom:2px;" onclick="showPeople()"></i>
                            </div> 
                            
                            <div class="suguser">Suggested Users</div>
                          </div>



                                     
<div id="user-list">


</div>



<script>
  document.querySelectorAll('.send-button').forEach(function(button) {
  button.addEventListener('click', function() {
    var postId = this.dataset.postId;
    var commentInput = this.parentNode.querySelector('input[type="text"]');
    var commentText = commentInput.value.trim();
    if (commentText) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'comment.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200 && xhr.responseText) {
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
            // Comment was successfully stored, update the UI
            var commentCountElem = document.querySelector('#comments_' + postId);
            var currentCount = parseInt(commentCountElem.textContent);
            commentCountElem.textContent = currentCount + 1 + ' Comments';
            var commentList = document.querySelector('#comment-list_' + postId);
            var newComment = document.createElement('div');
            newComment.classList.add('comment');
            newComment.innerHTML = '<strong>' + response.username + '</strong>: ' + response.commentText;
            commentInput.value = '';

          } else {
            alert('Failed to store comment.');
          }
        }
      };
      xhr.send('post_id=' + encodeURIComponent(postId) + '&comment_text=' + encodeURIComponent(commentText));
    }
  });
});

  </script>

<script>
  //For Suggested User
function showPeople() {
  // Make an AJAX call to fetch the photos
  $.ajax({
    type: 'GET',
    url: 'dump1.php',
    success: function(response) {
      // Display the photos in the #user-list element
      $('#user-list').html(response);
    },
    error: function() {
      alert('An error occurred.');
    }
  });
} 
</script>
<style>
#random-users {
    width: 80%;
    margin: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

td, th {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #ddd;
}

td img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
}

td:first-child, td:nth-child(2) {
    width: 30%;
}

td:nth-child(3) {
    width: 40%;
}
</style>


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
  
const fileInput = document.getElementById('file-input');
const filterSelects = document.getElementById('filter-select');
const postButton = document.getElementById('post-btn');


postButton.addEventListener('click', function(event) {
  event.preventDefault(); 

  const filterValue = filterSelects.value;

  const file = fileInput.files[0];

  const formData = new FormData();
  formData.append('image', file);
  formData.append('filter', filterValue);

  $.ajax({
  type: 'POST',
  url: 'save.php',
  data: formData,
  processData: false,
  contentType: false,
  success: function(response) {
    console.log('Image uploaded successfully:', response);
  },
  error: function(error) {
    console.error('Error uploading image:', error);
  }
});
});


  </script>
    

  </body>
</html>


