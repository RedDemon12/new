<?php include('controllerUserData.php'); ?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));
    $email = $data->email;

    $user_id = $_SESSION["id"];

 
    
    $con = new mysqli($servername, $username, $password, $dbname);
    
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    
    $stmt = $con->prepare("UPDATE users SET following = 1 WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    
    $stmt->execute();
    
    $stmt->close();
    $conn->close();
    
    $response = array("success" => true);
    echo json_encode($response);
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    header("Allow: POST");
    $response = array("error" => "Method not allowed");
    echo json_encode($response);
}



?>