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
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.standalone.min.css" type="text/css">
    <title>Edit</title>
    <style>
        /*Bootstrap Calendar*/
        .datepicker {
            border-radius: 0;
            padding: 0;
        }

        .datepicker-days table thead,
        .datepicker-days table tbody,
        .datepicker-days table tfoot {
            padding: 10px;
            display: list-item;
        }

        .datepicker-days table thead,
        .datepicker-months table thead,
        .datepicker-years table thead,
        .datepicker-decades table thead,
        .datepicker-centuries table thead {
            background: #3546b3;
            color: #ffffff;
            border-radius: 0;
        }

        .datepicker-days table thead tr:nth-child(2n+0) td,
        .datepicker-days table thead tr:nth-child(2n+0) th {
            border-radius: 3px;
        }

        .datepicker-days table thead tr:nth-child(3n+0) {
            text-transform: uppercase;
            font-weight: 300 !important;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
        }

        .table-condensed>tbody>tr>td,
        .table-condensed>tbody>tr>th,
        .table-condensed>tfoot>tr>td,
        .table-condensed>tfoot>tr>th,
        .table-condensed>thead>tr>td,
        .table-condensed>thead>tr>th {
            padding: 11px 13px;
        }

        .datepicker-months table thead td,
        .datepicker-months table thead th,
        .datepicker-years table thead td,
        .datepicker-years table thead th,
        .datepicker-decades table thead td,
        .datepicker-decades table thead th,
        .datepicker-centuries table thead td,
        .datepicker-centuries table thead th {
            border-radius: 0;
        }

        .datepicker td,
        .datepicker th {
            border-radius: 50%;
            padding: 0 12px;
        }

        .datepicker-days table thead,
        .datepicker-months table thead,
        .datepicker-years table thead,
        .datepicker-decades table thead,
        .datepicker-centuries table thead {
            background: #3546b3;
            color: #ffffff;
            border-radius: 0;
        }

        .datepicker table tr td.active,
        .datepicker table tr td.active:hover,
        .datepicker table tr td.active.disabled,
        .datepicker table tr td.active.disabled:hover {
            background-image: none;
        }

        .datepicker .prev,
        .datepicker .next {
            color: rgba(255, 255, 255, 0.5);
            transition: 0.3s;
            width: 37px;
            height: 37px;
        }

        .datepicker .prev:hover,
        .datepicker .next:hover {
            background: transparent;
            color: rgba(255, 255, 255, 0.99);
            font-size: 21px;
        }

        .datepicker .datepicker-switch {
            font-size: 24px;
            font-weight: 400;
            transition: 0.3s;
        }

        .datepicker .datepicker-switch:hover {
            color: rgba(255, 255, 255, 0.7);
            background: transparent;
        }

        .datepicker table tr td span {
            border-radius: 2px;
            margin: 3%;
            width: 27%;
        }

        .datepicker table tr td span.active,
        .datepicker table tr td span.active:hover,
        .datepicker table tr td span.active.disabled,
        .datepicker table tr td span.active.disabled:hover {
            background-color: #3546b3;
            background-image: none;
        }

        .dropdown-menu {
            border: 1px solid rgba(0, 0, 0, .1);
            box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        }

        .datepicker-dropdown.datepicker-orient-top:before {
            border-top: 7px solid rgba(0, 0, 0, .1);
        }
    </style>
</head>

<body>
    <div class="nav-side-menu">
        <div class="brand">ชื่อเว็บไซต์</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href="dashboard.php">
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
        <h1>แก้ไขประกัน</h1>
        <hr>
        <div class="card">
            <div class="card-body">
                <h4 style="padding-bottom: 20px;">แก้ไขรายการ</h4>
                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="" method="post" enctype="multipart/form-data">
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
                    $stmt = $mysqli->prepare('SELECT * FROM db WHERE id = ?');
                    $stmt->bind_param("s", $_GET["id"]);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) :
                        while ($row = $result->fetch_assoc()) :
                    ?>

                            <!-- Warranty_number -->
                            <div class="md-form">
                                <input type="hidden" id="id" name="id" value="<?php echo $_GET["id"]; ?>">
                                <input type="text" id="warranty_number" name="warranty_number" class="form-control" value="<?php echo $row["warranty_number"]; ?>">
                                <label for="warranty_number">เลขที่ใบรับประกัน / Warranty Number *</label>
                                <div id="warranty_validate" style="text-align: left;"></div>
                            </div>

                            <!-- Serial_Number -->
                            <div class="md-form">
                                <input type="text" id="serial_number" name="serial_number" class="form-control" value="<?php echo $row["serial_number"]; ?>">
                                <label for="serial_number">รหัสชุดสินค้า / Serial Number *</label>
                                <div id="serial_validate" style="text-align: left;"></div>
                            </div>

                            <!-- Date -->
                            <div class="md-form">
                                <input type="text" id="purchase_date" name="purchase_date" class="form-control dateselect" required="required" value="<?php echo $row["purchase_date"]; ?>">
                                <label for="purchase_date">วันที่ซื้อ / Purchase Date</label>
                            </div>
                            <!-- Customer -->
                            <div class="md-form">
                                <input type="text" id="customer" name="customer" class="form-control" value="<?php echo $row["customer"]; ?>">
                                <label for="customer">ผู้ซื้อ / Customer's Name *</label>
                            </div>

                            <!-- Address -->
                            <div class="md-form">
                                <input type="text" id="address" name="address" class="form-control" value="<?php echo $row["address"]; ?>">
                                <label for="address">ที่อยู่ / Address *</label>
                            </div>

                            <!-- E-mail -->
                            <div class="md-form">
                                <input type="text" id="email" name="email" class="form-control" value="<?php echo $row["email"]; ?>">
                                <label for="email">อีเมล / Email *</label>
                                <div id="email_validate" style="text-align: left;"></div>
                            </div>

                            <!-- Form-row -->
                            <div class="form-row">
                                <div class="col">
                                    <!-- Moblie -->
                                    <div class="md-form">
                                        <input type="text" id="mobile" name="mobile" class="form-control" value="<?php echo $row["mobile"]; ?>">
                                        <label for="mobile">โทรศัพท์มือถือ / Mobile *</label>
                                        <div id="mobile_validate" style="text-align: left;"></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- phone -->
                                    <div class="md-form">
                                        <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $row["phone"]; ?>">
                                        <label for="phone">โทรศัพท์ / Phone</label>
                                        <div id="phone_validate" style="text-align: left;"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form-row -->
                            <div class="form-row">
                                <div class="col">
                                    <!-- Moblie -->
                                    <div class="md-form">
                                        <input type="text" id="shop_name" name="shop_name" class="form-control" value="<?php echo $row["shop_name"]; ?>">
                                        <label for="shop_name">ร้านค้าที่ซื้อสินค้า / Shop Name (Optional)</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <!-- phone -->
                                    <div class="md-form">
                                        <input type="text" id="staff_id" name="staff_id" class="form-control" value="<?php echo $row["staff_id"]; ?>">
                                        <label for="staff_id">รหัสพนักงานขาย / Staff ID (Optional)</label>
                                    </div>
                                </div>
                            </div>
                            <img width="1024" height="768" style="object-fit: cover;" src="../uploads/<?php echo $row["image"] ?>.<?php echo $row["file_extension"]; ?>">
                    <?php
                        endwhile;
                    endif;
                    $stmt->close();
                    $mysqli->close();
                    ?>
                </form>
                <!-- Sign up button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="button" id="btnSend">บันทึกข้อมูล / Submit</button>
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
    <script type="text/javascript" src="../assets/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dateselect').datepicker({
                format: 'dd/mm/yyyy',
            });
            $("#btnSend").click(function() {
                var notvalid = false;
                let id = document.getElementById("id").value;
                let warranty_number = document.getElementById("warranty_number").value;
                if (isNaN(warranty_number)) {
                    document.getElementById("warranty_validate").innerHTML = "<font color='red' style=''><i class='fas fa-times'></i> กรุณากรอก Warranty Number ให้อยู่ในรูปของตัวเลข</font>";
                    notvalid = true;
                }
                let serial_number = document.getElementById("serial_number").value;
                if (isNaN(serial_number)) {
                    document.getElementById("serial_validate").innerHTML = "<font color='red' style=''><i class='fas fa-times'></i> กรุณากรอก Serial Number ให้อยู่ในรูปของตัวเลข</font>";
                    notvalid = true;
                }
                // let item_number = document.getElementById("item_number").value;
                let customer = document.getElementById("customer").value;
                let address = document.getElementById("address").value;
                let email = document.getElementById("email").value;
                if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
                    document.getElementById("email_validate").innerHTML = "<font color='red' style=''><i class='fas fa-times'></i> กรุณากรอกรูปแบบ E-mail ให้ถูกต้อง</font>";
                    notvalid = true;
                }
                let mobile = document.getElementById("mobile").value;
                if (isNaN(mobile)) {
                    document.getElementById("mobile_validate").innerHTML = "<font color='red' style=''><i class='fas fa-times'></i> กรุณากรอกโทรศัพท์มือถือให้อยู่ในรูปแบบตัวเลข</font>";
                    notvalid = true;
                } else {
                    if (mobile.length != 10) {
                        document.getElementById("mobile_validate").innerHTML = "<font color='red' style=''><i class='fas fa-times'></i> กรุณากรอกโทรศัพท์มือถือจำนวน 10 หลัก</font>";
                        notvalid = true;
                    } else {
                        notvalid = false;
                    }
                }
                let purchase_date = document.getElementById("purchase_date").value;
                let phone = document.getElementById("phone").value;
                if (isNaN(phone)) {
                    document.getElementById("phone_validate").innerHTML = "<font color='red' style=''><i class='fas fa-times'></i> กรุณากรอกโทรศัพท์ให้อยู่ในรูปแบบตัวเลข</font>";
                    notvalid = true;
                }
                let shop_name = document.getElementById("shop_name").value;
                let staff_id = document.getElementById("staff_id").value;
                if (notvalid == false) {
                    if ((warranty_number == "") || (serial_number == "") || (customer == "") || (address == "") || (email == "") || (mobile == "")) {
                        Swal.fire(
                            'กรุณากรอกข้อมูลที่ * ให้ครบ',
                            'เพื่อบันทึกข้อมูลลงไป',
                            'error'
                        )
                        return;
                    }
                    $.ajax({
                        type: "post",
                        url: "../controller/database/editRecord.php",
                        data: {
                            id: id,
                            warranty_number: warranty_number,
                            serial_number: serial_number,
                            customer: customer,
                            address: address,
                            email: email,
                            mobile: mobile,
                            purchase_date: purchase_date,
                            phone: phone,
                            shop_name: shop_name,
                            staff_id: staff_id,
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.status == "success") {
                                Swal.fire({
                                    icon: "success",
                                    title: "ทำการแก้ไขข้อมูลสำเร็จ",
                                    onClose: () => {
                                        window.location.href = "./";
                                    }
                                })
                            }
                        }
                    })
                }
            });
        })
    </script>
</body>

</html>