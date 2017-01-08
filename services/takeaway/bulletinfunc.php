<meta http-equiv="content-type" content="text/html" charset="UTF-8">

<?php

/**
 * Create by WU JIANFENG
 * 2016/4/11
 * Pucun-Takeaway WebApp
 * If not login function
 */

	//Login First 必须登陆后才能进入
	include('../../checker/notlogincheck.php');

	//sid = Store ID 从SESSION获取ID
	//Get bulletin input POST from front-end 从前端获取POST的文字数据
	$sid = $_SESSION['sid'];
	$text = $_POST['bulletin'];

	//Connect to Database
	include('../common/connect.php');

	//Update bulletin text 更新公告栏文字
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "发布公告"){


		$sql = "update store set sbulletin = '$text' where sid = '$sid'";
		$sqlrun = mysqli_query($link, $sql);

		if($sqlrun){

			echo "<script>alert('公告栏更新成功');history.go(-1);</script>";

		}else{

			echo mysqli_error($link);
			echo "<script>alert('出问题了，通过微信联系我们');history.go(-1);</script>";

		}

	}

	//Open the Store 店铺开业 更新店铺状态为 1
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "接受送货"){

		$sql = "update store set sstatus = '1' where sid = '$sid'";
		$sqlrun = mysqli_query($link, $sql);

		if($sqlrun){

			echo "<script>alert('店铺已开业');history.go(-1);</script>";

		}else{

			echo mysqli_error($link);
			echo "<script>alert('出问题了，通过微信联系我们');history.go(-1);</script>";

		}

	}

	//Close the Store 店铺开业 更新店铺状态为 0
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "店铺打烊"){

		$sql = "update store set sstatus = '0' where sid = '$sid'";
		$sqlrun = mysqli_query($link, $sql);

		if($sqlrun){

			echo "<script>alert('店铺已打烊');history.go(-1);</script>";

		}else{

			echo mysqli_error($link);
			echo "<script>alert('出问题了，通过微信联系我们');history.go(-1);</script>";

		}

	}

	//2016.5.12 Update the Discount Value custom by Store User 更新折扣信息
	if(isset($_POST["updateDV"]) && $_POST["updateDV"] == "更新折扣"){

		$value = $_POST['discountValue'];
		echo "a";

		if($value < 100 && $value > -1){

		$sql = "update store set dis = '$value' where sid = '$sid'";
		$sqlrun = mysqli_query($link,$sql);
		echo mysqli_error($link);
		echo "<script>alert('已成功更新，您输入的折扣为".$value."%，打折开始，谢谢。');history.go(-1);</script>";

		}else{

			echo "<script>alert('您输入的数值不对，或无法更新至数据库');history.go(-1);</script>";
			echo "c";
		}
	}


?>
