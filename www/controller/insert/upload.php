<?php

session_start();

/* Getting file name */
$filename = $_FILES['file']['name'];
$filename = explode(".", $filename);

/* Location */
$realfileName = date("YmdHis") . "_" . md5($filename[0]);
$location = "../../uploads/" . $realfileName . "." . $filename[1];
$uploadOk = 1;
$imageFileType = pathinfo($location, PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("jpg", "jpeg", "png");
/* Check file extension */
if (!in_array(strtolower($imageFileType), $valid_extensions)) {
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $_SESSION["realFileName"] = "NoImage";
    $_SESSION["file_extension"] = "NoImage";
} else {
    /* Upload file */
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
        require('../config/config.inc.php');
        $_SESSION["realFileName"] = $realfileName;
        $_SESSION["file_extension"] = $filename[1];
    }
}
