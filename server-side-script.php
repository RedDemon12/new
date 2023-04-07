<?php 
include('controllerUserData.php'); 
var_dump($_POST);
$userId = $_SESSION['id'];


$user_id = $_POST['user_id'];



if(isset($_FILES['image'])) {
    // handle image upload
    $fileData = $_FILES['image'];
    $fileName = $fileData['name'];
    $tempName = $fileData['tmp_name'];
    $fileType = $fileData['type'];
    $fileSize = $fileData['size'];
    $fileError = $fileData['error'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    if ($fileError === UPLOAD_ERR_OK) {
      

      if ($fileExtension == "jpg")
       {
        $fileDestination = "messageimg/" . $fileName;
      move_uploaded_file($tempName, $fileDestination);
      $messageText = $fileDestination;
      $sql = "INSERT INTO message (mssg_by,mssg_to, message,time,type) VALUES ('$userId','$user_id', '$messageText',NOW(),'image')";
      $con->query($sql); 
    } else if ($fileExtension == "mp4") { 
      $fileDestination = "messagevideo/" . $fileName;
      move_uploaded_file($tempName, $fileDestination);
      $messageText = $fileDestination;
      $sql = "INSERT INTO message (mssg_by,mssg_to, message,time,type) VALUES ('$userId','$user_id', '$messageText',NOW(),'video')";
      $con->query($sql); 
    }  
    else if ($fileExtension == "mp3") { 
      $fileDestination = "messageaudio/" . $fileName;
      move_uploaded_file($tempName, $fileDestination);
      $messageText = $fileDestination;
      $sql = "INSERT INTO message (mssg_by,mssg_to, message,time,type) VALUES ('$userId','$user_id', '$messageText',NOW(),'audio')";
      $con->query($sql); 
    } 
    } else {
      // handle error
      $response = array("status" => "error", "message" => "Failed to upload image");
      echo json_encode($response);
      exit;
    }
} else if(isset($_POST['message'])){

    $messageText = $_POST['message'];
    $sql = "INSERT INTO message (mssg_by,mssg_to, message,time) VALUES ('$userId','$user_id', '$messageText',NOW())";
    $con->query($sql);

}else if(isset($_POST['message']) && isset($_FILES['image'])){

    $messageText = $_POST['message'];

}
else{
    // handle error
    $response = array("status" => "error", "message" => "No message or image received");
    echo json_encode($response);
    exit;
}



$con->close();

$response = array("status" => "success");
echo json_encode($response);
?>

