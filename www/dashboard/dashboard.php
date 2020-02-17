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
    <link rel="stylesheet" href="../assets/vendor/mdbootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/mdbootstrap/css/mdb.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/mdbootstrap/css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/sidenav.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/select.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" type="text/css">
    <script src="https://kit.fontawesome.com/4959a2c381.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>

<body>
    <!-- <div class="nav-side-menu">
        <div class="brand">Press Curing Control</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard fa-lg"></i> Dashboard
                    </a>
                </li>

                <li data-toggle="collapse" data-target="#products" class="collapsed active">
                    <a href="#"><i class="fa fa-gift fa-lg"></i> Anlagenauswahl <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="products">
                    <li class="active"><a href="#">RFT-H1</a></li>
                    <li><a href="#">RFT-H2</a></li>
                    <li><a href="#">BTB-H1</a></li>
                    <li><a href="#">BTB-H2</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#service" class="collapsed">
                    <a href="#"><i class="fa fa-globe fa-lg"></i> Auswertungen <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="service">
                    <li>Trendmonitoring</li>
                    <li>Alarmmonitoring</li>
                    <li>Audit-Trail</li>
                </ul>


                <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="#"><i class="fa fa-car fa-lg"></i> Reporting <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                    <li>Alarmstatistik</li>
                    <li>Prozessfähigkeit</li>
                </ul>


                <li>
                    <a href="#">
                        <i class="fa fa-user fa-lg"></i> Profile
                    </a>
                </li>

                <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="#"><i class="fa fa-car fa-lg"></i> Service <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="new">
                    <li>Sensorkonfiguration</li>
                    <li>Betriebsarten</li>
                </ul>

            </ul>
        </div>
    </div> -->
    <div class="nav-side-menu">
        <div class="brand">ชื่อเว็บไซต์</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li class="active">
                    <a href="#">
                        <i class="fa fa-dashboard fa-lg"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="login_history.php">
                        <i class="fa fa-history"></i> Login History
                    </a>
                </li>
                <li>
                    <a href="settings.php">
                        <i class="fa fa-wrench fa-lg"></i> Settings
                    </a>
                </li>
                <?php
                if ($_SESSION["type"] == "super_admin") :
                ?>
                    <li data-toggle="collapse" data-target="#new" class="collapsed">
                        <a href="#"><i class="fa fa-user-cog fa-lg"></i> Global Settings <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="new">
                        <li><a href="./admin/addUser.php">เพิ่มผู้ใช้</a></li>
                        <li><a href="./admin/editPassword.php">เปลี่ยนรหัสผู้ใช้</a></li>
                        <li><a href="./admin/deleteUser.php">ลบผู้ใช้</a></li>
                    </ul>
                <?php
                endif;
                ?>
                <li>
                    <a href="../controller/login/logout.php">
                        <i class="fa fa-sign-out-alt fa-lg"></i> Logout
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div style="padding-left: 350px; padding-top: 30px; padding-right: 50px;">
        <h1>ประกัน</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <h4 style="padding-bottom: 20px;">รายการประกันทั้งหมด</h4>
                <!-- <div class="row">
                    <div class="col-sm-10">
                        <label for="order">แสดง</label>
                        <span>
                            <div class="select" style="width: 60px;">
                                <select class="select-text" required style="width: 60px;" id="order">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span class="select-highlight" style="width: 60px;"></span>
                                <span class="select-bar" style="width: 60px;"></span>
                            </div>
                        </span>
                        <label for="order" style="padding-left: 10px;">รายการ</label>
                    </div>
                    <div class="col">
                        <label for="order">ค้นหา: </label>
                        <span>
                            <input type="text" id="exampleForm2" class="form-control">
                        </span>
                    </div>
                </div> -->
                <table id="dashboard" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">เลขที่ใบรับประกัน</th>
                            <th scope="col">รหัสชุดสินค้า</th>
                            <th scope="col">วันที่ซื้อ</th>
                            <th scope="col">ผู้ที่ซื้อ</th>
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">โทรศัพท์</th>
                            <th scope="col">ร้านค้า</th>
                            <th scope="col">รูปภาพ</th>
                            <th scope="col">แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require("../controller/config/config.inc.php");
                        $config = new Config();
                        $db = $config->getDatabase();
                        $mysqli = new mysqli($db["host"], $db["username"], $db["passwd"], $db["dbname"], $db["port"]);
                        if (mysqli_connect_errno()) {
                            printf("Connect failed: %s\n", mysqli_connect_error());
                            $response['status'] = "error";
                            echo json_encode($response);
                            exit;
                        }
                        $stmt = $mysqli->prepare('SELECT * FROM db');
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $count = 0;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . ($count + 1) . "</td>";
                                echo "<td>" . $row["warranty_number"] . "</td>";
                                echo "<td>" . $row["serial_number"] . "</td>";
                                echo "<td>" . $row["purchase_date"] . "</td>";
                                echo "<td>" . $row["customer"] . "</td>";
                                echo "<td>" . $row["address"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td><b>เบอร์มือถือ: </b>" . $row["mobile"] . "<br><b>โทรศัพท์: </b>" . $row["phone"] . "</td>";
                                echo "<td><b>รหัสร้านค้า: </b>" . $row["shop_name"] . "<br><b>รหัสพนักงาน: </b>" . $row["staff_id"] . "</td>";
                                // echo "<td><center><a href='#' onclick='openImg(" . $row["image"] . ");'><i class='fa fa-image fa-3x'></i></a></center></td>";
                                if ($row["image"] == "NoImage") {
                                    echo "<td><i class='fas fa-image fa-5x'></i></td>";
                                } else {
                                    echo "<td><img src='../uploads/" . $row["image"] . "." . $row["file_extension"] . "' width='45' height='45'></td>";
                                }
                                echo '<td><center><a class="btn btn-warning" href="edit.php?id=' . $row["id"] . '"><i class="fas fa-pencil-alt"></i></a>&nbsp;<a class="btn btn-danger" onclick="deleteRecord(' . $row["id"] . ')"><i class="fas fa-trash"></i></a></center></td>';
                                echo "</tr>";
                                $count++;
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">เลขที่ใบรับประกัน</th>
                            <th scope="col">รหัสชุดสินค้า</th>
                            <th scope="col">วันที่ซื้อ</th>
                            <th scope="col">ผู้ที่ซื้อ</th>
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">โทรศัพท์</th>
                            <th scope="col">ร้านค้า</th>
                            <th scope="col">รูปภาพ</th>
                            <th scope="col">แก้ไข</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- JQuery -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready(function() {
            $('#dashboard').DataTable();
        })

        function deleteRecord(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'คุณแน่ใจหรือที่จะลบข้อมูลส่วนนี้',
                text: "คุณจะไม่สามารถกู้กลับคืนมาได้",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ยืนยันที่จะลบ',
                cancelButtonText: 'ยกเลิก',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'post',
                        url: "../controller/database/deleteRecord.php",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'ขอแสดงความยินดี',
                                    text: 'คุณทำการลบข้อมูลสำเร็จ'
                                }).then((result) => {
                                    window.location.href = "./";
                                });
                            }
                        }
                    })
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'ยกเลิกการลบ',
                        'ไฟล์ของคุณปลอดภัย',
                        'error'
                    )
                }
            })
        }
    </script>
</body>

</html>