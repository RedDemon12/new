<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

$user_agent = $_SERVER['HTTP_USER_AGENT'];
$browser = "Unknown";
$os_platform  = "Unknown OS Platform";
$os_array = array(
    '/windows nt 10/i'      =>  'Windows 10',
    '/windows nt 6.3/i'     =>  'Windows 8.1',
    '/windows nt 6.2/i'     =>  'Windows 8',
    '/windows nt 6.1/i'     =>  'Windows 7',
    '/windows nt 6.0/i'     =>  'Windows Vista',
    '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
    '/windows nt 5.1/i'     =>  'Windows XP',
    '/windows xp/i'         =>  'Windows XP',
    '/windows nt 5.0/i'     =>  'Windows 2000',
    '/windows me/i'         =>  'Windows ME',
    '/win98/i'              =>  'Windows 98',
    '/win95/i'              =>  'Windows 95',
    '/win16/i'              =>  'Windows 3.11',
    '/macintosh|mac os x/i' =>  'Mac OS X',
    '/mac_powerpc/i'        =>  'Mac OS 9',
    '/linux/i'              =>  'Linux',
    '/ubuntu/i'             =>  'Ubuntu',
    '/iphone/i'             =>  'iPhone',
    '/ipod/i'               =>  'iPod',
    '/ipad/i'               =>  'iPad',
    '/android/i'            =>  'Android',
    '/blackberry/i'         =>  'BlackBerry',
    '/webos/i'              =>  'Mobile'
);

foreach ($os_array as $regex => $value) {
    if (preg_match($regex, $user_agent)) {
        $os_platform = $value;
    }
}


if (preg_match('/MSIE/i', $user_agent) && !preg_match('/Opera/i', $user_agent)) {
    $browser = 'Internet Explorer';
} elseif (preg_match('/Firefox/i', $user_agent)) {
    $browser = 'Mozilla Firefox';
} elseif (preg_match('/Chrome/i', $user_agent)) {
    $browser = 'Google Chrome';
} elseif (preg_match('/Safari/i', $user_agent)) {
    $browser = 'Apple Safari';
} elseif (preg_match('/Opera/i', $user_agent)) {
    $browser = 'Opera';
} elseif (preg_match('/Netscape/i', $user_agent)) {
    $browser = 'Netscape';
}
date_default_timezone_set('Asia/Kolkata');// change according timezone

include_once 'gpConfig.php';
include_once 'User.php';

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered already exist!";
    }
    $name_check = "SELECT * FROM users WHERE username = '$name'";
    $res = mysqli_query($con, $name_check);
    if(mysqli_num_rows($res) > 0){
        $errors['name'] = "Name that you have entered already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(9999, 1111);
        $status = "notverified";
        $insert_data = "INSERT INTO users (username, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: shahiprem7890@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $date = date('Y-m-d H:i:s');

                $stmt1 = $con->prepare("UPDATE users SET signup = ? WHERE email = ?");
                $stmt1->bind_param("ss", $date, $email);
                $stmt1->execute();
                $stmt1->close();

                $stmt2 = $con->prepare("UPDATE users SET pri_os = ?, pri_browser = ? WHERE email = ?");
                $stmt2->bind_param("sss", $os_platform, $browser, $email);
                $stmt2->execute();
                $stmt2->close();


             header('location: login-user.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            $id = $fetch['id'];
            $username = $fetch['username'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  $_SESSION['id'] = $id;
                  $_SESSION['username'] = $username;

                  $curdate = date('Y-m-d H:i:s');
                  $stmt1 = $con->prepare("UPDATE users SET last_login = ? WHERE email = ?");
                  $stmt1->bind_param("ss", $curdate, $email);
                  $stmt1->execute();
                  $stmt1->close();

                  $stmt2 = $con->prepare("INSERT INTO login (user_id, time,os,browser) VALUES (?, ?, ?, ?)");
                  $stmt2->bind_param("isss", $id, $curdate, $os_platform, $browser);
                  $stmt2->execute();
                  $stmt2->close();

                  
            
                   header('location: home.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the above link to signup.";
        }
    }



        //if admin click login button

    
        if(isset($_POST['adlogin'])){
            $email = mysqli_real_escape_string($con, $_POST['aemail']);
            $password = mysqli_real_escape_string($con, $_POST['apassword']);
            $check_email = "SELECT * FROM admin WHERE email = '$email'";
            $res = mysqli_query($con, $check_email);
            if(mysqli_num_rows($res) > 0){
                $fetch = mysqli_fetch_assoc($res);
                $fetch_pass = $fetch['password'];
                if($password == $fetch_pass){
                    $_SESSION['aemail'] = $email;
                    $_SESSION['apassword'] = $password;
                        header('location: adminhome.php');
                }else{
                    $errors['aemail'] = "Incorrect email or password!";
                }
            }else{
                $errors['aemail'] = "Unauthorized Admin";
            }
        }



    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(9999, 1111);
            $insert_code = "UPDATE users SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: shahiprem7890@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password has been changed. Now you can Login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }



   




?>