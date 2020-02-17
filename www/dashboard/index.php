<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: ./dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/vendor/mdbootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/mdbootstrap/css/mdb.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/mdbootstrap/css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/checkbox.css" type="text/css">
    <script src="https://kit.fontawesome.com/4959a2c381.js" crossorigin="anonymous"></script>
    <title>Login | Dashboard</title>
</head>

<body>
    <div class="container" style="padding-top: 250px;">
        <center>
            <div class="card" style="width: 500px;">
                <h5 class="card-header info-color white-text text-center py-4">
                    <strong><i class="fas fa-database" style="padding-right: 20px;"></i> Login เข้าสู่ระบบ</strong><br>
                </h5>
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <center>
                        <form class="text-center" style="color: #757575;" action="" method="POST" id="login">
                            <div class="md-form">
                                <input type="text" id="username" name="username" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" style="width: 400px;">
                                <label for="username"><i class="fas fa-user-alt" style="padding-right: 5px;"></i> Username</label>
                            </div>
                            <div class="md-form">
                                <input type="password" id="password" name="password" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock" style="width: 400px;">
                                <label for="password"><i class="fas fa-lock" style="padding-right: 5px;"></i> Password</label>
                            </div>
                            <button type="button" class="btn btn-primary" id="btnSend"><i class="fas fa-door-open" style="padding-right: 5px;"></i> เข้าสู่ระบบ</button>
                        </form>
                    </center>
                </div>
            </div>
        </center>
    </div>
    <!-- JQuery -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready(function() {
            $("#btnSend").click(function() {
                $.ajax({
                    type: 'post',
                    url: '../controller/login/check_login.php',
                    dataType: 'json',
                    data: $("#login").serialize(),
                    success: function(result) {
                        console.log("Hello, World");
                        if (result.status == "success") {
                            Swal.fire({
                                icon: "success",
                                title: "เข้าสู่ระบบสำเร็จ",
                                text: "ยินดีต้อนรับคุณ " + document.getElementById("username").value,
                                onClose: () => {
                                    window.location.href = "./dashboard.php";
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "เข้าสู่ระบบไม่สำเร็จ",
                                text: "คุณใช้ชื่อผู้ใช้งาน/รหัสผ่าน ผิด"
                            })
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>