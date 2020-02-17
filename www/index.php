<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/vendor/mdbootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/mdbootstrap/css/mdb.min.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/mdbootstrap/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/css/checkbox.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.standalone.min.css" type="text/css">
    <script src="https://kit.fontawesome.com/4959a2c381.js" crossorigin="anonymous"></script>
    <title>Warranty Portal</title>
    <style>
        div.active-cardfooter {
            border-bottom: 1px solid blue;
        }

        .btn-link:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        h4 {
            font-weight: bold;
        }

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

<body bgcolor="gray">
    <div class="container" style="padding-top: 50px;">
        <div class="card">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>ใส่รูปภาพ<br>
            </h5>
            <div class="row no-gutters">
                <div class="col">
                    <div class="card-footer text-muted text-center active-cardfooter"><a style="color:blue">ลงทะเบียนรับประกันสินค้า Warranty Registration</a></div>
                </div>
                <div class="col">
                    <div class="card-footer text-muted text-center" onclick="document.location.href = 'check/';"><a href="check/" style="color:gray">เช็คสถานะการรับประกันสินค้า Check your Warranty Status</a></div>
                </div>
            </div>
            <!-- <div class="card-footer text-muted text-center">
                <div class="row">
                    <div class="col active"><a>ลงทะเบียนรับประกันสินค้า Warranty Registration</a></div>
                    <div class="col">Thanos</div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="container" style="padding-top: 70px;">
        <!-- Card -->
        <div class="card">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>ลงทะเบียนรับประกันสินค้า<br>
                    Warranty Registration</strong>
            </h5>
            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="" method="post" enctype="multipart/form-data">

                    <!-- Warranty_number -->
                    <div class="md-form">
                        <input type="text" id="warranty_number" name="warranty_number" class="form-control">
                        <label for="warranty_number">เลขที่ใบรับประกัน / Warranty Number *</label>
                        <div id="warranty_validate" style="text-align: left;"></div>
                    </div>

                    <!-- Serial_Number -->
                    <div class="md-form">
                        <input type="text" id="serial_number" name="serial_number" class="form-control">
                        <label for="serial_number">รหัสชุดสินค้า / Serial Number *</label>
                        <div id="serial_validate" style="text-align: left;"></div>
                    </div>

                    <!-- Date -->
                    <div class="md-form">
                        <input type="text" id="purchase_date" name="purchase_date" class="form-control dateselect" required="required">
                        <label for="purchase_date">วันที่ซื้อ / Purchase Date</label>
                    </div>

                    <!-- Customer -->
                    <div class="md-form">
                        <input type="text" id="customer" name="customer" class="form-control">
                        <label for="customer">ผู้ซื้อ / Customer's Name *</label>
                    </div>

                    <!-- Address -->
                    <div class="md-form">
                        <input type="text" id="address" name="address" class="form-control">
                        <label for="address">ที่อยู่ / Address *</label>
                    </div>

                    <!-- E-mail -->
                    <div class="md-form">
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="email">อีเมล / Email *</label>
                        <div id="email_validate" style="text-align: left;"></div>
                    </div>

                    <!-- Form-row -->
                    <div class="form-row">
                        <div class="col">
                            <!-- Moblie -->
                            <div class="md-form">
                                <input type="text" id="mobile" name="mobile" class="form-control" required>
                                <label for="mobile">โทรศัพท์มือถือ / Mobile *</label>
                                <div id="mobile_validate" style="text-align: left;"></div>
                            </div>
                        </div>
                        <div class="col">
                            <!-- phone -->
                            <div class="md-form">
                                <input type="text" id="phone" name="phone" class="form-control">
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
                                <input type="text" id="shop_name" name="shop_name" class="form-control">
                                <label for="shop_name">ร้านค้าที่ซื้อสินค้า / Shop Name (Optional)</label>
                            </div>
                        </div>
                        <div class="col">
                            <!-- phone -->
                            <div class="md-form">
                                <input type="text" id="staff_id" name="staff_id" class="form-control">
                                <label for="staff_id">รหัสพนักงานขาย / Staff ID (Optional)</label>
                            </div>
                        </div>
                    </div>

                    <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        <font color="red">กรุณาอัพโหลดภาพถ่ายใบเสร็จ จากร้านค้าที่ท่านลูกค้าได้ซื้อของนั้นๆ ให้ชัดเจน เพื่อความรวดเร็วในการตรวจสอบ / Please upload a clear visible receipt from you retailer shop
                        </font>
                    </small>

                </form>

                <div class="upload-btn-wrapper">
                    <button class="btn btn-light">อัพโหลดภาพถ่ายใบเสร็จ / Upload Receipt</button>
                    <input type="file" id="file" name="file" accept=".png, .jpg, .jpeg" />
                    <span id="image"></span>
                </div><br><br>

                <a class="btn btn-link" style="color:blue;" href="#">เงื่อนไขการรับประกัน / Terms and Conditions of Warranty</a> <br><br>
                <label class="pure-material-checkbox">
                    <input type="checkbox" id="accept">
                    <span>ยอมรับเงื่อนไขการรับประกัน / Agree with Terms & Conditions of Warranty</span>
                </label>
                <!-- Sign up button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="button" id="btnSend">บันทึกข้อมูล / Submit</button>
                <!-- Form -->
            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- Central Modal Medium Info -->
    <!-- JQuery -->
    <script type="text/javascript" src="assets/vendor/mdbootstrap/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="assets/vendor/mdbootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="assets/vendor/mdbootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="assets/vendor/mdbootstrap/js/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dateselect').datepicker({
                format: 'dd/mm/yyyy',
            });
            $("#btnSend").click(function() {
                var notvalid = false;
                let accept = document.getElementById("accept").checked;
                if (accept == false) {
                    Swal.fire(
                        'กรุณากด "ยอมรับเงื่อนไขรับประกัน"',
                        'เพื่อบันทึกข้อมูลลงไป',
                        'error'
                    )
                    return;
                }
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
                    var fd = new FormData();
                    var files = $('#file')[0].files[0];
                    fd.append('file', files);
                    $.ajax({
                        type: 'post',
                        url: './controller/insert/upload.php',
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response) {

                        }
                    })
                    $.ajax({
                        type: 'POST',
                        url: './controller/insert/insert.php',
                        data: {
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
                            console.log(result);
                            if (result.status == "success") {
                                Swal.fire({
                                    icon: "success",
                                    title: "ทำการเพิ่มข้อมูลสำเร็จ",
                                    onClose: () => {
                                        window.location.href = "./";
                                    }
                                })
                            }
                        }
                    });
                }
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#file').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    $("#image").text(data[0].name); //create image element 
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
    <script type="text/javascript" src="assets/js/bootstrap-datepicker.min.js"></script>
</body>

</html>