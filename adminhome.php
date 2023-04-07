<?php include('controllerUserData.php'); ?>


<?php
$email = $_SESSION['aemail'];
$password = $_SESSION['apassword'];



if($email != false && $password != false){
  
}else{
  header('Location: admin.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="assets copy/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets copy/vendor/libs/apex-charts/apex-charts.css" />
    <script src="assets copy/vendor/js/helpers.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

#post-vidbtn, #cancel-btn {
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

#post-vidbtn:hover, #cancel-btn:hover {
  background:rgb(100, 251, 84);
}

#post-vidbtn:focus, #cancel-btn:focus {
  outline: none;
}

#post-audbtn, #cancel-btn {
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

#post-audbtn:hover, #cancel-btn:hover {
  background:rgb(100, 251, 84);
}

#post-audbtn:focus, #cancel-btn:focus {
  outline: none;
}

#post-docbtn, #cancel-btn {
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

#post-docbtn:hover, #cancel-btn:hover {
  background:rgb(100, 251, 84);
}

#post-docbtn:focus, #cancel-btn:focus {
  outline: none;
}

#post-textbtn, #cancel-btn {
  background-color: #1e90ff;
  color: white;
  border: none;
  padding: 4px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
  margin-left: 10px;
}

#post-textbtn:hover, #cancel-btn:hover {
  background:rgb(100, 251, 84);
}

#post-textbtn:focus, #cancel-btn:focus {
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
            <li class="menu-item active">
              <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Home</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="logout-admin.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="Authentications">LOG OUT</div>
              </a>
            </li>


              </ul>
            </li>
          </ul>
        </aside>

        <div class="layout-page">
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
                    <?php 
$query = "SELECT post_id,type,user_id,address FROM post WHERE report = 'inprocess'";
$postIds = array();

// Execute the query and fetch all rows
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_array($result)){
    $postIds[] = $row['post_id'];
}

$postIds = array_unique($postIds);

foreach($postIds as $postId) {
    // Fetch the post with the given ID
    $query = mysqli_query($con, "SELECT * FROM post WHERE post_id = '$postId'");
    while($row = mysqli_fetch_array($query)) {
        // Output the post data here
 
?>


                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">

</div>

    <?php }?>
<?php  
$query = mysqli_query($con, "SELECT * FROM post WHERE post_id = '$postId'");  
$rows = mysqli_fetch_array($query); ?>
    <input
                              class="form-controlss"
                              type="text"
                              id="firstName"
                              value = "<?php echo htmlentities($rows['address']); ?>"; 
                              name="firstname" readonly />

                          </div><hr>
                          <div style="text-align:center;"><?php
$query = mysqli_query($con, "SELECT * FROM image_post WHERE post_id = '$postId'");  
$row = mysqli_fetch_array($query); 

if ($rows['type'] == 'image') {
  echo '<b><input class="form-controlss" style="color: black; font-weight: bolder; font-size: ' . $rows['font_size'] . 'px;" type="text" id="firstName" value="' . $row['about'] . '" name="firstname" readonly /></b>';

    echo '<img src="http://localhost/temp/imageposts/' . $row['image'] . '" alt="Image Post" width="400" height="300">';
} elseif ($rows['type'] == 'video') {
  $query = mysqli_query($con, "SELECT * FROM video_post WHERE post_id = '$postId'");  
  $row = mysqli_fetch_array($query); 
  echo '<b><input class="form-controlss" style="color: black; font-weight: bolder; font-size: ' . $rows['font_size'] . 'px;" type="text" id="firstName" value="' . $row['about'] . '" name="firstname" readonly /></b>';

  echo '<video width="400" height="300" controls>';
  echo '<source src="http://localhost/temp/videoposts/' . $row['video'] . '" type="video/mp4">';
  echo '</video>';
} elseif ($rows['type'] == 'audio') {
  $query = mysqli_query($con, "SELECT * FROM audio_post WHERE post_id = '$postId'");  
  $row = mysqli_fetch_array($query); 
  echo '<b><input class="form-controlss" style="color: black; font-weight: bolder; font-size: ' . $rows['font_size'] . 'px;" type="text" id="firstName" value="' . $row['about'] . '" name="firstname" readonly /></b>';

  echo '<audio controls>';
  echo '<source src="http://localhost/temp/audioposts/' . $row['audio'] . '" type="audio/mpeg">';
  echo '</audio>';
} elseif ($rows['type'] == 'document') {
  $query = mysqli_query($con, "SELECT * FROM doc_post WHERE post_id = '$postId'");
  $row = mysqli_fetch_array($query);
  echo '<b><input class="form-controlss" style="color: black; font-weight: bolder; font-size: ' . $rows['font_size'] . 'px;" type="text" id="firstName" value="' . $row['about'] . '" name="firstname" readonly /></b>';
  
  echo '<iframe src="http://localhost/temp/docposts/' . $row['doc'] . '" frameborder="0" style="width:100%; height:500px;"></iframe>';
  }
  elseif ($rows['type'] == 'text') {
    $query = mysqli_query($con, "SELECT * FROM text_post WHERE post_id = '$postId'");  
    $row = mysqli_fetch_array($query);   
    $text = $row['text'];
    echo '<div style="background-color: #f9f9f9; padding: 20px;">';
    echo '<p style="font-size: 1.2rem; line-height: 1.5; color: #333; font-family: Montserrat;">' . $text . '</p>';
    echo '</div>';  }
  
?>
</div><hr>

<form method="post" action="offensive.php">
<input type="hidden" name="post_id" value="<?php echo $postId; ?>">
<input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>">   
 <input type="submit" name="no" value="Ignore" style="background-color: blue;margin-top: 20px; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">

    <input type="submit" name="yes" value="Delete" style="background-color: blue;margin-top: 20px; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">
  </form>
<?php }?>

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

  </body>
</html>

