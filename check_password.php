<?php include('controllerUserData.php'); ?>


<?php


$password = $_POST["password"];
$user_id = $_SESSION["id"];

$stmt = $pdo->prepare("SELECT password FROM users WHERE id = '$user_id'");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user["password"])) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
?>