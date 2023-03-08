<?php
$reservation_type = $_GET['type'];
//including the database connection file
include("./datasource/config.php");

$requiredReadingQuery = "SELECT * FROM terms_and_conditions 
          where 1=1
          and type = 'required_reading'
          and reservation_type = '$reservation_type'"
;

$requiredReadingResult = mysqli_query($mysqli, $requiredReadingQuery); // using mysqli_query instead

while($res = mysqli_fetch_array($requiredReadingResult)) {
	echo "<div class=\"main_reservation_desc\" style=\"border-top: solid 0.3em rgb(171 131 104);\">";
    echo $res['content'];
	echo "</div>";
}
?>