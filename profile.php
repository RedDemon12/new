<?php require_once "controllerUserData.php"; ?>

<?php
error_reporting(0);
if(strlen($_SESSION['id'])==0)
  { 
header('location:login-user.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{

$state=$_POST['state'];
$country=$_POST['country'];
$pincode=$_POST['pincode'];
$profimg=$_POST['userimage'];

$query=mysqli_query($con,"update userdb set city='$state',country='$country',pincode='$pincode',userImage ='$profimg' where userid='".$_SESSION['login']."'");
if($query)
{ 
$successmsg="Profile Successfully !!";
}
else
{
$errormsg="Profile not updated !!";
}
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

    <title>User Dashboard</title>

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

    <link rel="stylesheet" href="assets copy/vendor/libs/apex-charts/apex-charts.css" />
    <script src="assets copy/vendor/js/helpers.js"></script>

    <script src="assets copy/js/config.js"></script>
  </head>

  <body>

    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="#" class="app-brand-link">
                <img src="img/logo.png" alt="Main Logo"
                  width="65" >
              <span class="app-brand-text demo menu-text fw-bolder ms-2">InfoServOps<br>In-House<br>Forum</span>
            </a>
          </div>


          <ul class="menu-inner py-1">
            <li class="menu-item ">
              <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-item active">
              <a href="#" class="menu-link">
              <i class="menu-icon tf-icons bx bx-user-pin"></i>
                <div data-i18n="Authentications">Profile</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="change-password.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Layouts">Change Password</div>
              </a>
            </li>
            

            <li class="menu-item">
              <a href="register-complaint.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Lodge Complaint</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="complaint-history.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Authentications">Complaint History</div>
              </a>
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
              <span class="fw-bold">USER PANEL</span>
              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="assets copy/img/avatars/user.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="assets copy/img/avatars/user.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                        
                            <span class="fw-semibold d-block"><?php echo($_SESSION['login'])?></span>
                            <small class="text-muted">IT Dept.</small>
                            
                          </div>      

                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
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

                  <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
 <?php $query=mysqli_query($con,"select * from users where userid='".$_SESSION['id']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                 
                    <h5 class="card-header"><?php echo htmlentities($row['firstname']);?>'s Profile Details</h5>


                    
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                      <?php $userphoto=$row['userImage'];
if($userphoto==""):
?>
                        <img
                          src="assets copy/img/avatars/1.png"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar"
                        />
                        <?php else:?>
	                <img src="userimages/<?php echo htmlentities($userphoto);?>" width="100" height="100"><?php endif;?>
                        <div class="button-wrapper"> 
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              name="userimage"
                              accept="image/png, image/jpeg"
                            />
                          </label>
                          
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                          <p class="text-muted mb-0">Reg Date</p>
                      <input type="text" name="regdate" required="required" value="<?php echo htmlentities($row['regDate']);?>" class="form-control" readonly>
 </div>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="post" name="profile">
                        <div class="row">
                          <div class="mb-3 col-md-6 ">
                            <label for="firstName" class="form-label">FullName</label>
                            <input
                              class="form-control"
                              type="text"
                              id="firstName"
                              name="firstname" required="required" value="<?php echo htmlentities($row['name']);?>"
                              readonly
                            />
                          </div>

                          <div class="mb-3 col-md-7">
                            <label for="email" class="form-label">E-Mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email"
                              name="useremail" required="required" value="<?php echo htmlentities($row['email']);?>"
                              readonly
                            />
                          </div>

                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Phone Number</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">Phone Number</span>
                              <input
                                type="text"
                                id="phoneNumber"
                                name="contactno" required="required" value="<?php echo htmlentities($row['mobile']);?>"
                                class="form-control" readonly
                              />
                            </div>
                          </div>

                          <div class="mb-3 col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input class="form-control" type="text" id="state" name="state" placeholder="City" value="<?php echo htmlentities($row['city']);?>" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">Zip Code</label>
                            <input
                              type="text"
                              class="form-control"
                              id="zipCode"
                              name="pincode" maxlength="6" required="required" value="<?php echo htmlentities($row['pincode']);?>"
                              placeholder="ZipCode"
                            />
                          </div>
                          <div class="mb-3 col-md-10">
                            <label class="form-label" for="country">Country</label>
                            <input type="text" name="country" required="required" value="<?php echo htmlentities($row['country']);?>" class="form-control">
                          </div>

                        </div>

                        <?php } ?>
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
                  <b>Aryan, Dhairya and Dhrumil</b>
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
    <!-- endbuild -->
    <script src="assets/js/common-scripts.js"></script>

<!--script for this page-->
<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

<!--custom switch-->
<script src="assets/js/bootstrap-switch.js"></script>

<!--custom tagsinput-->
<script src="assets/js/jquery.tagsinput.js"></script>

<!--custom checkbox & radio-->

<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


<script src="assets/js/form-component.js"></script>    


<script>
  //custom select box

  $(function(){
      $('select.styled').customSelect();
  });

</script>
    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets copy/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets copy/js/pages-account-settings-account.js"></script>
  </body>
</html>

<?php } ?>