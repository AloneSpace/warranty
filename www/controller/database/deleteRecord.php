<?php
require("../config/config.inc.php");
header('Content-type: application/json; charset=UTF-8');
$id = $_POST["id"];
$config = new Config();
$db = $config->getDatabase();
$mysqli = new mysqli($db["host"], $db["username"], $db["passwd"], $db["dbname"], $db["port"]);
if ($mysqli->connect_error) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    exit;
}
$sql = "DELETE FROM db WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $id);
$stmt->execute();
$stmt->close();
$mysqli->close();
$response["status"] = "success";
echo json_encode($response);