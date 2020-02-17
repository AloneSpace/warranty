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
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/4959a2c381.js" crossorigin="anonymous"></script>
    <title>Check Warranty</title>
    <style>
        div.active-cardfooter {
            border-bottom: 1px solid blue;
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
                    <div class="card-footer text-muted text-center" onclick="document.location.href = '../';"><a href="../" style="color:gray">ลงทะเบียนรับประกันสินค้า Warranty Registration</a></div>
                </div>
                <div class="col">
                    <div class="card-footer text-muted text-center active-cardfooter"><a style="color:blue">เช็คสถานะการรับประกันสินค้า Check your Warranty Status</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="padding-top: 70px;">
        <!-- Card -->
        <div class="card">
            <h5 class="card-header info-color white-text text-center py-4">
                <strong>เช็คสถานะการรับประกันสินค้า<br>
                    Check your Warranty Status</strong>
            </h5>
            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="#!" method="POST" id="mySearchForm">

                    <!-- Check Status -->
                    <div class="md-form">
                        <input type="text" id="search" name="search" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                        <label for="search">รหัสชุดสินค้า / Serial Number *</label>
                    </div>

                </form>

                <!-- Sign up button -->
                <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="button" id="btnSend">ค้นหา / Search</button>
                <div id="status" style="padding-top: 20px;">
                </div>
                <!-- Form -->
            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- JQuery -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../assets/vendor/mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pickadate@5.0.0-prealpha.1/dist/pickadate/index.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnSend").click(function() {
                $.ajax({
                    type: 'post',
                    url: '../controller/search/search.php',
                    dataType: 'json',
                    data: $("#mySearchForm").serialize(),
                    success: function(response) {
                        if (response.status == "success") {
                            document.getElementById("status").innerHTML = "<font color='green'><i class='fa fa-check-circle fa-lg'></i> พบหมายเลขสินค้า " + response.serialNumber + " ในระบบ</font>";
                        } else {
                            document.getElementById("status").innerHTML = "<font color='red'><i class='fa fa-times-circle fa-lg'></i> ไม่ค้นพบรายการดังกล่าว</font>";
                        }
                    }
                })
            });
        });
    </script>
</body>

</html>