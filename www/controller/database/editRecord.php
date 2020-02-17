<?php
require("../config/config.inc.php");
header('Content-type: application/json; charset=UTF-8');
$id = $_POST["id"];
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
$config = new Config();
$db = $config->getDatabase();
$mysqli = new mysqli($db["host"], $db["username"], $db["passwd"], $db["dbname"], $db["port"]);
if ($mysqli->connect_error) {
    die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    exit;
}
$sql = "UPDATE db SET warranty_number = ?, serial_number = ?, purchase_date = ?, customer = ?, address = ?, email = ?, mobile = ?, phone = ?, shop_name = ?, staff_id = ? WHERE id = ? ";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sssssssssss", $warranty_number, $serial_number, $purchase_date, $customer, $address, $email, $mobile, $phone, $shop_name, $staff_id, $id);
$stmt->execute();
$stmt->close();
$mysqli->close();
$response["status"] = "success";
echo json_encode($response);
