<?php
// including the database connection file
include_once("./datasource/config.php");

//getting id from url
$type = $_GET['type'];
$reservation_number = $_GET['reservation_number'];

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

                headers = ["Golf Reservation Code", "Company Info", "Reservation Maker Info", "Customer Name", "Reservation Date", "Contact Number", "Employee Email Info", "Deposit Date", "Deposit Amount", "Deposit Currency Type", "Deposit Status", "Payment Date", "Payment Amount", "Payment Currency Type", "Payment Status", "Golf Course Name", "Golf Company Info", "Reservation Schedule", "Tee Time", "Hole", "Headcount", "Included Items", "Excluded Items", "Request"];
                data = [["<?php echo $reservation_code;?>", "<?php echo preg_replace('/\r\n|\r|\n/','',$company_info);?>", "<?php echo $reservation_maker_info;?>", "<?php echo $customer_name;?>", "<?php echo $reservation_date;?>", "<?php echo $contact_number;?>", "<?php echo $employee_email_info;?>", "<?php echo $deposit_date;?>", "<?php echo $deposit_amount;?>", "<?php echo $deposit_currency_type;?>", "<?php echo $deposit_status;?>", "<?php echo $payment_date;?>", "<?php echo $payment_amount;?>", "<?php echo $payment_currency_type;?>", "<?php echo $payment_status;?>", "<?php echo $golf_course_name;?>", "<?php echo $golf_company_info;?>", "<?php echo $reservation_schedule;?>", "<?php echo $tee_time;?>", "<?php echo $hole;?>", "<?php echo $headcount;?>", "<?php echo $included_items;?>", "<?php echo $exincluded_items;?>", "<?php echo $request;?>"]];

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
        window.location.href = '/betnam/index.php';
    }

    function s2ab(s) {
        let buf = new ArrayBuffer(s.length); //convert s to arrayBuffer
        let view = new Uint8Array(buf);  //create uint8array as viewer
        for (let i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF; //convert to octet
        return buf;
    }
</script>
