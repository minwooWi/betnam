<?php
// including the database connection file
include_once("./datasource/config.php");

//getting id from url
$type = $_GET['type'];
$reservation_number = $_GET['reservation_number'];

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

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<!-- SheetJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.14.3/xlsx.full.min.js"></script>
<!--FileSaver [savaAs 함수 이용] -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
<script>
    let excelHandler;
    setTimeout(() => {
        excelHandler = {
            getExcelFileName : function(){
                return '<?php echo $type;?>_info_'+moment().format('YYYY-MM-DD HH:mm:ss')+'.xlsx';
            },
            getSheetName : function(){
                return '<?php echo $type;?>_info';
            },
            getExcelData: function(){
                let headers;
                let data;

                headers = [ "reservation_number",
                    "tour_name",
                    "tour_time_from",
                    "tour_time_to",
                    "car_pickup_time",
                    "car_pickup_location",
                    "car_send_time",
                    "car_send_location",
                    "adult_count",
                    "child_count",
                    "guide_included",
                    "details",
                    "child_age",
                    "period_time_from",
                    "period_time_to",
                    "request",
                    "included_items",
                    "exincluded_items"];

                data = [[ "<?php echo $reservation_number;?>",
                            "<?php echo $tour_name;?>",
                            "<?php echo $tour_time_from;?>",
                            "<?php echo $tour_time_to;?>",
                            "<?php echo $car_pickup_time;?>",
                            "<?php echo $car_pickup_location;?>",
                            "<?php echo $car_send_time;?>",
                            "<?php echo $car_send_location;?>",
                            "<?php echo $adult_count;?>",
                            "<?php echo $child_count;?>",
                            "<?php echo $guide_included;?>",
                            "<?php echo $details;?>",
                            "<?php echo $child_age;?>",
                            "<?php echo $period_time_from;?>",
                            "<?php echo $period_time_to;?>",
                            "<?php echo $request;?>",
                            "<?php echo $included_items;?>",
                            "<?php echo $exincluded_items;?>"]];

                return [headers, ...data];
            },
            getWorksheet : function(){
                return XLSX.utils.aoa_to_sheet(this.getExcelData());
            }
        };

        saveExcelFile();
    }, 1000);

    function saveExcelFile() {
        let wb = XLSX.utils.book_new();
        let newWorksheet = excelHandler.getWorksheet();
        XLSX.utils.book_append_sheet(wb, newWorksheet, excelHandler.getSheetName());
        let wbout = XLSX.write(wb, {bookType:'xlsx',  type: 'binary'});
        saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), excelHandler.getExcelFileName());
        window.location.href = 'http://naobilly.kr/betnam/index.php';
    }

    function s2ab(s) {
        let buf = new ArrayBuffer(s.length); //convert s to arrayBuffer
        let view = new Uint8Array(buf);  //create uint8array as viewer
        for (let i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF; //convert to octet
        return buf;
    }
</script>
