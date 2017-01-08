<?php include('header.php'); include('../checker/notlogincheck.php'); ?>
	<meta http-equiv="refresh" content="30">
	<title>朴村集市 - 编辑信息</title>
	<style>
		.removeBtn {
			display: none;
		}
	</style>
</head>

<body>

<?php include('navbar.php') ?>


	<div class="columns_form corder">

<?php

			$userid = $_SESSION['userid'];
			$usertype = $_SESSION['usertype'];


			/*if($usertype == "99"){

				include('../services/market/adminpostfunc.php');

			}else{*/

				include('../services/market/userpostfunc.php');

			//}
?>
	</div>


<?php include('footer.php') ?>
