<?php
	session_start();
	
	if(isset($_SESSION['mem_id'])) {
		header("Location: /betnam");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<?php if($is_sub == "Y") { ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php } else { ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<?php } ?>
    <title><?php echo $tag_title; ?></title>
	
    <!-- Custom fonts for this template -->
    <link href="https://cdn.jsdelivr.net/gh/sunn-us/SUIT/fonts/static/woff2/SUIT.css" rel="stylesheet" />
    <style> * {font-family: 'SUIT', sans-serif;} </style>
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	
    <!-- Custom styles for this template -->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet" />
	
    <!-- Custom styles for this page -->
    <link href="./vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<?php if($is_sub == "Y") { ?>
	<link href="./css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<?php } else if($is_sub == "Login") { ?>
	<link href="./css/login.css" rel="stylesheet" />
	<?php } ?>
</head>

<body id="page-top">