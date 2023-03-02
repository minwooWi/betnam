<?php
// including the database connection file
include_once("./datasource/config.php");

if(isset($_POST['golfUpdate']))
{
    // Set the variables with the updated values
    $customer_name = mysqli_real_escape_string($mysqli, $_POST['customer_name']);
    $reservation_date = mysqli_real_escape_string($mysqli, $_POST['reservation_date']);
    $contact_number = mysqli_real_escape_string($mysqli, $_POST['contact_number']);
    $company_info = mysqli_real_escape_string($mysqli, $_POST['company_info']);
    $reservation_maker_info = mysqli_real_escape_string($mysqli, $_POST['reservation_maker_info']);
    $employee_email_info = mysqli_real_escape_string($mysqli, $_POST['employee_email_info']);
    $payment_status = mysqli_real_escape_string($mysqli, $_POST['payment_status']);
    $deposit_status = mysqli_real_escape_string($mysqli, $_POST['deposit_status']);

    $golf_course_name = mysqli_real_escape_string($mysqli, $_POST['golf_course_name']);
    $golf_company_info = mysqli_real_escape_string($mysqli, $_POST['golf_company_info']);
    $reservation_schedule = mysqli_real_escape_string($mysqli, $_POST['reservation_schedule']);
    $tee_time = mysqli_real_escape_string($mysqli, $_POST['tee_time']);
    $hole = mysqli_real_escape_string($mysqli, $_POST['hole']);
    $headcount = mysqli_real_escape_string($mysqli, $_POST['headcount']);
    $included_items = mysqli_real_escape_string($mysqli, $_POST['included_items']);
    $exincluded_items = mysqli_real_escape_string($mysqli, $_POST['exincluded_items']);
    $request = mysqli_real_escape_string($mysqli, $_POST['request']);
    $reservation_number = mysqli_real_escape_string($mysqli, $_POST['reservation_number']);

    // Start a transaction
    mysqli_begin_transaction($mysqli);

    // Prepare the queries to update both tables
    $customer_query = "UPDATE customer_info
                          SET customer_name=?,
                              reservation_date=?,
                              contact_number=?,
                              company_info=?,
                              reservation_maker_info=?,
                              employee_email_info=?,
                              payment_status=?,
                              deposit_status=?
                          WHERE reservation_number = ?";
    $golf_query     = "UPDATE golf_reservation_info
                          SET golf_course_name=?,
                              golf_company_info=?,
                              reservation_schedule=?,
                              tee_time=?,
                              hole=?,
                              headcount=?,
                              included_items=?,
                              exincluded_items=?,
                              request=?
                          WHERE reservation_number = ?";

    // Prepare the statements for the queries
    $customer_stmt = mysqli_prepare($mysqli, $customer_query);
    $golf_stmt = mysqli_prepare($mysqli, $golf_query);

    // Bind the parameters for the customer_info table query
    mysqli_stmt_bind_param($customer_stmt, 'ssssssssi', $customer_name, $reservation_date, $contact_number, $company_info, $reservation_maker_info, $employee_email_info, $payment_status, $deposit_status, $reservation_number);

    // Bind the parameters for the golf_reservation_info table query
    mysqli_stmt_bind_param($golf_stmt, 'sssiiisssi', $golf_course_name, $golf_company_info, $reservation_schedule, $tee_time, $hole, $headcount, $included_items, $exincluded_items, $request, $reservation_number);

    // Execute the customer_info table query
    mysqli_stmt_execute($customer_stmt);

    // Execute the golf_reservation_info table query
    mysqli_stmt_execute($golf_stmt);

    // Commit the transaction
    mysqli_commit($mysqli);

    // Close the statements and the connection
    mysqli_stmt_close($customer_stmt);
    mysqli_stmt_close($golf_stmt);

    header("Location: index.php");
//    mysqli_close($mysqli);
}
?>
<?php
//getting id from url
$type = $_GET['type'];
$reservation_number = $_GET['reservation_number'];

//selecting data associated with this particular id
if($type == "golf"){
    $result = mysqli_query($mysqli, "SELECT *
                                        FROM customer_info a
                                            ,golf_reservation_info b
                                        WHERE 1=1
                                        AND a.reservation_number =$reservation_number
                                        AND a.reservation_number = b.reservation_number");

    while($res = mysqli_fetch_array($result))
    {
        $reservation_code = $res['reservation_code'];
        $company_info = $res['company_info'];
        $reservation_maker_info = $res['reservation_maker_info'];
        $customer_name = $res['customer_name'];
        $reservation_date = $res['reservation_date'];
        $contact_number = $res['contact_number'];
        $employee_email_info = $res['employee_email_info'];
        $deposit_status = $res['deposit_status'];
        $payment_status = $res['payment_status'];

        $golf_course_name = $res['golf_course_name'];
        $golf_company_info = $res['golf_company_info'];
        $reservation_schedule = $res['reservation_schedule'];
        $tee_time = $res['tee_time'];
        $hole = $res['hole'];
        $headcount = $res['headcount'];
        $included_items = $res['included_items'];
        $exincluded_items = $res['exincluded_items'];
        $request = $res['request'];
    }
}

if($type == "hotel"){
    $result = mysqli_query($mysqli, "SELECT *
                                        FROM customer_info a
                                            ,hotel_reservation_info b
                                        WHERE 1=1
                                        AND a.reservation_number =$reservation_number
                                        AND a.reservation_number = b.reservation_number");

    while($res = mysqli_fetch_array($result))
    {
        $reservation_code = $res['reservation_code'];
        $company_info = $res['company_info'];
        $reservation_maker_info = $res['reservation_maker_info'];
        $customer_name = $res['customer_name'];
        $reservation_date = $res['reservation_date'];
        $contact_number = $res['contact_number'];
        $employee_email_info = $res['employee_email_info'];
        $deposit_status = $res['deposit_status'];
        $payment_status = $res['payment_status'];

        $reservation_number = $res['reservation_number'];
        $hotel_name = $res['hotel_name'];
        $hotel_company_info = $res['hotel_company_info'];
        $checkin_date = $res['checkin_date'];
        $checkout_date = $res['checkout_date'];
        $room_count = $res['room_count'];
        $room_type = $res['room_type'];
        $adult_count = $res['adult_count'];
        $child_count = $res['child_count'];
        $breakfast_included = $res['breakfast_included'];
        $bed_type = $res['bed_type'];
        $request = $res['request'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Info Add</title>
    <!-- Custom fonts for this template -->
    <link href="https://cdn.jsdelivr.net/gh/sunn-us/SUIT/fonts/static/woff2/SUIT.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<!--            <li class="nav-item active">-->
<!--                <a class="nav-link" href="regist.html?crud=c&type=vehicle">-->
<!--                    <i class="fas fa-fw fa-tachometer-alt"></i>-->
<!--                    <span>차량 정보 입력</span></a>-->
<!--            </li>-->

<!--            &lt;!&ndash; Divider &ndash;&gt;-->
<!--            <hr class="sidebar-divider">-->

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

        <div id="content-wrapper" class="d-flex flex-column">
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

            <!-- #### START GOLF RESERVATION FORM #### -->
            <div id="golf" style="display: none">
                <div>
                    <img src="./img/banner.png" alt="banner" class="mainBanner">
                </div>
                <div class="contentBox titleWrap">
                    <div class="titleKor">예약 확정서</div>
                    <div class="titleEng">CONFIRMATION LETTER</div>
                    <input type="hidden" value="<?php echo $reservation_number;?>" name="reservation_number">
                    <input type="submit" name="golfUpdate" value="수정" class="btn btn-primary btn-block">
                    <div id="savePdfBtn" class="btn-block">PDF 다운로드</div>
                </div>

                <div class="contentBox select">
                    <label for="deposit_status" class="label">예약금 상태</label>
                    <select class="selectpicker" name="deposit_status" id="deposit_status" required>
                        <option value="0" <?php if($deposit_status == "0") echo "SELECTED";?>>미결제</option>
                        <option value="1" <?php if($deposit_status == "1") echo "SELECTED";?>>결제대기</option>
                        <option value="2" <?php if($deposit_status == "2") echo "SELECTED";?>>결제완료</option>
                    </select>
                    <label for="payment_status" class="label">결제 상태</label>
                    <select class="selectpicker" name="payment_status" id="payment_status" required>
                        <option value="0" <?php if($payment_status == "0") echo "SELECTED";?>>미결제</option>
                        <option value="1" <?php if($payment_status == "1") echo "SELECTED";?>>결제대기</option>
                        <option value="2" <?php if($payment_status == "2") echo "SELECTED";?>>결제완료</option>
                    </select>
                </div>
                <div class="contentBox">
                    <div class="company_info_wrap">
                        <div class="company_info">
                            회사 정보<br>
                            Travel Agent Info
                        </div>
                        <div class="company_input_wrap">
                            <input type="text" id="company_info" name="company_info" class="company_input" value="<?php echo $company_info;?>" required>
                        </div>
                    </div>
                    <div class="company_info_wrap">
                        <div class="company_info">
                            예약자 정보<br>
                            Booker Info
                        </div>
                        <div class="reservation_maker_info_wrap">
                            <input type="text" id="reservation_maker_info" name="reservation_maker_info" class="reservation_maker_info_input" value="<?php echo $reservation_maker_info;?>"  required>
                        </div>
                        <div class="employee_email_info_wrap">
                            <input type="text" id="employee_email_info" name="employee_email_info" class="employee_email_info_input" value="<?php echo $employee_email_info;?>">
                        </div>
                    </div>
                </div>
                <div class="contentBox">
                    <div class="gbcWrap">
                        <div class="gbc">
                            고객 성함<br>
                            Guest Name
                        </div>
                        <div class="gbc">
                            예약일자<br>
                            Booking period
                        </div>
                        <div class="gbc">
                            연락처<br>
                            Contact
                        </div>
                    </div>
                    <div class="gbcWrapInput">
                        <div>
                            <input type="text" class="" id="customer_name" name="customer_name" value="<?php echo $customer_name;?>" required>
                        </div>
                        <div>
                            <input type="date" class="reservation_date" id="reservation_date" name="reservation_date" value="<?php echo $reservation_date;?>" required>
                        </div>
                        <div>
                            <input type="text" class="" id="contact_number" name="contact_number" value="<?php echo $contact_number;?>" required>
                        </div>
                    </div>
                </div>

                <div class="contentBox">► 예약 정보
                    <div class="main_reservation_info_wrap" style="border-top: solid 0.3em rgb(171 131 104);">
                        <div class="reservation_info">
                            예약 번호<br>
                            Reservation Code
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="text" name="reservation_code" class="reservation_input" id="reservation_code" value="<?php echo $reservation_code;?>" disabled>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            골프<br>
                            Golf
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="text" name="golf_course_name" class="reservation_input" id="golf-course-name" value="<?php echo $golf_course_name;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            업체 정보<br>
                            Information
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="text" name="golf_company_info" class="reservation_input" id="golf-company-info" value="<?php echo $golf_company_info;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            예약 일정<br>
                            Period
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="date" name="reservation_schedule" class="reservation_input" id="reservation-schedule" value="<?php echo $reservation_schedule;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            티옵 시간
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="time" name="tee_time" class="reservation_input" id="tee-time" value="<?php echo $tee_time;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            홀
                        </div>
                        <div class="reservation_input_wrap">
                            <select class="reservation_input" name="hole" id="hole">
                                <option value="">Select hole number</option>
                                <option value="9" <?php if($hole == "9") echo "SELECTED";?>>9</option>
                                <option value="18" <?php if($hole == "18") echo "SELECTED";?>>18</option>
                                <option value="27" <?php if($hole == "27") echo "SELECTED";?>>27</option>
                                <option value="36" <?php if($hole == "36") echo "SELECTED";?>>36</option>
                            </select>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            인원수
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="number" name="headcount" class="reservation_input" id="headcount" value="<?php echo $headcount;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            포함 사항
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="text" name="included_items" class="reservation_input" id="included_items" value="<?php echo $included_items;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            불포함 사항
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="text" name="exincluded_items" class="reservation_input" id="exincluded_items" value="<?php echo $exincluded_items;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            노트<br>
                            Note
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="text" name="request" class="reservation_input" id="request" value="<?php echo $request;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_desc" style="border-top: solid 0.3em rgb(171 131 104);">✓ 필독 : 예약자분의 영문성함으로 여권 또는 ID(거주증)에 대해 리셉션에서 확인이 요구됩니다.</div>
                </div>

                <div class="contentBox">► 유의 사항
                    <div class="main_reservation_desc" style="border-top: solid 0.3em rgb(171 131 104);">✓ 티옵 시간 15분 전 까지 대기 요망</div>
                    <div class="main_reservation_desc">✓ 예약일자 7일 전 까지 취소 가능</div>
                    <div class="main_reservation_desc" style="border-bottom: solid 0.3em rgb(171 131 104);">(악천후로 인한 취소 - 환불은 골프장의 규정에 따라 취소 규정이 달라질 수 있습니다)</div>
                </div>
                <div class="contentBox">► 취소 규정
                    <div class="main_reservation_desc" style="border-top: solid 0.3em rgb(171 131 104);">✓ 티옵 시간 15분 전 까지 대기 요망</div>
                    <div class="main_reservation_desc">✓ 예약일자 7일 전 까지 취소 가능</div>
                    <div class="main_reservation_desc" style="border-bottom: solid 0.3em rgb(171 131 104);">(악천후로 인한 취소 - 환불은 골프장의 규정에 따라 취소 규정이 달라질 수 있습니다)</div>
                </div>
            </div>
            <!-- #### END GOLF RESERVATION FORM #### -->

            <!-- #### START HOTEL RESERVATION FORM #### -->
            <div id="hotel" style="display: none">
                <div>
                    <img src="./img/banner.png" alt="banner" class="mainBanner">
                </div>
                <div class="contentBox titleWrap">
                    <div class="titleKor">예약 확정서</div>
                    <div class="titleEng">CONFIRMATION LETTER</div>
                    <input type="hidden" value="<?php echo $reservation_number;?>" name="reservation_number">
                    <input type="submit" name="hotelSubmit" value="호텔예약정보등록" class="btn btn-primary btn-block">
                </div>

                <div class="contentBox select">
                    <label for="deposit_status" class="label">예약금 상태</label>
                    <select class="selectpicker" name="deposit_status" id="deposit_status" required>
                        <option value="0" <?php if($deposit_status == "0") echo "SELECTED";?>>미결제</option>
                        <option value="1" <?php if($deposit_status == "1") echo "SELECTED";?>>결제대기</option>
                        <option value="2" <?php if($deposit_status == "2") echo "SELECTED";?>>결제완료</option>
                    </select>
                    <label for="payment_status" class="label">결제 상태</label>
                    <select class="selectpicker" name="payment_status" id="payment_status" required>
                        <option value="0" <?php if($payment_status == "0") echo "SELECTED";?>>미결제</option>
                        <option value="1" <?php if($payment_status == "1") echo "SELECTED";?>>결제대기</option>
                        <option value="2" <?php if($payment_status == "2") echo "SELECTED";?>>결제완료</option>
                    </select>
                </div>
                <div class="contentBox">
                    <div class="company_info_wrap">
                        <div class="company_info">
                            회사 정보<br>
                            Travel Agent Info
                        </div>
                        <div class="company_input_wrap">
                            <input type="text" id="company_info" name="company_info" class="company_input" value="<?php echo $company_info;?>" required>
                        </div>
                    </div>
                    <div class="company_info_wrap">
                        <div class="company_info">
                            예약자 정보<br>
                            Booker Info
                        </div>
                        <div class="reservation_maker_info_wrap">
                            <input type="text" id="reservation_maker_info" name="reservation_maker_info" class="reservation_maker_info_input" value="<?php echo $reservation_maker_info;?>"  required>
                        </div>
                        <div class="employee_email_info_wrap">
                            <input type="text" id="employee_email_info" name="employee_email_info" class="employee_email_info_input" value="<?php echo $employee_email_info;?>">
                        </div>
                    </div>
                </div>
                <div class="contentBox">
                    <div class="gbcWrap">
                        <div class="gbc">
                            고객 성함<br>
                            Guest Name
                        </div>
                        <div class="gbc">
                            예약일자<br>
                            Booking period
                        </div>
                        <div class="gbc">
                            연락처<br>
                            Contact
                        </div>
                    </div>
                    <div class="gbcWrapInput">
                        <div>
                            <input type="text" class="" id="customer_name" name="customer_name" value="<?php echo $customer_name;?>" required>
                        </div>
                        <div>
                            <input type="date" class="reservation_date" id="reservation_date" name="reservation_date" value="<?php echo $reservation_date;?>" required>
                        </div>
                        <div>
                            <input type="text" class="" id="contact_number" name="contact_number" value="<?php echo $contact_number;?>" required>
                        </div>
                    </div>
                </div>

                <div class="contentBox">► 예약 정보
                    <div class="main_reservation_info_wrap" style="border-top: solid 0.3em rgb(171 131 104);">
                        <div class="reservation_info">
                            예약 번호<br>
                            Reservation Code
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="text" name="reservation_code" class="reservation_input" id="reservation_code" value="<?php echo $reservation_code;?>" disabled>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            호텔<br>
                            hotel
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="text" name="hotel_name" class="reservation_input" id="hotel_name" value="<?php echo $hotel_name;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            업체 정보<br>
                            Information
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="text" name="hotel_company_info" class="reservation_input" id="hotel_company_info" value="<?php echo $hotel_company_info;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            체크인
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="date" name="checkin_date" class="reservation_input" id="checkin_date" value="<?php echo $checkin_date;?>" required>
                        </div>
                        <div class="reservation_info">
                            체크아웃
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="date" name="checkout_date" class="reservation_input" id="checkout_date" value="<?php echo $checkout_date;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            객실수
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="number" name="room_count" class="reservation_input" id="room_count" value="<?php echo $room_count;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            객실 타입
                        </div>
                        <div class="reservation_input_wrap">
                            <select class="form-control" name="room_type" id="room_type" required>
                                <option value="">Select room type</option>
                                <option value="single" <?php if($room_type == "single") echo "SELECTED";?>>Single</option>
                                <option value="double" <?php if($room_type == "double") echo "SELECTED";?>>Double</option>
                                <option value="suite" <?php if($room_type == "suite") echo "SELECTED";?>>Suite</option>
                            </select>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            인원수<br>(성인)
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="number" name="adult_count" class="reservation_input" id="adult_count" value="<?php echo $adult_count;?>" required>
                        </div>
                        <div class="reservation_info">
                            인원수<br>(어린이)
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="number" name="child_count" class="reservation_input" id="child_count" value="<?php echo $child_count;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            조식
                        </div>
                        <div class="reservation_input_wrap">
                            <select class="form-control" name="breakfast_included" id="breakfast_included" value="<?php echo $breakfast_included;?>" required>
                                <option value="">조식 포함 여부 선택</option>
                                <option value="0">불포함</option>
                                <option value="1">포함</option>
                            </select>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            베드 타입
                        </div>
                        <div class="reservation_input_wrap">
                            <select class="form-control" name="bed_type" id="bed_type" required>
                                <option value="">Select bed_type</option>
                                <option value="0" <?php if($room_type == "0") echo "SELECTED";?>>더블</option>
                                <option value="1" <?php if($room_type == "1") echo "SELECTED";?>>트윈</option>
                            </select>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            요청 사항
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="text" name="request" class="reservation_input" id="request" value="<?php echo $request;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_desc" style="border-top: solid 0.3em rgb(171 131 104);">✓ 필독 : 예약자분의 영문성함으로 여권 또는 ID(거주증)에 대해 리셉션에서 확인이 요구됩니다.</div>
                </div>

                <div class="contentBox">► 유의 사항
                    <div class="main_reservation_desc" style="border-top: solid 0.3em rgb(171 131 104);">✓ 티옵 시간 15분 전 까지 대기 요망</div>
                    <div class="main_reservation_desc">✓ 예약일자 7일 전 까지 취소 가능</div>
                    <div class="main_reservation_desc" style="border-bottom: solid 0.3em rgb(171 131 104);">(악천후로 인한 취소 - 환불은 골프장의 규정에 따라 취소 규정이 달라질 수 있습니다)</div>
                </div>
                <div class="contentBox">► 취소 규정
                    <div class="main_reservation_desc" style="border-top: solid 0.3em rgb(171 131 104);">✓ 티옵 시간 15분 전 까지 대기 요망</div>
                    <div class="main_reservation_desc">✓ 예약일자 7일 전 까지 취소 가능</div>
                    <div class="main_reservation_desc" style="border-bottom: solid 0.3em rgb(171 131 104);">(악천후로 인한 취소 - 환불은 골프장의 규정에 따라 취소 규정이 달라질 수 있습니다)</div>
                </div>
            </div>
            <!-- #### END HOTEL RESERVATION FORM #### -->

            <!-- Footer -->
            <footer include-html="footer.html" class="sticky-footer bg-white"></footer>
            <!-- End of Footer -->
        </div>
    </div>
        <!-- End of Page Wrapper -->

<!-- Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- custom -->
<script src="./js/jspdf.min.js"></script>
<script src="./js/html2canvas.js"></script>
<script src="js/custom.js"></script>
<script src="js/common.js"></script>
</body>
</html>