<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("./datasource/config.php");

// Check if form is submitted
if(isset($_POST['golfSubmit'])) {
    // Basic Reservation info
    $reservation_code = mysqli_real_escape_string($mysqli, $_POST['reservation_code']);
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


    // Retrieve input fields and escape special characters
    $golf_course_name = mysqli_real_escape_string($mysqli, $_POST['golf_course_name']);
    $golf_company_info = mysqli_real_escape_string($mysqli, $_POST['golf_company_info']);
    $reservation_schedule = mysqli_real_escape_string($mysqli, $_POST['reservation_schedule']);
    $tee_time = mysqli_real_escape_string($mysqli, $_POST['tee_time']);
    $hole = mysqli_real_escape_string($mysqli, $_POST['hole']);
    $headcount = mysqli_real_escape_string($mysqli, $_POST['headcount']);
    $included_items = mysqli_real_escape_string($mysqli, $_POST['included_items']);
    $exincluded_items = mysqli_real_escape_string($mysqli, $_POST['exincluded_items']);
    $request = mysqli_real_escape_string($mysqli, $_POST['request']);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Start transaction
    $mysqli->autocommit(FALSE);

    // Insert data into customer_info table
    $query1 = "INSERT INTO customer_info 
                (customer_name, reservation_date, contact_number, company_info, reservation_maker_info,employee_email_info
                ,deposit_date,deposit_amount,deposit_currency_type,deposit_status ,payment_date,payment_amount,payment_currency_type,payment_status)
                VALUES ('$customer_name', '$reservation_date', '$contact_number', '$company_info', '$reservation_maker_info', '$employee_email_info'
                ,'$deposit_date','$deposit_amount','$deposit_currency_type','$deposit_status' ,'$payment_date','$payment_amount','$payment_currency_type','$payment_status' )";
    $result1 = $mysqli->query($query1);

    if (!$result1) {
        // Rollback transaction if query1 fails
        $mysqli->rollback();
        echo "Error inserting data into customer_info table: " . $mysqli->error;
        exit;
    }

    // Get the reservation number that was just inserted
    $reservation_number = $mysqli->insert_id;

    // Insert data into golf_reservation_info table using the reservation_number from customer_info table
    $query2 = "INSERT INTO golf_reservation_info 
                        (reservation_number, reservation_code, golf_course_name, golf_company_info, reservation_schedule, tee_time, hole, headcount, included_items, request, exincluded_items)
                VALUES('$reservation_number','$reservation_code', '$golf_course_name','$golf_company_info','$reservation_schedule','$tee_time','$hole','$headcount','$included_items','$request','$exincluded_items')";
    $result2 = $mysqli->query($query2);

    // Check if record is inserted successfully
    if($result2) {
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
    if(!$result2) {
        // Rollback transaction if query2 fails
        $mysqli->rollback();
        echo "Error inserting data into golf_reservation_info table: " . $mysqli->error;
        exit;
    }

    // Commit transaction
    $mysqli->commit();

    // Close connection
    $mysqli->close();

}

if(isset($_POST['hotelSubmit'])) {
    // Basic Reservation info
    $reservation_code = mysqli_real_escape_string($mysqli, $_POST['reservation_code']);
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
    $reservation_code = mysqli_real_escape_string($mysqli, $_POST['reservation_code']);
    $hotel_name = mysqli_real_escape_string($mysqli, $_POST['hotel_name']);
    $hotel_company_info = mysqli_real_escape_string($mysqli, $_POST['hotel_company_info']);

    $checkin_date = mysqli_real_escape_string($mysqli, $_POST['checkin_date']);
    $checkin_date_si = mysqli_real_escape_string($mysqli, $_POST['checkin_date_si']);
    $checkin_date_bun = mysqli_real_escape_string($mysqli, $_POST['checkin_date_bun']);
    $checkin_date_result = $checkin_date . " " . $checkin_date_si . ":" . $checkin_date_bun . ":00";

    $checkout_date = mysqli_real_escape_string($mysqli, $_POST['checkout_date']);
    $checkout_date_si = mysqli_real_escape_string($mysqli, $_POST['checkout_date_si']);
    $checkout_date_bun = mysqli_real_escape_string($mysqli, $_POST['checkout_date_bun']);
    $checkout_date_result = $checkout_date . " " . $checkout_date_si . ":" . $checkout_date_bun . ":00";

    $room_count = mysqli_real_escape_string($mysqli, $_POST['room_count']);
    $room_type = mysqli_real_escape_string($mysqli, $_POST['room_type']);
    $adult_count = mysqli_real_escape_string($mysqli, $_POST['adult_count']);
    $child_count = mysqli_real_escape_string($mysqli, $_POST['child_count']);
    $breakfast_included = mysqli_real_escape_string($mysqli, $_POST['breakfast_included']);
    $bed_type = mysqli_real_escape_string($mysqli, $_POST['bed_type']);
    $request = mysqli_real_escape_string($mysqli, $_POST['request']);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Start transaction
    $mysqli->autocommit(FALSE);

    // Insert data into customer_info table
    $query1 = "INSERT INTO customer_info 
                (customer_name, reservation_date, contact_number, company_info, reservation_maker_info,employee_email_info
                ,deposit_date,deposit_amount,deposit_currency_type,deposit_status ,payment_date,payment_amount,payment_currency_type,payment_status)
                VALUES ('$customer_name', '$reservation_date', '$contact_number', '$company_info', '$reservation_maker_info', '$employee_email_info'
                ,'$deposit_date','$deposit_amount','$deposit_currency_type','$deposit_status' ,'$payment_date','$payment_amount','$payment_currency_type','$payment_status' )";
    $result1 = $mysqli->query($query1);

    if (!$result1) {
        // Rollback transaction if query1 fails
        $mysqli->rollback();
        echo "Error inserting data into customer_info table: " . $mysqli->error;
        exit;
    }

    // Get the reservation number that was just inserted
    $reservation_number = $mysqli->insert_id;

    // Insert data into golf_reservation_info table using the reservation_number from customer_info table
    $query2 = "INSERT INTO hotel_reservation_info 
            (reservation_number, reservation_code, hotel_name, hotel_company_info, checkin_date, checkout_date, room_count, room_type, adult_count, child_count, breakfast_included, bed_type, request)
          VALUES ('$reservation_number','$reservation_code', '$hotel_name', '$hotel_company_info', '$checkin_date_result', '$checkout_date_result', '$room_count', '$room_type', '$adult_count', '$child_count', '$breakfast_included', '$bed_type', '$request')";

    $result2 = $mysqli->query($query2);

    // Check if record is inserted successfully
    if($result2) {
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
    if(!$result2) {
        // Rollback transaction if query2 fails
        $mysqli->rollback();
        echo "Error inserting data into hotel_reservation_info table: " . $mysqli->error;
        exit;
    }

    // Commit transaction
    $mysqli->commit();

    // Close connection
    $mysqli->close();

}

if(isset($_POST['tourSubmit'])) {
    // Basic Reservation info
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

    // TOUR INFO
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
    $request = mysqli_real_escape_string($mysqli, $_POST['request']);
    $included_items = mysqli_real_escape_string($mysqli, $_POST['included_items']);
    $exincluded_items = mysqli_real_escape_string($mysqli, $_POST['exincluded_items']);
    $details = mysqli_real_escape_string($mysqli, $_POST['details']);
    $child_age = mysqli_real_escape_string($mysqli, $_POST['child_age']);
    $period_time_from = mysqli_real_escape_string($mysqli, $_POST['period_time_from']);
    $period_time_to = mysqli_real_escape_string($mysqli, $_POST['period_time_to']);

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Start transaction
    $mysqli->autocommit(FALSE);


    // Insert data into customer_info table
    $query1 = "INSERT INTO customer_info 
                (customer_name, reservation_date, contact_number, company_info, reservation_maker_info,employee_email_info
                ,deposit_date,deposit_amount,deposit_currency_type,deposit_status ,payment_date,payment_amount,payment_currency_type,payment_status)
                VALUES ('$customer_name', '$reservation_date', '$contact_number', '$company_info', '$reservation_maker_info', '$employee_email_info'
                ,'$deposit_date','$deposit_amount','$deposit_currency_type','$deposit_status' ,'$payment_date','$payment_amount','$payment_currency_type','$payment_status' )";
    $result1 = $mysqli->query($query1);

    if (!$result1) {
        // Rollback transaction if query1 fails
        $mysqli->rollback();
        echo "Error inserting data into customer_info table: " . $mysqli->error;
        exit;
    }

    // Get the reservation number that was just inserted
    $reservation_number = $mysqli->insert_id;

    // Insert data into golf_reservation_info table using the reservation_number from customer_info table
    $query2 = "INSERT INTO tour_reservation_info 
                (reservation_number, tour_name, tour_time_from, tour_time_to, car_pickup_time, car_pickup_location, car_send_time, car_send_location
                ,adult_count, child_count, guide_included, request, included_items, exincluded_items, details, child_age,
                 period_time_from, period_time_to) 
                VALUES ('$reservation_number', '$tour_name', '$tour_time_from_result', '$tour_time_to_result', '$car_pickup_time_result', '$car_pickup_location', '$car_send_time_result', '$car_send_location'
                ,'$adult_count', '$child_count', '$guide_included', '$request', '$included_items', '$exincluded_items', '$details', '$child_age',
                 '$period_time_from', '$period_time_to')";

    $result2 = $mysqli->query($query2);

    // Check if record is inserted successfully
    if($result2) {
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
    if(!$result2) {
        // Rollback transaction if query2 fails
        $mysqli->rollback();
        echo "Error inserting data into tour_reservation_info table: " . $mysqli->error;
        exit;
    }

    // Commit transaction
    $mysqli->commit();

    // Close connection
    $mysqli->close();

}

?>
</body>
</html>
