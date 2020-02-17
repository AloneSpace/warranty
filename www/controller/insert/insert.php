<?php
require("../config/config.inc.php");
header('Content-type: application/json; charset=UTF-8');
session_start();
$response = array();
$warranty_number = $_POST["warranty_number"];
$serial_number = $_POST["serial_number"];
$purchase_date = $_POST["purchase_date"];
$customer = $_POST["customer"];
$address = $_POST["address"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$phone = $_POST["phone"];
$shop_name = $_POST["shop_name"];
$staff_id = $_POST["staff_id"];
$image = $_SESSION["realFileName"];
$file_extension = $_SESSION["file_extension"];
$config = new Config();
$db = $config->getDatabase();
$mysqli = new mysqli($db["host"], $db["username"], $db["passwd"], $db["dbname"], $db["port"]);
if ($mysqli->connect_error) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    exit;
}
$sql = "INSERT INTO db (warranty_number, serial_number, purchase_date, customer, address, email, mobile, phone, shop_name, staff_id, image, file_extension) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssssssssssss", $warranty_number, $serial_number, $purchase_date, $customer, $address, $email, $mobile, $phone, $shop_name, $staff_id, $image, $file_extension);
if ($stmt->execute()) {
    $response["status"] = "success";
} else {
    $response["status"] = "error";
}
$stmt->close();
$mysqli->close();
echo json_encode($response);
