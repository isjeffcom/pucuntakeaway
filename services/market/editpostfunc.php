<meta http-equiv="content-type" content="text/html" charset="UTF-8">

<?php

/**
 * Create by WU JIANFENG
 * 2016/5/22
 * Pucun-FleaMarket WebApp
 * If not login function
 */

	//Login First 必须登陆后才能进入
	include('../../checker/notlogincheck.php');

	//If user click submit 如果用户点击update名字的按钮，内容为提交，则执行
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "发布"){

		echo '1';
		//Collect data from SESSION and front-end从SESSION和前端拿取必要数据
		//USER DATA用户数据
		$username = $_SESSION['username'];
		$userid = $_SESSION['userid'];
		$usertype = $_SESSION['usertype'];

		//ITEM INFO
		$item_name = $_POST['item-name'];
		$item_age = $_POST['item-age'];
		$item_details = $_POST['item-details'];
		$item_price = $_POST['item-price'];
		$item_contacts = $_POST['item-contacts'];
		$item_tel = $_POST['item-tel'];
		$item_wechat = $_POST['item-wechat'];

		//Include upload function调用上传功能代码
		include('../common/uploadfunc.php');

		if(isset($tf)){
			$mPic = $tf;
		}else{
			$mPic = null;
		}

		//Set Timezone from PHP timezone funciton 调用PHP默认函数设定时区
		date_default_timezone_set("Europe/London");

		//Set Timezone from PHP time function 调用PHP时间函数获取时间
		$date = date("Y/m/d h:i:sa");


		include('../common/connect.php');

		$sql = "insert into m_post (user,userid,item_name,item_age,item_img,item_details,item_price,item_contacts,item_tel,item_wechat,pub_time,mod_time) value('$username','$userid','$item_name','$item_age','$mPic','$item_details','$item_price','$item_contacts','$item_tel','$item_wechat','$date','$date')";
		$sqlrun = mysqli_query($link, $sql);
		echo mysqli_error($link);

		if($sqlrun){
			echo "<script>alert('成功发布消息');history.go(-1);</script>";
		}else{
			echo mysqli_error($link);
			echo "<script>alert('出问题了');history.go(-1);</script>";
		}

	}

?>
