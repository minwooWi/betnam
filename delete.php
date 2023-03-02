<?php
//including the database connection file
include_once("./datasource/config.php");

//getting id of the data from url
$reservation_number = $_GET['reservation_number'];

// Begin a transaction
$mysqli->begin_transaction();

try {
    // Delete the reservation from the golf_reservation_info table
    $stmt1 = $mysqli->prepare("DELETE FROM golf_reservation_info WHERE reservation_number = ?");
    $stmt1->bind_param("i", $reservation_number);
    $stmt1->execute();
    $stmt1->close();

    // Delete the reservation from the customer_info table
    $stmt2 = $mysqli->prepare("DELETE FROM customer_info WHERE reservation_number = ?");
    $stmt2->bind_param("i", $reservation_number);
    $stmt2->execute();
    $stmt2->close();

    // Commit the transaction
    $mysqli->commit();

    //redirecting to the display page (index.php in our case)
    header("Location:index.php");
} catch (Exception $e) {
    // Rollback the transaction if an error occurs
    $mysqli->rollback();

    echo "Error deleting reservation: " . $e->getMessage();
}

?>

