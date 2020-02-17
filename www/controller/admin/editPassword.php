<?php
session_start();
require("../config/config.inc.php");
header('Content-type: application/json; charset=UTF-8');
$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$response = array();
$config = new Config();
$db = $config->getDatabase();
$mysqli = new mysqli($db["host"], $db["username"], $db["passwd"], $db["dbname"], $db["port"]);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    $response['status'] = "error";
    echo json_encode($response);
    exit;
}
$stmt = $mysqli->prepare('SELECT * FROM auth WHERE username = ?');
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $stmt->close();
        $updatePassword = $mysqli->prepare('UPDATE auth SET password = ? WHERE username = ?');
        $updatePassword->bind_param("ss", $password, $username);
        $updatePassword->execute();
        $updatePassword->close();
        $response["status"] = "success";
    }
} else {
    $response["status"] = "invalid";
}
$mysqli->close();
echo json_encode($response);
