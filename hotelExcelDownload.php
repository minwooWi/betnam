<?php
// including the database connection file
include_once("./datasource/config.php");

//getting id from url
$type = $_GET['type'];
$reservation_number = $_GET['reservation_number'];

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
    ;
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

                headers = [  "Hotel reservation_code"
                    ,"hotel_name"
                    ,"hotel_company_info"
                    ,"checkin_date"
                    ,"checkout_date"
                    ,"room_count"
                    ,"room_type"
                    ,"adult_count"
                    ,"child_count"
                    ,"child_age"
                    ,"breakfast_included"
                    ,"bed_type"
                    ,"request"
                    ,"early_checkin"
                    ,"late_checkout"];
                data = [["<?php echo $reservation_code;?>", "<?php echo $hotel_name;?>", "<?php echo $hotel_company_info;?>", "<?php echo $checkin_date;?>", "<?php echo $checkout_date;?>", "<?php echo $room_count;?>", "<?php echo $room_type;?>", "<?php echo $adult_count;?>", "<?php echo $child_count;?>", "<?php echo $child_age;?>", "<?php echo $breakfast_included;?>", "<?php echo $bed_type;?>", "<?php echo $request;?>", "<?php echo $early_checkin;?>", "<?php echo $late_checkout;?>"]]

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
