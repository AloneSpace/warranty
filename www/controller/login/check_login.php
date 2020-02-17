<?php
require("../config/config.inc.php");
header('Content-type: application/json; charset=UTF-8');
$response = array();
$config = new Config();
$db = $config->getDatabase();
session_start();
$username = $_POST["username"];
$password = $_POST["password"];
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
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            $_SESSION["type"] = $row["type"];
            $date = date("d/m/Y H:i:s");
            $createLoginDate = $mysqli->prepare('INSERT INTO login_history (username, type, login_date) VALUES (?, ?, ?)');
            $createLoginDate->bind_param("sss", $_SESSION["username"], $_SESSION["type"], $date);
            $createLoginDate->execute();
            $createLoginDate->close();
            $stmt->close();
            $response["status"] = "success";
        } else {
            $response["status"] = "error";
        }
    }
}
$mysqli->close();
echo json_encode($response);
