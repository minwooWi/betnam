<?php
	if($footer_gb == "main") {
?>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="./vendor/jquery/jquery.min.js?dt=<?php echo date("YmdHis"); ?>"></script>
<script src="./vendor/bootstrap/js/bootstrap.bundle.min.js?dt=<?php echo date("YmdHis"); ?>"></script>

<!-- Core plugin JavaScript-->
<script src="./vendor/jquery-easing/jquery.easing.min.js?dt=<?php echo date("YmdHis"); ?>"></script>

<!-- Custom scripts for all pages-->
<script src="./js/sb-admin-2.min.js?dt=<?php echo date("YmdHis"); ?>"></script>

<!-- Page level plugins -->
<script src="./vendor/datatables/jquery.dataTables.min.js?dt=<?php echo date("YmdHis"); ?>"></script>
<script src="./vendor/datatables/dataTables.bootstrap4.min.js?dt=<?php echo date("YmdHis"); ?>"></script>

<!-- Page level custom scripts -->
<script src="./js/index.js?dt=<?php echo date("YmdHis"); ?>"></script>
<script src="./js/common.js?dt=<?php echo date("YmdHis"); ?>"></script>
</body>
</html>
<?php
	} else if($footer_gb == "sub_regist") {
?>
<!-- Bootstrap JavaScript -->
<script src="./js/jquery-3.5.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<!-- custom -->
<script src="./js/jspdf.min.js?dt=<?php echo date("YmdHis"); ?>"></script>
<script src="./js/html2canvas.js?dt=<?php echo date("YmdHis"); ?>"></script>
<script src="./js/custom.js?dt=<?php echo date("YmdHis"); ?>"></script>
<script src="./js/common.js?dt=<?php echo date("YmdHis"); ?>"></script>
</body>
</html>
<?php
	} else if($footer_gb == "sub_edit") {
?>
<script src="./js/moment.min.js"></script>
<!-- SheetJS -->
<script src="./js/xlsx.full.min.js"></script>
<!--FileSaver [savaAs 함수 이용] -->
<script src="./js/FileSaver.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="./js/jquery-3.5.1.slim.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>

<!-- custom -->
<script src="./js/jspdf.min.js?dt=<?php echo date("YmdHis"); ?>"></script>
<script src="./js/html2canvas.js?dt=<?php echo date("YmdHis"); ?>"></script>
<script src="./js/custom.js?dt=<?php echo date("YmdHis"); ?>"></script>
<script src="./js/common.js?dt=<?php echo date("YmdHis"); ?>"></script>
</body>
</html>
<?php
	}
?>