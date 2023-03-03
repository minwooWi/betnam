<?php
//including the database connection file
include_once("./datasource/config.php");

$is_sub="";
$tag_title = "Manage Reservation";

include_once("./include/header.php");
include_once("./include/left.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated

$list_query = "
	(
		SELECT 
			reservation_number
			, '골프' AS reservation_gubun_result
			, 'golf' AS reservation_gubun
			, golf_course_name AS course_name
			, golf_company_info AS company_info
			, NULL AS tour_time_from
			, NULL AS tour_time_to
			, reservation_schedule
			, tee_time
			, hole
			, NULL AS checkin_date
			, NULL AS checkout_date
			, headcount
			, NULL AS room_count
			, NULL AS room_type
			, NULL AS car_pickup_time
			, NULL AS car_pickup_location
			, NULL AS car_send_time
			, NULL AS car_send_location
			, NULL AS adult_count
			, NULL AS child_count
			, NULL AS guide_included 
			, NULL AS details
			, NULL AS child_age
			, NULL AS period_time_from
			, NULL AS period_time_to
			, NULL AS breakfast_included
			, NULL AS bed_type
			, request
			, included_items
			, reservation_code
			, exincluded_items
		FROM 
			golf_reservation_info 
	) 
	UNION ALL 
	(
		SELECT 
			reservation_number
			, '호텔' AS reservation_gubun_result
			, 'hotel' AS reservation_gubun
			, hotel_name AS course_name
			, hotel_company_info AS company_info
			, NULL AS tour_time_from
			, NULL AS tour_time_to
			, NULL AS reservation_schedule
			, NULL AS tee_time
			, NULL AS hole
			, checkin_date
			, checkout_date
			, NULL AS headcount
			, room_count
			, room_type
			, NULL AS car_pickup_time
			, NULL AS car_pickup_location
			, NULL AS car_send_time
			, NULL AS car_send_location
			, adult_count
			, child_count
			, NULL AS guide_included 
			, NULL AS details
			, NULL AS child_age
			, NULL AS period_time_from
			, NULL AS period_time_to
			, breakfast_included
			, bed_type
			, request
			, NULL AS included_items
			, reservation_code
			, exincluded_items
		FROM 
			hotel_reservation_info
	)
	UNION ALL 
	(
		SELECT 
			reservation_number
			, '투어' AS reservation_gubun_result
			, 'tour' AS reservation_gubun
			, tour_name AS course_name
			, NULL AS company_info
			, tour_time_from
			, tour_time_to
			, NULL AS reservation_schedule
			, NULL AS tee_time
			, NULL AS hole
			, NULL AS checkin_date
			, NULL AS checkout_date
			, NULL AS headcount
			, NULL AS room_count
			, NULL AS room_type
			, car_pickup_time
			, car_pickup_location
			, car_send_time
			, car_send_location
			, adult_count
			, child_count
			, guide_included
			, details
			, child_age
			, period_time_from
			, period_time_to
			, NULL AS breakfast_included
			, NULL AS bed_type
			, request
			, included_items
			, NULL AS reservation_code
			, exincluded_items
		FROM 
			tour_reservation_info
	)
";

$result = mysqli_query($mysqli, $list_query); // using mysqli_query instead
?>

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
                <h1 class="h3 mb-2 text-gray-800">예약 정보 리스트</h1>
                <p class="mb-4">고객정보 및 예약정보 리스트 입니다.</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>예약 번호</th>
                                    <th>예약 구분</th>
                                    <th>회사정보</th>
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
                                    <th>예약 번호</th>
                                    <th>예약 구분</th>
                                    <th>회사정보</th>
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
                                    echo "<td>".$res['reservation_gubun_result']."</td>";
                                    echo "<td>".$res['course_name']."</td>";
                                    echo "<td>".$res['company_info']."</td>";
                                    echo "<td>".$res['reservation_schedule']."</td>";
                                    echo "<td>".$res['tee_time']."</td>";
                                    echo "<td>".$res['hole']."</td>";
                                    echo "<td>".$res['headcount']."</td>";
                                    echo "<td>".$res['included_items']."</td>";
                                    echo "<td>".$res['request']."</td>";
                                    echo "<td><a href=\"edit.php?crud=u&type=$res[reservation_gubun]&reservation_number=$res[reservation_number]\">Edit</a> | <a href=\"delete.php?reservation_number=$res[reservation_number]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
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

<?php
	$footer_gb = "main";
	include_once("./include/footer.php");
?>