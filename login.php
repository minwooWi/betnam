<?php
	$is_sub = "Login";
	$tag_title = "베트남초이스 예약 확정 관리자";
	include_once("./include/login_header.php");
?>

<div class="container">
	<form class="form-signin" name="login_form" id="login_form" method="post" action="login_ok.php">
		<div class="form-signin-top-banner">
			<img src="./img/banner.png" />
		</div>
		
		<label for="inputMemId" class="sr-only">ID</label>
		<input type="text" id="inputMemId" name="mem_id" class="form-control" placeholder="ID" required autofocus />
		<label for="inputPassword" class="sr-only">PASSWORD</label>
		<input type="password" id="inputPassword" name="mem_password" class="form-control" placeholder="PASSWORD" required />
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
	</form>
</div> <!-- /container -->


<?php
	$footer_gb = "main";
	include_once("./include/footer.php");
?>