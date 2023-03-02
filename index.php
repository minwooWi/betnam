<?php
//including the database connection file
include_once("./datasource/config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM golf_reservation_info"); // using mysqli_query instead
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Manage Reservation</title>

    <!-- Custom fonts for this template -->
    <link href="https://cdn.jsdelivr.net/gh/sunn-us/SUIT/fonts/static/woff2/SUIT.css" rel="stylesheet">
    <style> * {font-family: 'SUIT', sans-serif;} </style>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Manage Reservation</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="regist.html?crud=c&type=golf">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>골프 정보 입력</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="regist.html?crud=c&type=hotel">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>호텔 정보 입력</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="regist.html?crud=c&type=tour">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>투어 정보 입력</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Dashboard -->
<!--        <li class="nav-item active">-->
<!--            <a class="nav-link" href="regist.html?crud=c&type=vehicle">-->
<!--                <i class="fas fa-fw fa-tachometer-alt"></i>-->
<!--                <span>차량 정보 입력</span></a>-->
<!--        </li>-->
<!---->
<!--            &lt;!&ndash; Divider &ndash;&gt;-->
<!--        <hr class="sidebar-divider">-->

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="regist.html?crud=c&type=total">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>혼합 일괄 입력</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">골프 예약 정보 리스트</h1>
                <p class="mb-4">고객정보 및 골프장 예약정보 리스트 입니다.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>골프 예약 번호</th>
                                    <th>골프</th>
                                    <th>업체정보</th>
                                    <th>예약 일정</th>
                                    <th>티옵시간</th>
                                    <th>홀</th>
                                    <th>인원수</th>
                                    <th>포함사항</th>
                                    <th>노트</th>
                                    <th>Update</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>골프 예약 번호</th>
                                    <th>골프</th>
                                    <th>업체정보</th>
                                    <th>예약 일정</th>
                                    <th>티옵시간</th>
                                    <th>홀</th>
                                    <th>인원수</th>
                                    <th>포함사항</th>
                                    <th>노트</th>
                                    <th>Update</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
                                while($res = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>".$res['reservation_number']."</td>";
                                    echo "<td>".$res['golf_course_name']."</td>";
                                    echo "<td>".$res['golf_company_info']."</td>";
                                    echo "<td>".$res['reservation_schedule']."</td>";
                                    echo "<td>".$res['tee_time']."</td>";
                                    echo "<td>".$res['hole']."</td>";
                                    echo "<td>".$res['headcount']."</td>";
                                    echo "<td>".$res['included_items']."</td>";
                                    echo "<td>".$res['request']."</td>";
                                    echo "<td><a href=\"edit.php?crud=u&type=golf&reservation_number=$res[reservation_number]\">Edit</a> | <a href=\"delete.php?reservation_number=$res[reservation_number]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer include-html="footer.html" class="sticky-footer bg-white"></footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/index.js"></script>
<script src="js/common.js"></script>

</body>

</html>