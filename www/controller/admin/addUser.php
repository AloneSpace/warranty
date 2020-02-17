<?php
session_start();
require("../config/config.inc.php");
header('Content-type: application/json; charset=UTF-8');
$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$type = "admin";
$date = date("d/m/Y H:i:s");
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
    $response["status"] = "exist";
} else {
    $insertDB = $mysqli->prepare("INSERT INTO auth (username, password, type, created_in) VALUES (?, ?, ?, ?)");
    $insertDB->bind_param("ssss", $username, $password, $type, $date);
    $insertDB->execute();
    $insertDB->close();
    $response["status"] = "success";
}
$stmt->close();
$mysqli->close();
echo json_encode($response);
