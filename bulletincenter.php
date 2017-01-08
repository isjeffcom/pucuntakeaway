<!--CREATE BY WU JIANFENG IN APRIL 11 2016-->
<?php include('header.php'); include('./checker/notlogincheck.php'); ?>

	<title>朴村外卖 - 店铺管理</title>
	<style>
		.removeBtn {
			display: none;
		}
	</style>
</head>




<body>

	<?php include('navbar.php');?>

	<?php

	$usertype = $_SESSION['usertype'];
	if($usertype == '1'){
		echo "<script>alert('您是普通用户，无法进入商家店铺页面');history.go(-1);</script>";
		exit();
	}


	?>

	<div class='columns_form bulletininput'>

		<figure>
			<?php
				include('./services/common/connect.php');
				$sid = $_SESSION['sid'];
				$sql = "select sname,dis from store where sid = '$sid'";
				$sqlrun = mysqli_query($link,$sql);
				$sqlrunt = mysqli_fetch_array($sqlrun);

				echo "<br><br><br><a>您的店铺 ".$sqlrunt[0]." 状态良好</a><a href='store.php?sid=".$sid."'> 进入 </a>";
				if($sqlrunt[1] == '0' || $sqlrunt [1] == '00'){
					echo "<br><a>您目前无优惠折扣活动 </a><br>";
				}else{
					echo "<br><a>优惠折扣："."$sqlrunt[1]"."%  </a><br>";
				}

				mysqli_close($link);


			?>
			<br><br>
			<form action="./services/takeaway/bulletinfunc.php" method="post">



				<input type="Submit" name="Submit" style="background-color:#58c271 !important;" value="接受送货">
				<input type="Submit" name="Submit" style="background-color:#ec7852 !important;" value="店铺打烊">
				<a>（打烊后用户还是可以继续下单预定，但您无需确认）</a>
				<br><br>

				<a>公告牌</a><br><br>
				<input type="text" name="bulletin" value="填写公告">
				<input type="Submit" name="Submit" value="发布公告">

			</form>

		</figure>

		<figure>
			<form action="./services/takeaway/bulletinfunc.php" method="post">
				<input type="number" name="discountValue" value="填写折扣(数字10-90)，不打折则为0"><a>%</a>
				<br><a>(填写折扣(数字10-90)，不打折则输入0)</a>
				<input type="Submit" name="updateDV" value="更新折扣">
			</form>
		</figure>

		<figure>
			<form action="storeupdate.php">
				<input type="Submit" name="Submit"style="background-color:#58c271 !important;" value="菜单管理">
			</form>
		</figure>

	</div>

	<?php include('footer.php');?>
</body>
