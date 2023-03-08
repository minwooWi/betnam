<?php
// including the database connection file
include_once("./datasource/config.php");

// DEFINE COMMON QUERY
$customer_query = "UPDATE customer_info
                          SET customer_name=?,
                              reservation_date=?,
                              contact_number=?,
                              company_info=?,
                              reservation_maker_info=?,
                              employee_email_info=?,
                              deposit_date=?,
                              deposit_amount=?,
                              deposit_currency_type=?,
                              deposit_status=?,                              
                              payment_date=?,
                              payment_amount=?,
                              payment_currency_type=?,
                              payment_status=?                          
                          WHERE reservation_number = ?";

/** 골프예약정보수정 */
if(isset($_POST['golfUpdate']))
{
    // ### DEFINE defalut reservation info
    $customer_name = mysqli_real_escape_string($mysqli, $_POST['customer_name']);
    $reservation_date = mysqli_real_escape_string($mysqli, $_POST['reservation_date']);
    $contact_number = mysqli_real_escape_string($mysqli, $_POST['contact_number']);
    $company_info = mysqli_real_escape_string($mysqli, $_POST['company_info']);
    $reservation_maker_info = mysqli_real_escape_string($mysqli, $_POST['reservation_maker_info']);
    $employee_email_info = mysqli_real_escape_string($mysqli, $_POST['employee_email_info']);

    $deposit_date = mysqli_real_escape_string($mysqli, $_POST['deposit_date']);
    $deposit_amount = mysqli_real_escape_string($mysqli, $_POST['deposit_amount']);
    $deposit_currency_type = mysqli_real_escape_string($mysqli, $_POST['deposit_currency_type']);
    $deposit_status = mysqli_real_escape_string($mysqli, $_POST['deposit_status']);
    $payment_date = mysqli_real_escape_string($mysqli, $_POST['payment_date']);
    $payment_amount = mysqli_real_escape_string($mysqli, $_POST['payment_amount']);
    $payment_currency_type = mysqli_real_escape_string($mysqli, $_POST['payment_currency_type']);
    $payment_status = mysqli_real_escape_string($mysqli, $_POST['payment_status']);

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
    mysqli_stmt_bind_param($customer_stmt, 'ssssssssssssssi', $customer_name, $reservation_date, $contact_number, $company_info, $reservation_maker_info, $employee_email_info
                          ,$deposit_date,$deposit_amount,$deposit_currency_type,$deposit_status, $payment_date,$payment_amount,$payment_currency_type,$payment_status,$reservation_number);

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

/** 호텔예약정보수정 */
if(isset($_POST['hotelUpdate'])) {
    // ### DEFINE defalut reservation info
    $customer_name = mysqli_real_escape_string($mysqli, $_POST['customer_name']);
    $reservation_date = mysqli_real_escape_string($mysqli, $_POST['reservation_date']);
    $contact_number = mysqli_real_escape_string($mysqli, $_POST['contact_number']);
    $company_info = mysqli_real_escape_string($mysqli, $_POST['company_info']);
    $reservation_maker_info = mysqli_real_escape_string($mysqli, $_POST['reservation_maker_info']);
    $employee_email_info = mysqli_real_escape_string($mysqli, $_POST['employee_email_info']);

    $deposit_date = mysqli_real_escape_string($mysqli, $_POST['deposit_date']);
    $deposit_amount = mysqli_real_escape_string($mysqli, $_POST['deposit_amount']);
    $deposit_currency_type = mysqli_real_escape_string($mysqli, $_POST['deposit_currency_type']);
    $deposit_status = mysqli_real_escape_string($mysqli, $_POST['deposit_status']);
    $payment_date = mysqli_real_escape_string($mysqli, $_POST['payment_date']);
    $payment_amount = mysqli_real_escape_string($mysqli, $_POST['payment_amount']);
    $payment_currency_type = mysqli_real_escape_string($mysqli, $_POST['payment_currency_type']);
    $payment_status = mysqli_real_escape_string($mysqli, $_POST['payment_status']);

    // HOTEL INFO
    $checkin_date = mysqli_real_escape_string($mysqli, $_POST['checkin_date']);
    $checkin_date_si = mysqli_real_escape_string($mysqli, $_POST['checkin_date_si']);
    $checkin_date_bun = mysqli_real_escape_string($mysqli, $_POST['checkin_date_bun']);
    $checkin_date_result = $checkin_date . " " . $checkin_date_si . ":" . $checkin_date_bun . ":00";

    $checkout_date = mysqli_real_escape_string($mysqli, $_POST['checkout_date']);
    $checkout_date_si = mysqli_real_escape_string($mysqli, $_POST['checkout_date_si']);
    $checkout_date_bun = mysqli_real_escape_string($mysqli, $_POST['checkout_date_bun']);
    $checkout_date_result = $checkout_date . " " . $checkout_date_si . ":" . $checkout_date_bun . ":00";

    $hotel_name = mysqli_real_escape_string($mysqli, $_POST['hotel_name']);
    $hotel_company_info = mysqli_real_escape_string($mysqli, $_POST['hotel_company_info']);
    $room_count = mysqli_real_escape_string($mysqli, $_POST['room_count']);
    $room_type = mysqli_real_escape_string($mysqli, $_POST['room_type']);
    $adult_count = mysqli_real_escape_string($mysqli, $_POST['adult_count']);
    $child_count = mysqli_real_escape_string($mysqli, $_POST['child_count']);
    $child_age = mysqli_real_escape_string($mysqli, $_POST['child_age']);
    $breakfast_included = mysqli_real_escape_string($mysqli, $_POST['breakfast_included']);
    $bed_type = mysqli_real_escape_string($mysqli, $_POST['bed_type']);
    $request = mysqli_real_escape_string($mysqli, $_POST['request']);
	$reservation_number = mysqli_real_escape_string($mysqli, $_POST['reservation_number']);

    $early_checkin = mysqli_real_escape_string($mysqli, $_POST['early_checkin']);
    $late_checkout = mysqli_real_escape_string($mysqli, $_POST['late_checkout']);

	// Start a transaction
    mysqli_begin_transaction($mysqli);
	
	// Prepare the queries to update both tables
    $hotel_query     = "UPDATE hotel_reservation_info
                          SET hotel_name=?,
                              hotel_company_info=?,
                              checkin_date=?,
                              checkout_date=?,
                              room_count=?,
                              room_type=?,
                              adult_count=?,
                              child_count=?,
                              child_age=?,
                              breakfast_included=?,
                              bed_type=?,
                              early_checkin=?,
                              late_checkout=?,
                              request=?
                          WHERE reservation_number = ?";

    // Prepare the statements for the queries
    $customer_stmt = mysqli_prepare($mysqli, $customer_query);
    $hotel_stmt = mysqli_prepare($mysqli, $hotel_query);

    // Bind the parameters for the customer_info table query
    mysqli_stmt_bind_param($customer_stmt, 'ssssssssssssssi', $customer_name, $reservation_date, $contact_number, $company_info, $reservation_maker_info, $employee_email_info
                          ,$deposit_date,$deposit_amount,$deposit_currency_type,$deposit_status, $payment_date,$payment_amount,$payment_currency_type,$payment_status,$reservation_number);

    // Bind the parameters for the golf_reservation_info table query
    mysqli_stmt_bind_param($hotel_stmt, 'ssssisiissssssi', $hotel_name, $hotel_company_info, $checkin_date_result, $checkout_date_result, $room_count, $room_type, $adult_count, $child_count, $child_age, $breakfast_included, $bed_type, $early_checkin, $late_checkout, $request, $reservation_number);

    // Execute the customer_info table query
    mysqli_stmt_execute($customer_stmt);

    // Execute the golf_reservation_info table query
    mysqli_stmt_execute($hotel_stmt);

    // Commit the transaction
    mysqli_commit($mysqli);

    // Close the statements and the connection
    mysqli_stmt_close($customer_stmt);
    mysqli_stmt_close($hotel_stmt);

    header("Location: index.php");
//    mysqli_close($mysqli);
}

/** 투어예약정보수정 */
if(isset($_POST['tourUpdate']))
{
    // ### DEFINE defalut reservation info
    $customer_name = mysqli_real_escape_string($mysqli, $_POST['customer_name']);
    $reservation_date = mysqli_real_escape_string($mysqli, $_POST['reservation_date']);
    $contact_number = mysqli_real_escape_string($mysqli, $_POST['contact_number']);
    $company_info = mysqli_real_escape_string($mysqli, $_POST['company_info']);
    $reservation_maker_info = mysqli_real_escape_string($mysqli, $_POST['reservation_maker_info']);
    $employee_email_info = mysqli_real_escape_string($mysqli, $_POST['employee_email_info']);

    $deposit_date = mysqli_real_escape_string($mysqli, $_POST['deposit_date']);
    $deposit_amount = mysqli_real_escape_string($mysqli, $_POST['deposit_amount']);
    $deposit_currency_type = mysqli_real_escape_string($mysqli, $_POST['deposit_currency_type']);
    $deposit_status = mysqli_real_escape_string($mysqli, $_POST['deposit_status']);
    $payment_date = mysqli_real_escape_string($mysqli, $_POST['payment_date']);
    $payment_amount = mysqli_real_escape_string($mysqli, $_POST['payment_amount']);
    $payment_currency_type = mysqli_real_escape_string($mysqli, $_POST['payment_currency_type']);
    $payment_status = mysqli_real_escape_string($mysqli, $_POST['payment_status']);

	$tour_name = mysqli_real_escape_string($mysqli, $_POST['tour_name']);
	
	$tour_time_from = mysqli_real_escape_string($mysqli, $_POST['tour_time_from']);
	$tour_time_from_si = mysqli_real_escape_string($mysqli, $_POST['tour_time_from_si']);
	$tour_time_from_bun = mysqli_real_escape_string($mysqli, $_POST['tour_time_from_bun']);
	$tour_time_from_result = $tour_time_from . " " . $tour_time_from_si . ":" . $tour_time_from_bun . ":00";
	
	$tour_time_to = mysqli_real_escape_string($mysqli, $_POST['tour_time_to']);
	$tour_time_to_si = mysqli_real_escape_string($mysqli, $_POST['tour_time_to_si']);
	$tour_time_to_bun = mysqli_real_escape_string($mysqli, $_POST['tour_time_to_bun']);
	$tour_time_to_result = $tour_time_to . " " . $tour_time_to_si . ":" . $tour_time_to_bun . ":00";
	
	$car_pickup_time = mysqli_real_escape_string($mysqli, $_POST['car_pickup_time']);
	$car_pickup_time_si = mysqli_real_escape_string($mysqli, $_POST['car_pickup_time_si']);
	$car_pickup_time_bun = mysqli_real_escape_string($mysqli, $_POST['car_pickup_time_bun']);
	$car_pickup_time_result = $car_pickup_time . " " . $car_pickup_time_si . ":" . $car_pickup_time_bun . ":00";
	
	$car_pickup_location = mysqli_real_escape_string($mysqli, $_POST['car_pickup_location']);
	
	$car_send_time = mysqli_real_escape_string($mysqli, $_POST['car_send_time']);
	$car_send_time_si = mysqli_real_escape_string($mysqli, $_POST['car_send_time_si']);
	$car_send_time_bun = mysqli_real_escape_string($mysqli, $_POST['car_send_time_bun']);
	$car_send_time_result = $car_send_time . " " . $car_send_time_si . ":" . $car_send_time_bun . ":00";
	
	$car_send_location = mysqli_real_escape_string($mysqli, $_POST['car_send_location']);
	$adult_count = mysqli_real_escape_string($mysqli, $_POST['adult_count']);
	$child_count = mysqli_real_escape_string($mysqli, $_POST['child_count']);
	$guide_included = mysqli_real_escape_string($mysqli, $_POST['guide_included']);
	$details = mysqli_real_escape_string($mysqli, $_POST['details']);
	$child_age = mysqli_real_escape_string($mysqli, $_POST['child_age']);
	$period_time_from = mysqli_real_escape_string($mysqli, $_POST['period_time_from']);
	$period_time_to = mysqli_real_escape_string($mysqli, $_POST['period_time_to']);
	$request = mysqli_real_escape_string($mysqli, $_POST['request']);
	$included_items = mysqli_real_escape_string($mysqli, $_POST['included_items']);
	$exincluded_items = mysqli_real_escape_string($mysqli, $_POST['exincluded_items']);
	$reservation_number = mysqli_real_escape_string($mysqli, $_POST['reservation_number']);

    // Start a transaction
    mysqli_begin_transaction($mysqli);

    // Prepare the queries to update both tables
    $tour_query     = "UPDATE tour_reservation_info
                          SET tour_name=?,
                              tour_time_from=?,
                              tour_time_to=?,
                              car_pickup_time=?,
                              car_pickup_location=?,
                              car_send_time=?,
                              car_send_location=?,
                              adult_count=?,
                              child_count=?,
                              guide_included=?,
                              details=?,
                              child_age=?,
                              period_time_from=?,
                              period_time_to=?,
                              included_items=?,
                              exincluded_items=?,
                              request=?
                          WHERE reservation_number = ?";

    // Prepare the statements for the queries
    $customer_stmt = mysqli_prepare($mysqli, $customer_query);
    $tour_stmt = mysqli_prepare($mysqli, $tour_query);

    // Bind the parameters for the customer_info table query
    mysqli_stmt_bind_param($customer_stmt, 'ssssssssssssssi', $customer_name, $reservation_date, $contact_number, $company_info, $reservation_maker_info, $employee_email_info
                          ,$deposit_date,$deposit_amount,$deposit_currency_type,$deposit_status, $payment_date,$payment_amount,$payment_currency_type,$payment_status,$reservation_number);

    // Bind the parameters for the golf_reservation_info table query
    mysqli_stmt_bind_param($tour_stmt, 'sssssssssiissssssi', $tour_name, $tour_time_from_result, $tour_time_to_result, $car_pickup_time_result, $car_pickup_location, $car_send_time_result, $car_send_location, $adult_count, $child_count, $guide_included, $details, $child_age, $period_time_from, $period_time_to, $included_items, $exincluded_items, $request, $reservation_number);

    // Execute the customer_info table query
    mysqli_stmt_execute($customer_stmt);

    // Execute the golf_reservation_info table query
    mysqli_stmt_execute($tour_stmt);

    // Commit the transaction
    mysqli_commit($mysqli);

    // Close the statements and the connection
    mysqli_stmt_close($customer_stmt);
    mysqli_stmt_close($tour_stmt);

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

        $deposit_date = $res['deposit_date'];
        $deposit_amount = $res['deposit_amount'];
        $deposit_currency_type = $res['deposit_currency_type'];
        $deposit_status = $res['deposit_status'];

        $payment_date = $res['payment_date'];
        $payment_amount = $res['payment_amount'];
        $payment_currency_type = $res['payment_currency_type'];
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

        $deposit_date = $res['deposit_date'];
        $deposit_amount = $res['deposit_amount'];
        $deposit_currency_type = $res['deposit_currency_type'];
        $deposit_status = $res['deposit_status'];

        $payment_date = $res['payment_date'];
        $payment_amount = $res['payment_amount'];
        $payment_currency_type = $res['payment_currency_type'];
        $payment_status = $res['payment_status'];

        $reservation_number = $res['reservation_number'];
        $hotel_name = $res['hotel_name'];
        $hotel_company_info = $res['hotel_company_info'];

        $checkin_date = $res['checkin_date'];
        $checkin_date_first = explode(' ', $checkin_date)[0];
        $checkin_date_second = explode(' ', $checkin_date)[1];
        $checkin_date_second_first = explode(':', $checkin_date_second)[0];
        $checkin_date_second_second = explode(':', $checkin_date_second)[1];

        $checkout_date = $res['checkout_date'];
        $checkout_date_first = explode(' ', $checkout_date)[0];
        $checkout_date_second = explode(' ', $checkout_date)[1];
        $checkout_date_second_first = explode(':', $checkout_date_second)[0];
        $checkout_date_second_second = explode(':', $checkout_date_second)[1];

        $room_count = $res['room_count'];
        $room_type = $res['room_type'];
        $adult_count = $res['adult_count'];
        $child_count = $res['child_count'];
        $child_age = $res['child_age'];
        $breakfast_included = $res['breakfast_included'];
        $bed_type = $res['bed_type'];
        $request = $res['request'];

        $early_checkin = $res['early_checkin'];
        $late_checkout = $res['late_checkout'];
    }
}

if($type == "tour"){
    $result = mysqli_query($mysqli, "SELECT *
                                        FROM customer_info a
                                            ,tour_reservation_info b
                                        WHERE 1=1
                                        AND a.reservation_number =$reservation_number
                                        AND a.reservation_number = b.reservation_number");
	
    while($res = mysqli_fetch_array($result))
    {
		$reservation_number = $res['reservation_number'];
		$company_info = $res['company_info'];
        $reservation_maker_info = $res['reservation_maker_info'];
        $customer_name = $res['customer_name'];
        $reservation_date = $res['reservation_date'];
		$contact_number = $res['contact_number'];
		$employee_email_info = $res['employee_email_info'];

        $deposit_date = $res['deposit_date'];
        $deposit_amount = $res['deposit_amount'];
        $deposit_currency_type = $res['deposit_currency_type'];
        $deposit_status = $res['deposit_status'];

        $payment_date = $res['payment_date'];
        $payment_amount = $res['payment_amount'];
        $payment_currency_type = $res['payment_currency_type'];
        $payment_status = $res['payment_status'];

		$tour_name = $res['tour_name'];
		
		$tour_time_from = $res['tour_time_from'];
		$tour_time_from_first = explode(' ', $tour_time_from)[0];
		$tour_time_from_second = explode(' ', $tour_time_from)[1];
		$tour_time_from_second_first = explode(':', $tour_time_from_second)[0];
		$tour_time_from_second_second = explode(':', $tour_time_from_second)[1];

		$tour_time_to = $res['tour_time_to'];
		$tour_time_to_first = explode(' ', $tour_time_to)[0];
		$tour_time_to_second = explode(' ', $tour_time_to)[1];
		$tour_time_to_second_first = explode(':', $tour_time_to_second)[0];
		$tour_time_to_second_second = explode(':', $tour_time_to_second)[1];
		
		/*
		echo "tour_time_from_first -> " . $tour_time_from_first . "<br/>";
		echo "tour_time_from_second -> " . $tour_time_from_second . "<br/>";
		echo "tour_time_from_second_first -> " . $tour_time_from_second_first . "<br/>";
		echo "tour_time_from_second_second -> " . $tour_time_from_second_second . "<br/>";

		echo "tour_time_to_first -> " . $tour_time_to_first . "<br/>";
		echo "tour_time_to_second -> " . $tour_time_to_second . "<br/>";
		echo "tour_time_to_second_first -> " . $tour_time_to_second_first . "<br/>";
		echo "tour_time_to_second_second -> " . $tour_time_to_second_second . "<br/>";
		*/
		
		$car_pickup_time = $res['car_pickup_time'];
		$car_pickup_time_first = explode(' ', $car_pickup_time)[0];
		$car_pickup_time_second = explode(' ', $car_pickup_time)[1];
		$car_pickup_time_second_first = explode(':', $car_pickup_time_second)[0];
		$car_pickup_time_second_second = explode(':', $car_pickup_time_second)[1];

		/*
		echo "car_pickup_time_first -> " . $car_pickup_time_first . "<br/>";
		echo "car_pickup_time_second -> " . $car_pickup_time_second . "<br/>";
		echo "car_pickup_time_second_first -> " . $car_pickup_time_second_first . "<br/>";
		echo "car_pickup_time_second_second -> " . $car_pickup_time_second_second . "<br/>";
		*/

		$car_pickup_location = $res['car_pickup_location'];
		$car_send_time = $res['car_send_time'];
		$car_send_time_first = explode(' ', $car_send_time)[0];
		$car_send_time_second = explode(' ', $car_send_time)[1];
		$car_send_time_second_first = explode(':', $car_send_time_second)[0];
		$car_send_time_second_second = explode(':', $car_send_time_second)[1];
		
		/*
		echo "car_send_time_first -> " . $car_send_time_first . "<br/>";
		echo "car_send_time_second -> " . $car_send_time_second . "<br/>";
		echo "car_send_time_second_first -> " . $car_send_time_second_first . "<br/>";
		echo "car_send_time_second_second -> " . $car_send_time_second_second . "<br/>";
		*/

		$car_send_location = $res['car_send_location'];

        /*
		$pickup_time = $res['pickup_time'];
		$pickup_time_first = explode(' ', $pickup_time)[0];
		$pickup_time_second = explode(' ', $pickup_time)[1];
		$pickup_time_second_first = explode(':', $pickup_time_second)[0];
		$pickup_time_second_second = explode(':', $pickup_time_second)[1];

		echo "pickup_time_first -> " . $pickup_time_first . "<br/>";
		echo "pickup_time_second -> " . $pickup_time_second . "<br/>";
		echo "pickup_time_second_first -> " . $pickup_time_second_first . "<br/>";
		echo "pickup_time_second_second -> " . $pickup_time_second_second . "<br/>";
		*/
		
		$adult_count = $res['adult_count'];
		$child_count = $res['child_count'];
		$guide_included = $res['guide_included'];
		$details = $res['details'];
		$child_age = $res['child_age'];
		$period_time_from = $res['period_time_from'];
		$period_time_to = $res['period_time_to'];
		$request = $res['request'];
		$included_items = $res['included_items'];
		$exincluded_items = $res['exincluded_items'];
    }
}

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
        <div id="content-wrapper" class="d-flex flex-column" style="width: 1000px !important;margin: 0 auto;">
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
            <div id="golf" style="display: none;">
                <?php include("./include/basicInfo.php");?>

                <div class="contentBox">►골프 예약 정보
                    <div class="main_reservation_info_wrap" style="border-top: solid 0.3em rgb(171 131 104);">
                        <div class="reservation_info04">
                            예약 번호
							<div class="top_main_reservation_desc">Reservation Code</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="reservation_code" class="reservation_input" id="reservation_code" value="<?php echo $reservation_number;?>" disabled>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            골프
                            <div class="top_main_reservation_desc">Golf</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="golf_course_name" class="reservation_input" id="golf-course-name" value="<?php echo $golf_course_name;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            업체 정보
                            <div class="top_main_reservation_desc">Information</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="golf_company_info" class="reservation_input" id="golf-company-info" value="<?php echo $golf_company_info;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            예약 일정
                            <div class="top_main_reservation_desc">Period</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="date" name="reservation_schedule" class="reservation_input" id="reservation-schedule" value="<?php echo $reservation_schedule;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            <div class="top_main_reservation_desc">티옵 시간</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="time" name="tee_time" class="reservation_input" id="tee-time" value="<?php echo $tee_time;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            <div class="top_main_reservation_desc">홀</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
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
                        <div class="reservation_info04">
                            <div class="top_main_reservation_desc">인원수</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="number" name="headcount" class="reservation_input" id="headcount" value="<?php echo $headcount;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            포함 사항
							<div class="top_main_reservation_desc">Included</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="included_items" class="reservation_input" id="included_items" value="<?php echo $included_items;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            불포함 사항
							<div class="top_main_reservation_desc">Not Included</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="exincluded_items" class="reservation_input" id="exincluded_items" value="<?php echo $exincluded_items;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            노트
                            <div class="top_main_reservation_desc">Note</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="request" class="reservation_input" id="request" value="<?php echo $request;?>" required>
                        </div>
                    </div>
                    
					<?php include("./include/req_readingInfo.php");?>
					
                </div>
				
                <?php include("./include/termsInfo.php");?>
				
            </div>
            <!-- #### END GOLF RESERVATION FORM #### -->

            <!-- #### START HOTEL RESERVATION FORM #### -->
            <div id="hotel" style="display: none;">
                <?php include("./include/basicInfo.php");?>

                <div class="contentBox">►호텔 예약 정보
                    <div class="main_reservation_info_wrap" style="border-top: solid 0.3em rgb(171 131 104);">
                        <div class="reservation_info04">
                            예약 번호
                            <div class="top_main_reservation_desc">Reservation Code</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="reservation_code" class="reservation_input" id="reservation_code" value="<?php echo $reservation_code;?>" disabled>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            호텔
                            <div class="top_main_reservation_desc">hotel</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="hotel_name" class="reservation_input" id="hotel_name" value="<?php echo $hotel_name;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            업체 정보
                            <div class="top_main_reservation_desc">Information</div>
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="hotel_company_info" class="reservation_input" id="hotel_company_info" value="<?php echo $hotel_company_info;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info">
                            체크인
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="date" name="checkin_date" class="" id="checkin_date" value="<?php echo $checkin_date_first;?>" required>
                            <select name="checkin_date_si" style="width:49%; text-align:center;">
                                <?php
                                for($si=0; $si<=24; $si++) {
                                    if($si < 10) {
                                        $si = "0" . $si;
                                    }

                                    if($checkin_date_second_first == $si) {
                                        $si_selected = " selected";
                                    } else {
                                        $si_selected = "";
                                    }
                                    ?>
                                    <option value="<?=$si?>"<?php echo $si_selected; ?>><?=$si?></option>
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

                                    if($checkin_date_second_second == $bun) {
                                        $bun_selected = " selected";
                                    } else {
                                        $bun_selected = "";
                                    }
                                    ?>
                                    <option value="<?=$bun?>"<?php echo $bun_selected; ?>><?=$bun?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="reservation_info">
                            체크아웃
                        </div>
                        <div class="reservation_input_wrap">
                            <input type="date" name="checkout_date" class="" id="checkout_date" value="<?php echo $checkout_date_first;?>" required>
                            <select name="checkout_date_si" style="width:49%; text-align:center;">
                                <?php
                                for($si=0; $si<=24; $si++) {
                                    if($si < 10) {
                                        $si = "0" . $si;
                                    }

                                    if($checkout_date_second_first == $si) {
                                        $si_selected = " selected";
                                    } else {
                                        $si_selected = "";
                                    }
                                    ?>
                                    <option value="<?=$si?>"<?php echo $si_selected; ?>><?=$si?></option>
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

                                    if($checkout_date_second_second == $bun) {
                                        $bun_selected = " selected";
                                    } else {
                                        $bun_selected = "";
                                    }
                                    ?>
                                    <option value="<?=$bun?>"<?php echo $bun_selected; ?>><?=$bun?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            객실수
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="number" name="room_count" class="reservation_input" id="room_count" value="<?php echo $room_count;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            침대 타입
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="room_type" class="reservation_input" id="room_type" value="<?php echo $room_type;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            인원수<br />
                            <span class="top_main_reservation_desc">(성인)</span>
                        </div>
                        <div class="hotelAdultInputBox">
                            <input type="number" name="adult_count" class="reservation_input" id="adult_count" value="<?php echo $adult_count;?>" required>
                        </div>
                        <div class="reservation_info05">
                            인원수<br />
                            <span class="top_main_reservation_desc">(어린이)</span>
                        </div>
                        <div class="" style="width:65px;">
                            <input type="number" name="child_count" class="reservation_input" id="child_count" value="<?php echo $child_count;?>" required>
                        </div>
                        <div class="reservation_info05 pdt12">
                            어린이 나이
                        </div>
                        <div class="wd85">
                            <input type="text" name="child_age" class="" id="child_age" value="<?php echo $child_age;?>">
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04 pdt6">
                            조식
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <select class="form-control" name="breakfast_included" id="breakfast_included" required>
                                <option value="0" <?php if($breakfast_included == "0") echo "SELECTED";?>>불포함</option>
                                <option value="1" <?php if($breakfast_included == "1") echo "SELECTED";?>>포함</option>
                            </select>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04 pdt6">
                            베드 타입
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <select class="form-control" name="bed_type" id="bed_type" required>
                                <option value="0" <?php if($bed_type == "0") echo "SELECTED";?>>더블</option>
                                <option value="1" <?php if($bed_type == "1") echo "SELECTED";?>>트윈</option>
                            </select>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            얼리 체크인
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="early_checkin" class="reservation_input" id="early_checkin" value="<?php echo $early_checkin;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            레이트 체크아웃
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="late_checkout" class="reservation_input" id="late_checkout" value="<?php echo $late_checkout;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            요청 사항
                        </div>
                        <div class="reservation_input_wrap04_1">
                            <input type="text" name="request" class="reservation_input" id="request" value="<?php echo $request;?>" required>
                        </div>
                    </div>
					
					<?php include("./include/req_readingInfo.php");?>
					
                </div>

                <?php include("./include/termsInfo.php");?>
				
            </div>
            <!-- #### END HOTEL RESERVATION FORM #### -->

			<!-- #### START TOUR RESERVATION FORM #### -->
            <div id="tour" style="display: none;">
                <?php include("./include/basicInfo.php");?>

                <div class="contentBox">►투어 예약 정보
                    <div class="main_reservation_info_wrap" style="border-top: solid 0.3em rgb(171 131 104);">
                        <div class="reservation_info04">
                            투어명<br />
                            <span class="top_main_reservation_desc">Tour</span>
                        </div>
                        <div class="reservation_input_wrap04">
                            <input type="text" name="tour_name" class="reservation_input" id="tour_name" value="<?php echo $tour_name;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            이용일자<br />
                            <span class="top_main_reservation_desc">Period</span>
                        </div>
                        <div class="period_time_from_wrap04">
                            <input type="date" name="period_time_from" class="period_time_from_input" id="period_time_from" value="<?php echo $period_time_from;?>" required>
                        </div>
                        <div style="width: 10%;margin-top: 10px">
                            ~
                        </div>
                        <div class="period_time_to_wrap04">
                            <input type="date" name="period_time_to" class="period_time_to_input" id="period_time_to" value="<?php echo $period_time_to;?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            상세내역<br />
                            <span class="top_main_reservation_desc">Details</span>
                        </div>
                        <div class="reservation_input_wrap04">
                            <input type="text" name="details" class="reservation_input" id="details" value="<?php echo $details;?>" required>
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
                                <option value="1" <?php if($adult_count == "1") echo "SELECTED";?>>1</option>
                                <option value="2" <?php if($adult_count == "2") echo "SELECTED";?>>2</option>
                                <option value="3" <?php if($adult_count == "3") echo "SELECTED";?>>3</option>
                                <option value="4" <?php if($adult_count == "4") echo "SELECTED";?>>4</option>
                                <option value="5" <?php if($adult_count == "5") echo "SELECTED";?>>5</option>
                            </select>
                        </div>
                        <div class="reservation_info05">
                            인원수<br />
                            <span class="top_main_reservation_desc">(어린이)</span>
                        </div>
                        <div class="" style="width:65px;">
                            <select class="selectpicker" name="child_count" id="child_count" required style="text-align:center;">
                                <option value="">-</option>
                                <option value="1" <?php if($child_count == "1") echo "SELECTED";?>>1</option>
                                <option value="2" <?php if($child_count == "2") echo "SELECTED";?>>2</option>
                                <option value="3" <?php if($child_count == "3") echo "SELECTED";?>>3</option>
                                <option value="4" <?php if($child_count == "4") echo "SELECTED";?>>4</option>
                                <option value="5" <?php if($child_count == "5") echo "SELECTED";?>>5</option>
                            </select>
                        </div>
                        <div class="reservation_info05 pdt12">
                            어린이 나이
                        </div>
                        <div class="wd85">
                            <input type="number" name="child_age" class="" id="child_age" value="<?php echo $child_age;?>" />
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            투어 시작 시간
                        </div>
                        <div class="wd185">
                            <input type="date" name="tour_time_from" class="" id="tour_time_from" value="<?php echo $tour_time_from_first;?>" required />
							<select name="tour_time_from_si" style="width:49%; text-align:center;">
							<?php
								for($si=0; $si<=24; $si++) {
									if($si < 10) {
										$si = "0" . $si;
									}

									if($tour_time_from_second_first == $si) {
										$si_selected = " selected";
									} else {
										$si_selected = "";
									}
							?>
							<option value="<?=$si?>"<?php echo $si_selected; ?>><?=$si?></option>
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

									if($tour_time_from_second_second == $bun) {
										$bun_selected = " selected";
									} else {
										$bun_selected = "";
									}
							?>
							<option value="<?=$bun?>"<?php echo $bun_selected; ?>><?=$bun?></option>
							<?php
								}
							?>
							</select>
                        </div>
                        <div class="reservation_info04">
                            투어 종료 시간
                        </div>
                        <div class="wd185">
                            <input type="date" name="tour_time_to" class="" id="tour_time_to" value="<?php echo $tour_time_to_first;?>" required />
							<select name="tour_time_to_si" style="width:49%; text-align:center;">
							<?php
								for($si=0; $si<=24; $si++) {
									if($si < 10) {
										$si = "0" . $si;
									}

									if($tour_time_to_second_first == $si) {
										$si_selected = " selected";
									} else {
										$si_selected = "";
									}
							?>
							<option value="<?=$si?>"<?php echo $si_selected; ?>><?=$si?></option>
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
									
									if($tour_time_to_second_second == $bun) {
										$bun_selected = " selected";
									} else {
										$bun_selected = "";
									}
							?>
							<option value="<?=$bun?>"<?php echo $bun_selected; ?>><?=$bun?></option>
							<?php
								}
							?>
							</select>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            차량 픽업 장소
                        </div>
                        <div class="wd185">
                            <input type="text" name="car_pickup_location" class="" id="car_pickup_location" value="<?php echo $car_pickup_location;?>" required>
                        </div>
                        <div class="reservation_info04">
                            차량 픽업 시간
                        </div>
                        <div class="wd185">
                            <input type="date" name="car_pickup_time" class="" id="car_pickup_time" value="<?php echo $car_pickup_time_first;?>" required>
							<select name="car_pickup_time_si" style="width:49%; text-align:center;">
							<?php
								for($si=0; $si<=24; $si++) {
									if($si < 10) {
										$si = "0" . $si;
									}

									if($car_pickup_time_second_first == $si) {
										$si_selected = " selected";
									} else {
										$si_selected = "";
									}
							?>
							<option value="<?=$si?>"<?php echo $si_selected; ?>><?=$si?></option>
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

									if($car_pickup_time_second_second == $si) {
										$bun_selected = " selected";
									} else {
										$bun_selected = "";
									}
							?>
							<option value="<?=$bun?>"<?php echo $bun_selected; ?>><?=$bun?></option>
							<?php
								}
							?>
							</select>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            차량 샌딩 장소
                        </div>
                        <div class="wd185">
                            <input type="text" name="car_send_location" class="" id="car_send_location" value="<?php echo $car_send_location; ?>" required>
                        </div>
                        <div class="reservation_info04">
                            차량 샌딩 시간
                        </div>
                        <div class="wd185">
                            <input type="date" name="car_send_time" class="" id="car_send_time" value="<?php echo $car_send_time_first; ?>" required>
							<select name="car_send_time_si" style="width:49%; text-align:center;">
							<?php
								for($si=0; $si<=24; $si++) {
									if($si < 10) {
										$si = "0" . $si;
									}

									if($car_send_time_second_first == $si) {
										$si_selected = " selected";
									} else {
										$si_selected = "";
									}
							?>
							<option value="<?=$si?>"<?php echo $si_selected; ?>><?=$si?></option>
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

									if($car_send_time_second_second == $bun) {
										$bun_selected = " selected";
									} else {
										$bun_selected = "";
									}
							?>
							<option value="<?=$bun?>"<?php echo $bun_selected; ?>><?=$bun?></option>
							<?php
								}
							?>
							</select>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04 pdt6">
                            가이드
                        </div>
                        <div class="reservation_input_wrap04">
                            <select class="form-control notBorder" name="guide_included" id="guide_included" required>
                                <option value="">가이드 포함 여부 선택</option>
                                <option value="1"<?php if($guide_included == "1") echo "SELECTED";?>>불포함</option>
                                <option value="2"<?php if($guide_included == "2") echo "SELECTED";?>>영어 가이드 포함</option>
                                <option value="3"<?php if($guide_included == "3") echo "SELECTED";?>>한국어 현지 가이드 포함</option>
                                <option value="4"<?php if($guide_included == "4") echo "SELECTED";?>>한국어 가이드 포함</option>
                            </select>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            포함 사항<br />
                            <span class="top_main_reservation_desc">Included</span>
                        </div>
                        <div class="reservation_input_wrap04">
                            <input type="text" name="included_items" class="reservation_input" id="included_items" value="<?php echo $included_items; ?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            불포함 사항<br />
                            <span class="top_main_reservation_desc">Not Included</span>
                        </div>
                        <div class="reservation_input_wrap04">
                            <input type="text" name="exincluded_items" class="reservation_input" id="exincluded_items" value="<?php echo $exincluded_items; ?>" required>
                        </div>
                    </div>
                    <div class="main_reservation_info_wrap">
                        <div class="reservation_info04">
                            요청 사항<br />
                            <span class="top_main_reservation_desc">Special Request</span>
                        </div>
                        <div class="reservation_input_wrap04">
                            <input type="text" name="request" class="reservation_input" id="request" value="<?php echo $request; ?>" required>
                        </div>
                    </div>
                    
					<?php include("./include/req_readingInfo.php");?>
					
                </div>
				
                <?php include("./include/termsInfo.php");?>
				
            </div>
            <!-- #### END TOUR RESERVATION FORM #### -->

            <!-- Footer -->
            <footer include-html="footer.html" class="sticky-footer bg-white"></footer>
            <!-- End of Footer -->
        </div>
    </div>
        <!-- End of Page Wrapper -->

<?php
	$footer_gb = "sub_edit";
	include_once("./include/footer.php");
?>
<script>
    function excelFileExport() {
        let wb = XLSX.utils.book_new();
        let newWorksheet = excelHandler.getWorksheet();
        XLSX.utils.book_append_sheet(wb, newWorksheet, excelHandler.getSheetName());
        let wbout = XLSX.write(wb, {bookType:'xlsx',  type: 'binary'});
        saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), excelHandler.getExcelFileName());
    }

    const excelHandler = {
        getExcelFileName : function(){
            return 'golf_info_'+moment().format('YYYY-MM-DD HH:mm:ss')+'.xlsx';
        },
        getSheetName : function(){
            return 'test-1';
        },
        getExcelData: function(){
            let headers = ["Reservation Code", "Company Info", "Reservation Maker Info", "Customer Name", "Reservation Date", "Contact Number", "Employee Email Info", "Deposit Date", "Deposit Amount", "Deposit Currency Type", "Deposit Status", "Payment Date", "Payment Amount", "Payment Currency Type", "Payment Status", "Golf Course Name", "Golf Company Info", "Reservation Schedule", "Tee Time", "Hole", "Headcount", "Included Items", "Excluded Items", "Request"];

            let data = [
                ["<?php echo $reservation_code;?>", "<?php echo preg_replace('/\r\n|\r|\n/','',$company_info);?>", "<?php echo $reservation_maker_info;?>", "<?php echo $customer_name;?>", "<?php echo $reservation_date;?>", "<?php echo $contact_number;?>", "<?php echo $employee_email_info;?>", "<?php echo $deposit_date;?>", "<?php echo $deposit_amount;?>", "<?php echo $deposit_currency_type;?>", "<?php echo $deposit_status;?>", "<?php echo $payment_date;?>", "<?php echo $payment_amount;?>", "<?php echo $payment_currency_type;?>", "<?php echo $payment_status;?>", "<?php echo $golf_course_name;?>", "<?php echo $golf_company_info;?>", "<?php echo $reservation_schedule;?>", "<?php echo $tee_time;?>", "<?php echo $hole;?>", "<?php echo $headcount;?>", "<?php echo $included_items;?>", "<?php echo $exincluded_items;?>", "<?php echo $request;?>"]
            ];

            return [headers, ...data];
        },
        getWorksheet : function(){
            return XLSX.utils.aoa_to_sheet(this.getExcelData());
        }
    }

    function s2ab(s) {
        let buf = new ArrayBuffer(s.length); //convert s to arrayBuffer
        let view = new Uint8Array(buf);  //create uint8array as viewer
        for (let i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF; //convert to octet
        return buf;
    }
</script>
