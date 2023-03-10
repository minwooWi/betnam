<?php
include_once("./datasource/config.php");

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST["golfUpload"])) {
    // Get the uploaded file name
    $filename = $_FILES["file"]["name"];

    // Get the temporary file path
    $tmpFilePath = $_FILES['file']['tmp_name'];

    // Check if file is an Excel file
    $fileType = pathinfo($filename, PATHINFO_EXTENSION);
    if($fileType != "xlsx" && $fileType != "xls") {
        die("Error: File is not an Excel file.");
    }

    // Load the Excel file using PHPExcel library
    require_once('./PHPExcel.php');
    $objPHPExcel = PHPExcel_IOFactory::load($tmpFilePath);

    // Get the sheet data as an array
    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

    // Loop through the sheet data and insert into the database
    foreach($sheetData as $index => $row) {
        // Skip the first row (header)
        if ($index === 1 || empty($row["A"]) || empty($row["B"]) || empty($row["C"]) || empty($row["D"]) || empty($row["E"]) || empty($row["F"]) || empty($row["G"]) || empty($row["H"]) || empty($row["I"]) || empty($row["J"]) || empty($row["K"])) {
            continue;
        }

        //customer_info
        $column1 = mysqli_real_escape_string($mysqli, $row["A"]);
        $column2 = date('Y-m-d', strtotime(mysqli_real_escape_string($mysqli, $row["B"])));
        $column3 = mysqli_real_escape_string($mysqli, $row["C"]);
        $column4 = mysqli_real_escape_string($mysqli, $row["D"]);
        $column5 = mysqli_real_escape_string($mysqli, $row["E"]);
        $column6 = mysqli_real_escape_string($mysqli, $row["F"]);
        $column7 = date('Y-m-d', strtotime(mysqli_real_escape_string($mysqli, $row["G"])));
        $column8 = mysqli_real_escape_string($mysqli, $row["H"]);
        $column9 = mysqli_real_escape_string($mysqli, $row["I"]);
        $column10 = mysqli_real_escape_string($mysqli, $row["J"]);
        $column11 = date('Y-m-d', strtotime(mysqli_real_escape_string($mysqli, $row["K"])));
        $column12 = mysqli_real_escape_string($mysqli, $row["L"]);
        $column13 = mysqli_real_escape_string($mysqli, $row["M"]);
        $column14 = mysqli_real_escape_string($mysqli, $row["N"]);

        //golf_reservation_info
        $column15 = mysqli_real_escape_string($mysqli, $row["O"]);
        $column16 = mysqli_real_escape_string($mysqli, $row["P"]);
        $column17 = date('Y-m-d', strtotime(mysqli_real_escape_string($mysqli, $row["Q"])));
        $column18 = mysqli_real_escape_string($mysqli, $row["R"]);
        $column19 = mysqli_real_escape_string($mysqli, $row["S"]);
        $column20 = mysqli_real_escape_string($mysqli, $row["T"]);
        $column21 = mysqli_real_escape_string($mysqli, $row["U"]);
        $column22 = mysqli_real_escape_string($mysqli, $row["V"]);
        $column23 = mysqli_real_escape_string($mysqli, $row["W"]);
        $column24 = mysqli_real_escape_string($mysqli, $row["X"]);

        // Insert into customer_info table
        $customerSql = "INSERT INTO customer_info 
            (customer_name, reservation_date, contact_number, company_info, reservation_maker_info, employee_email_info, deposit_date, deposit_amount, 
             deposit_currency_type, deposit_status, payment_date, payment_amount, payment_currency_type, payment_status)
            VALUES ('$column1', '$column2', '$column3', '$column4', '$column5', '$column6', '$column7', '$column8', 
            '$column9', '$column10', '$column11', '$column12', '$column13', '$column14')";

        if (mysqli_query($mysqli, $customerSql)) {
            $customerReservationNumber = mysqli_insert_id($mysqli);
            echo "Record inserted into customer_info successfully. Reservation Number: $customerReservationNumber<br>";
        } else {
            echo "Error: " . $customerSql . "<br>" . mysqli_error($mysqli);
        }

        // Insert into golf_reservation_info table
        $golfSql = "INSERT INTO golf_reservation_info 
            (reservation_number, golf_course_name, golf_company_info, reservation_schedule, tee_time, hole, headcount, included_items,
             request, reservation_code, exincluded_items)
            VALUES ('$customerReservationNumber', '$column15', '$column16', '$column17', '$column18', '$column19', '$column20', '$column21',
            '$column22', '$column23', '$column24')";

        if (mysqli_query($mysqli, $golfSql)) {
            echo "Record inserted into golf_reservation_info successfully.<br>";
        } else {
            echo "Error: " . $golfSql . "<br>" . mysqli_error($mysqli);
        }
    }

    // Close the database connection
    mysqli_close($mysqli);

    header("Location: /betnam/index.php");

}



?>