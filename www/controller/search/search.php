<?php

require("../config/config.inc.php");
header('Content-type: application/json; charset=UTF-8');
session_start();

//Serial, Email, Mobile, Phone
$response = array();
$search = $_POST["search"];
$config = new Config();
$db = $config->getDatabase();
$mysqli = new mysqli($db["host"], $db["username"], $db["passwd"], $db["dbname"], $db["port"]);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    $response['status'] = "error";
    echo json_encode($response);
    exit;
}
$stmt = $mysqli->prepare('SELECT * FROM db WHERE serial_number = ?');
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response["status"] = "success";
        $response["serialNumber"] = $row["serial_number"];
    }
} else {
    $response["status"] = "invalid";
}
echo json_encode($response);
