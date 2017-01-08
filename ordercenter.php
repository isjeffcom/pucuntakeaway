<?php include('header.php'); include('./checker/notlogincheck.php'); ?>
	<title>朴村外卖 - 订单中心</title>
	<style>
		.removeBtn {
			display: none;
		}
	</style>
</head>

<body>

<?php include('navbar.php') ?>


	<div class="columns_form corder">
		<input type=button value=刷新 onclick="location.reload()"> <br/><br/>

<?php
			session_start();

			$userid = $_SESSION['userid'];
			$usertype = $_SESSION['usertype'];


			if($usertype == "1"){
				include('./services/takeaway/userorderfunc.php');
			}

			if($usertype == "2"){

				include('./services/takeaway/buserorderfunc.php');
			}

			if($usertype == "99"){

				include('./services/takeaway/adminorderfunc.php');
			}
?>
	</div>


<?php include('footer.php') ?>
