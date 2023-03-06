<?php
	include_once("./datasource/config.php");
	
	$mem_id = mysqli_real_escape_string($mysqli, $_POST['mem_id']);
	$mem_password = mysqli_real_escape_string($mysqli, $_POST['mem_password']);
	
	$adm_info_query = "
		SELECT 
			mem_id
			, mem_name
			, mem_password
			, email
			, mem_status
		FROM 
			tb_betnam_admin 
		WHERE 
			mem_id = '".$mem_id."' 
		AND mem_password = md5('".$mem_password."') 
	";
	
	$adm_info_result = mysqli_query($mysqli, $adm_info_query); // using mysqli_query instead
	
	while($adm_info_res = mysqli_fetch_array($adm_info_result)) {
		session_start();
		$_SESSION['mem_id'] = $adm_info_res['mem_id'];
		$_SESSION['mem_name'] = $adm_info_res['mem_name'];
		$_SESSION['mem_password'] = $adm_info_res['mem_password'];
		$_SESSION['mem_email'] = $adm_info_res['email'];
		$_SESSION['mem_status'] = $adm_info_res['mem_status'];
		
		header("Location: /betnam/index.php");
		exit;
	}

	if(!$adm_info_res) {
		echo "<script>";
		echo "alert('아이디 또는 비밀번호가 다릅니다.\\r\\n아이디와 비밀번호를 정확히 입력해주세요.'); location.href = '/betnam/login.php';";
		echo "</script>";
		exit;
	}
?>