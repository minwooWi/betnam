<?php
$reservation_type = $_GET['type'];
//including the database connection file
include("./datasource/config.php");

$query1 = "SELECT * FROM terms_and_conditions 
          where 1=1
          and type = 'notice'
          and reservation_type = '$reservation_type'"
;


$query2 = "SELECT * FROM terms_and_conditions 
          where 1=1
          and type = 'cancellation'
          and reservation_type = '$reservation_type'"
;

$termsResult = mysqli_query($mysqli, $query1); // using mysqli_query instead
$conditionsResult = mysqli_query($mysqli, $query2); // using mysqli_query instead

//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
while($res = mysqli_fetch_array($termsResult)) {
    echo "<div class=\"contentBox\">► 유의 사항";
    echo "<div style=\"border-top: solid 0.3em rgb(171 131 104);\"></div>";
    echo "<div class=\"main_reservation_desc\">".$res['content']."</div>";
    echo "<div style=\"border-top: solid 0.3em rgb(171 131 104);\"></div>";
    echo "</div>";
}
while($res = mysqli_fetch_array($conditionsResult)) {
    echo "<div class=\"contentBox\">► 취소 규정";
    echo "<div style=\"border-top: solid 0.3em rgb(171 131 104);\"></div>";
    echo "<div class=\"main_reservation_desc\">".$res['content']."</div>";
    echo "<div style=\"border-top: solid 0.3em rgb(171 131 104);\"></div>";
    echo "</div>";
}
?>