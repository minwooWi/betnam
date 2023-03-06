<?php
	if(isset($_SESSION['mem_id'])) {
?>
<div class="header_login_area"><?php echo "<span>". $_SESSION['mem_name']; ?></span>님, 환영합니다. <button class="btn btn-primary" onclick="location.href = './logout.php';">로그아웃</button></div>
<?php
	}
?>