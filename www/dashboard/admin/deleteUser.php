<?php
session_start();
if (!(isset($_SESSION["username"]))) {
    header("Location: ./");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/vendor/mdbootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/vendor/mdbootstrap/css/mdb.min.css" type="text/css">
    <link rel="stylesheet" href="../../assets/vendor/mdbootstrap/css/style.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/sidenav.css" type="text/css">
    <link rel="stylesheet" href="../../assets/css/select.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" type="text/css">
    <script src="https://kit.fontawesome.com/4959a2c381.js" crossorigin="anonymous"></script>
    <title>ลบผู้ใช้ Admin</title>
</head>

<body>
    <div class="nav-side-menu">
        <div class="brand">ชื่อเว็บไซต์</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href="../dashboard.php">
                        <i class="fa fa-dashboard fa-lg"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="../login_history.php">
                        <i class="fa fa-history"></i> Login History
                    </a>
                </li>
                <li>
                    <a href="../settings.php">
                        <i class="fa fa-wrench fa-lg"></i> Settings
                    </a>
                </li>
                <?php
                if ($_SESSION["type"] == "super_admin") :
                ?>
                    <li data-toggle="collapse" data-target="#new" class="collapsed active">
                        <a href="#"><i class="fa fa-user-cog fa-lg"></i> Global Settings <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="new">
                        <li><a href="addUser.php">เพิ่มผู้ใช้</a></li>
                        <li><a href="editPassword.php">เปลี่ยนรหัสผู้ใช้</a></li>
                        <li class="active"><a href="deleteUser.php">ลบผู้ใช้</a></li>
                    </ul>
                <?php
                endif;
                ?>
                <li>
                    <a href="../../controller/login/logout.php">
                        <i class="fa fa-sign-out-alt fa-lg"></i> Logout
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div style="padding-left: 350px; padding-top: 30px; padding-right: 50px; width: 1000px;">
        <h1>ลบผู้ใช้</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <h4 style="padding-bottom: 20px;">สำหรับลบผู้ใช้งาน</h4>
                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="" method="post" enctype="multipart/form-data">
                    <!-- Old Password -->
                    <div class="md-form">
                        <select class="browser-default custom-select" id="username">
                            <option value="">กรุณาเลือกชื่อ</option>
                            <?php
                            require("../../controller/config/config.inc.php");
                            $config = new Config();
                            $db = $config->getDatabase();
                            $mysqli = new mysqli($db["host"], $db["username"], $db["passwd"], $db["dbname"], $db["port"]);
                            if (mysqli_connect_errno()) {
                                printf("Connect failed: %s\n", mysqli_connect_error());
                                $response['status'] = "error";
                                echo json_encode($response);
                                exit;
                            }
                            $stmt = $mysqli->prepare('SELECT * FROM auth');
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    if ($row["type"] == "admin") {
                                        echo "<option value='" . $row["username"] . "'>" . $row["username"] . "</option>";
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                </form>
                <!-- Sign up button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="button" id="btnSend">บันทึกข้อมูล / Submit</button>
            </div>
        </div>
    </div>
    <!-- JQuery -->
    <script type="text/javascript" src="../../assets/vendor/mdbootstrap/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../../assets/vendor/mdbootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../../assets/vendor/mdbootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../../assets/vendor/mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready(function() {
            $("#btnSend").click(function() {
                let username = $("#username").val();
                if (username == "") {
                    Swal.fire({
                        icon: "error",
                        title: "กรุณาใส่ข้อมูลให้ครบ",
                        text: "เพื่อทำรายการให้เสร็จ"
                    })
                    return;
                }
                Swal.fire({
                    title: 'คุณแน่ใจหรือ ?',
                    text: "ว่าจะลบผู้ใช้งาน " + username + " คุณจะไม่สามารถกู้กลับคืนมาได้",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ใช่ฉันมั่นใจ',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            dataType: 'json',
                            type: 'POST',
                            url: '../../controller/admin/deleteUser.php',
                            data: {
                                username: username,
                            },
                            success: function(result) {
                                if (result.status == "success") {
                                    Swal.fire({
                                        icon: "success",
                                        title: "ทำการลบข้อมูลสำเร็จ",
                                        text: "คุณได้ทำการเปลี่ยนรหัสผ่านสำเร็จ",
                                        onClose: () => {
                                            window.location.href = "./";
                                        }
                                    })
                                } else {
                                    Swal.fire({
                                        icon: "error",
                                        title: "เกิดข้อผิดพลาดบางประการ",
                                        text: "กรุณาติดต่อ Super Admin"
                                    })
                                }
                            }
                        })
                    }
                })
            });
        })
    </script>
</body>

</html>