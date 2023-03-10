<?php
$is_sub = "Y";
$r_type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$r_crud = isset($_REQUEST['crud']) ? $_REQUEST['crud'] : "";

if($r_crud == "c") {
	if($r_type != "") {
		$tag_title = "Reservation Info Add - " . $r_type;
	} else {
		$tag_title = "Reservation Info Add";
	}
} else if($r_crud == "u") {
	if($r_type != "") {
		$tag_title = "Reservation Info Edit - " . $r_type;
	} else {
		$tag_title = "Reservation Info Edit";
	}
}

include_once("./include/header.php");
include_once("./include/left.php");
?>

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
                <?php include("./include/basicInfo.php");?>

                <div class="contentBox">►골프 예약 정보
                    <div class="main_reservation_info_wrap" style="border-top: solid 0.3em rgb(171 131 104);">
                        <div class="reservation_info04">
                            예약 번호
                            <div class="top_main_reservation_desc">Reservation Code</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="reservation_code" class="reservation_input" id="reservation_code" enable>
							<span id="reservation_code_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            골프
                            <div class="top_main_reservation_desc">Golf</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="golf_course_name" class="reservation_input" id="golf-course-name" required>
                            <span id="golf_course_name_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            업체 정보
                            <div class="top_main_reservation_desc">Information</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="golf_company_info" class="reservation_input" id="golf-company-info" required>
							<span id="golf_company_info_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            예약 일정
                            <div class="top_main_reservation_desc">Period</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="date" name="reservation_schedule" class="reservation_input" id="reservation-schedule" required>
							<span id="reservation_schedule_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            <div class="top_main_reservation_desc">티옵 시간</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="time" name="tee_time" class="reservation_input" id="tee-time" required>
							<span id="tee_time_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            <div class="top_main_reservation_desc">홀</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <select class="reservation_input" name="hole" id="hole" required>
                                <option value="">Select hole number</option>
                                <option value="9">9</option>
                                <option value="18">18</option>
                                <option value="27">27</option>
                                <option value="36">36</option>
                            </select>

							<span id="hole_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            <div class="top_main_reservation_desc">인원수</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="number" name="headcount" class="reservation_input" id="headcount" required>
							<span id="headcount_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            포함 사항
                            <div class="top_main_reservation_desc">Included</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="included_items" class="reservation_input" id="included_items" required>
							<span id="included_items_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            불포함 사항
                            <div class="top_main_reservation_desc">Not Included</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="exincluded_items" class="reservation_input" id="exincluded_items" required>
							<span id="exincluded_items_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            노트
                            <div class="top_main_reservation_desc">Note</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="request" class="reservation_input" id="request1" required>
							<span id="request_html1"></span>
                        </div>
                    </div>
					
					<?php include("./include/req_readingInfo.php");?>
					
                </div>

                <?php include("./include/termsInfo.php");?>

            </div>
            <!-- #### END GOLF RESERVATION FORM #### -->
			
            <!-- #### START HOTEL RESERVATION FORM #### -->
            <div id="hotel" style="display: none">
                <?php
                include("./include/basicInfo.php");
                ?>

                <div class="contentBox">►호텔 예약 정보
                    <div class="main_reservation_info_wrap" style="border-top: solid 0.3em rgb(171 131 104);">
                        <div class="reservation_info04">
                            예약 번호
                            <div class="top_main_reservation_desc">Reservation Code</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="reservation_code" class="reservation_input" id="reservation_code2">
							<span id="reservation_code_html2"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            호텔
                            <div class="top_main_reservation_desc">hotel</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="hotel_name" class="reservation_input" id="hotel_name" required>
							<span id="hotel_name_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            업체 정보
                            <div class="top_main_reservation_desc">Information</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="hotel_company_info" class="reservation_input" id="hotel_company_info" required>
							<span id="hotel_company_info_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            체크인
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="date" name="checkin_date" class="" id="checkin_date" required>
                            <select name="checkin_date_si" style="width:49%; text-align:center;">
                                <?php
                                for($si=0; $si<=24; $si++) {
                                    if($si < 10) {
                                        $si = "0" . $si;
                                    }
                                    ?>
                                    <option value="<?=$si?>"><?=$si?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <select name="checkin_date_bun" style="width:48.8%; text-align:center;">
                                <?php
                                for($bun=0; $bun<=59; $bun++) {
                                    if($bun < 10) {
                                        $bun = "0" . $bun;
                                    }
                                    ?>
                                    <option value="<?=$bun?>"><?=$bun?></option>
                                    <?php
                                }
                                ?>
                            </select>

							<span id="checkin_date_html"></span>
                        </div>
                        <div class="reservation_info">
                            체크아웃
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="date" name="checkout_date" class="" id="checkout_date" required>
                            <select name="checkout_date_si" style="width:49%; text-align:center;">
                                <?php
                                for($si=0; $si<=24; $si++) {
                                    if($si < 10) {
                                        $si = "0" . $si;
                                    }
                                    ?>
                                    <option value="<?=$si?>"><?=$si?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <select name="checkout_date_bun" style="width:48.8%; text-align:center;">
                                <?php
                                for($bun=0; $bun<=59; $bun++) {
                                    if($bun < 10) {
                                        $bun = "0" . $bun;
                                    }
                                    ?>
                                    <option value="<?=$bun?>"><?=$bun?></option>
                                    <?php
                                }
                                ?>
                            </select>

							<span id="checkout_date_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            객실수
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="number" name="room_count" class="reservation_input" id="room_count" required>
							<span id="room_count_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            침대 타입
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="room_type" class="reservation_input" id="room_type" required>
							<span id="room_type_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            인원수<br />
                            <span class="top_main_reservation_desc">(성인)</span>
                        </div>
                        <div class="hotelAdultInputBox">
                            <input type="number" name="adult_count" class="reservation_input" id="adult_count" required>
							<span id="adult_count_html"></span>
                        </div>
                        <div class="reservation_info05">
                            인원수<br />
                            <span class="top_main_reservation_desc">(어린이)</span>
                        </div>
                        <div class="" style="width:65px;">
                            <input type="number" name="child_count" class="reservation_input" id="child_count" required>
							<span id="child_count_html"></span>
                        </div>
                        <div class="reservation_info05 pdt12">
                            어린이 나이
                        </div>
                        <div class="wd85">
                            <input type="number" name="child_age" class="" id="child_age">
							<span id="child_age_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04 pdt6">
                            조식
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <select class="form-control" name="breakfast_included" id="breakfast_included" required>
                                <option value="">조식 포함 여부 선택</option>
                                <option value="0">불포함</option>
                                <option value="1">포함</option>
                            </select>

							<span id="breakfast_included_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04 pdt6">
                            베드 타입
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <select class="form-control" name="bed_type" id="bed_type" required>
                                <option value="0">더블</option>
                                <option value="1">트윈</option>
                            </select>
							<span id="bed_type_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            얼리 체크인
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="early_checkin" class="reservation_input" id="early_checkin" required>
							<span id="early_checkin_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            레이트 체크아웃
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="late_checkout" class="reservation_input" id="late_checkout" required>
							<span id="late_checkout_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            요청 사항
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="request" class="reservation_input" id="request2" required>
							<span id="request_html2"></span>
                        </div>
                    </div>

					<?php include("./include/req_readingInfo.php");?>
					
                </div>

                <?php include("./include/termsInfo.php");?>

            </div>
            <!-- #### END HOTEL RESERVATION FORM #### -->
			
            <!-- #### START TOUR RESERVATION FORM #### -->
            <div id="tour" style="display: none">
                <?php
                include("./include/basicInfo.php");
                ?>

                <div class="contentBox">►투어 예약 정보
                    <div class="main_reservation_info_wrap" style="border-top: solid 0.3em rgb(171 131 104);">
                        <div class="reservation_info04">
                            투어명<br />
                            <span class="top_main_reservation_desc">Tour</span>
                        </div>
                        <div class="reservation_input_wrap04">
                            <input type="text" name="tour_name" class="reservation_input" id="tour_name" required>
							<span id="tour_name_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            이용일자<br />
                            <span class="top_main_reservation_desc">Period</span>
                        </div>
                        <div class="period_time_from_wrap04">
                            <input type="date" name="period_time_from" class="period_time_from_input" id="period_time_from" required>
							<span id="period_time_from_html"></span>
                        </div>
                        <div style="width: 10%;margin-top: 10px">
                            ~
                        </div>
                        <div class="period_time_to_wrap04">
                            <input type="date" name="period_time_to" class="period_time_to_input" id="period_time_to" required>
							<span id="period_time_to_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            상세내역<br />
                            <span class="top_main_reservation_desc">Details</span>
                        </div>
                        <div class="reservation_input_wrap04">
                            <input type="text" name="details" class="reservation_input" id="details" required>
							<span id="details_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            인원수<br />
                            <span class="top_main_reservation_desc">(성인)</span>
                        </div>
                        <div class="wd185">
                            <select class="selectpicker" name="adult_count" id="adult_count" required>
                                <option value="">-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
							<span id="adult_count_html2"></span>
                        </div>
                        <div class="reservation_info05">
                            인원수<br />
                            <span class="top_main_reservation_desc">(어린이)</span>
                        </div>
                        <div class="" style="width:65px;">
                            <select class="selectpicker" name="child_count" id="child_count" required style="text-align:center;">
                                <option value="">-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
							<span id="child_count_html2"></span>
                        </div>
                        <div class="reservation_info05 pdt12">
                            어린이 나이
                        </div>
                        <div class="wd85">
                            <input type="number" name="child_age" class="" id="child_age">
							<span id="child_age_html2"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            투어 시작 시간
                        </div>
                        <div class="wd185">
                            <input type="date" name="tour_time_from" class="" id="tour_time_from" required>
							<select name="tour_time_from_si" style="width:49%; text-align:center;">
							<?php
								for($si=0; $si<=24; $si++) {
									if($si < 10) {
										$si = "0" . $si;
									}
							?>
							<option value="<?=$si?>"><?=$si?></option>
							<?php
								}
							?>
							</select>
							<select name="tour_time_from_bun" style="width:48.8%; text-align:center;">
							<?php
								for($bun=0; $bun<=59; $bun++) {
									if($bun < 10) {
										$bun = "0" . $bun;
									}
							?>
							<option value="<?=$bun?>"><?=$bun?></option>
							<?php
								}
							?>
							</select>
							<span id="tour_time_from_html"></span>
                        </div>
                        <div class="reservation_info04">
                            투어 종료 시간
                        </div>
                        <div class="wd185">
                            <input type="date" name="tour_time_to" class="" id="tour_time_to" required>
							<select name="tour_time_to_si" style="width:49%; text-align:center;">
							<?php
								for($si=0; $si<=24; $si++) {
									if($si < 10) {
										$si = "0" . $si;
									}
							?>
							<option value="<?=$si?>"><?=$si?></option>
							<?php
								}
							?>
							</select>
							<select name="tour_time_to_bun" style="width:48.8%; text-align:center;">
							<?php
								for($bun=0; $bun<=59; $bun++) {
									if($bun < 10) {
										$bun = "0" . $bun;
									}
							?>
							<option value="<?=$bun?>"><?=$bun?></option>
							<?php
								}
							?>
							</select>
							<span id="tour_time_to_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            차량 픽업 장소
                        </div>
                        <div class="wd185">
                            <input type="text" name="car_pickup_location" class="" id="car_pickup_location" required>
							<span id="car_pickup_location_html"></span>
                        </div>
                        <div class="reservation_info04">
                            차량 픽업 시간
                        </div>
                        <div class="wd185">
                            <input type="date" name="car_pickup_time" class="" id="car_pickup_time" required>
							<select name="car_pickup_time_si" style="width:49%; text-align:center;">
							<?php
								for($si=0; $si<=24; $si++) {
									if($si < 10) {
										$si = "0" . $si;
									}
							?>
							<option value="<?=$si?>"><?=$si?></option>
							<?php
								}
							?>
							</select>
							<select name="car_pickup_time_bun" style="width:48.8%; text-align:center;">
							<?php
								for($bun=0; $bun<=59; $bun++) {
									if($bun < 10) {
										$bun = "0" . $bun;
									}
							?>
							<option value="<?=$bun?>"><?=$bun?></option>
							<?php
								}
							?>
							</select>
							<span id="car_pickup_time_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            차량 샌딩 장소
                        </div>
                        <div class="wd185">
                            <input type="text" name="car_send_location" class="" id="car_send_location" required>
							<span id="car_send_location_html"></span>
                        </div>
                        <div class="reservation_info04">
                            차량 샌딩 시간
                        </div>
                        <div class="wd185">
                            <input type="date" name="car_send_time" class="" id="car_send_time" required>
							<select name="car_send_time_si" style="width:49%; text-align:center;">
							<?php
								for($si=0; $si<=24; $si++) {
									if($si < 10) {
										$si = "0" . $si;
									}
							?>
							<option value="<?=$si?>"><?=$si?></option>
							<?php
								}
							?>
							</select>
							<select name="car_send_time_bun" style="width:48.8%; text-align:center;">
							<?php
								for($bun=0; $bun<=59; $bun++) {
									if($bun < 10) {
										$bun = "0" . $bun;
									}
							?>
							<option value="<?=$bun?>"><?=$bun?></option>
							<?php
								}
							?>
							</select>
							<span id="car_send_time_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04 pdt6">
                            가이드
                        </div>
                        <div class="reservation_input_wrap04">
                            <select class="form-control notBorder" name="guide_included" id="guide_included" required>
                                <option value="">가이드 포함 여부 선택</option>
                                <option value="1">불포함</option>
                                <option value="2">영어 가이드 포함</option>
                                <option value="3">한국어 현지 가이드 포함</option>
                                <option value="4">한국어 가이드 포함</option>
                            </select>
							<span id="guide_included_html"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            포함 사항<br />
                            <span class="top_main_reservation_desc">Included</span>
                        </div>
                        <div class="reservation_input_wrap04">
                            <input type="text" name="included_items" class="reservation_input" id="included_items" required>
							<span id="included_items_html2"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            불포함 사항<br />
                            <span class="top_main_reservation_desc">Not Included</span>
                        </div>
                        <div class="reservation_input_wrap04">
                            <input type="text" name="exincluded_items" class="reservation_input" id="exincluded_items" required>
							<span id="exincluded_items_html2"></span>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            요청 사항<br />
                            <span class="top_main_reservation_desc">Special Request</span>
                        </div>
                        <div class="reservation_input_wrap04">
                            <input type="text" name="request" class="reservation_input" id="request3" required>
							<span id="request_html3"></span>
                        </div>
                    </div>
					
                    <?php include("./include/req_readingInfo.php");?>
					
                </div>

                <?php include("./include/termsInfo.php");?>

            </div>
            <!-- #### END TOUR RESERVATION FORM #### -->
			
            <?php
				include_once("./include/footerInfo.php");
			?>
        </div>
    </div>
    <!-- End of Page Wrapper -->
<?php
	$footer_gb = "sub_regist";
	include_once("./include/footer.php");
?>