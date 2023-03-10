<?php
	$footer_query = "SELECT * FROM terms_and_conditions 
          where 1=1
          and type = 'common_footer'
          and reservation_type = 'common_footer'"
	;
	
	$footer_Result = mysqli_query($mysqli, $footer_query); // using mysqli_query instead
	
	while($footer_res = mysqli_fetch_array($footer_Result)) {
?>
<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span><?php echo $footer_res['content']; ?></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->
<?php } ?>