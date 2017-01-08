<head>
		<meta http-equiv="content-type" content="text/html" charset="UTF-8">
</head>

<?php

/**
 * Create by WU JIANFENG
 * 2016/4/11
 * Pucun-Takeaway WebApp
 * Order Get and push to database function
 */

	include('../../checker/notlogincheck.php');

	//!!!这行代码无用!!! Get Store ID from SESSION 从SESSION获取商家ID（这里不用SESSION_START是因为在notlogincheck里已经启用了）
	$sid = $_SESSION['sid'];

	//If click submit and content is "提交" 如果用户点击提交类型的按钮且内容为"提交"
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "提交"){

		$orderQty_1 = $_POST['quantity_1'];
		$orderName_1 = $_POST['item_name_1'];
		$orderAmount_1 = $_POST['amount_1'];
		$orderStoreid_1 = $_POST['storeid_1'];

		$orderQty_2 = $_POST['quantity_2'];
		$orderName_2 = $_POST['item_name_2'];
		$orderAmount_2 = $_POST['amount_2'];
		$orderStoreid_2 = $_POST['storeid_2'];

		$orderQty_3 = $_POST['quantity_3'];
		$orderName_3 = $_POST['item_name_3'];
		$orderAmount_3 = $_POST['amount_3'];
		$orderStoreid_3 = $_POST['storeid_3'];

		$orderQty_4 = $_POST['quantity_4'];
		$orderName_4 = $_POST['item_name_4'];
		$orderAmount_4 = $_POST['amount_4'];
		$orderStoreid_4 = $_POST['storeid_4'];

		$orderQty_5 = $_POST['quantity_5'];
		$orderName_5 = $_POST['item_name_5'];
		$orderAmount_5 = $_POST['amount_5'];
		$orderStoreid_5 = $_POST['storeid_5'];

		$allAmount = $_POST['allamount'];
		$note = str_replace("=",",",$_POST['note']);


		if($orderQty_1 == "" || $orderName_1 == "" || $orderAmount_1 == "" || $orderStoreid_1 == ""){

			echo "<script>alert('无法提交订单，至少要选择一样菜品');history.go(-2);</script>";
			exit();

		}

		if($sid == $orderStoreid_1){

			echo "<script>alert('您是商家用户，无法给自己的店铺下单');localStorage.clear();history.go(-2);</script>";
			exit();

		}

		if($_SESSION['usertype'] == '111'){


			echo "<script>alert('您的账号存在个人信息不真实问题，无法下单。请在个人中心中修改信息后，等待审核解除限制（如长时间未通过或存在争议问题，请联系微信公众号）。作为与有递送需求的外卖服务，使用真实的个人信息是十分必要的，谢谢理解。');history.go(-2);</script>";
			exit();


		}

		include('../common/connect.php');

		$userid = $_SESSION['userid'];
		$emailsid = $_POST['storeid_1'];

		//DISCOUNT FUNCTION 从Store数据表获取打折功能
		$sqldiscount = "select dis from store where sid = '$emailsid'";
		$sqldiscountrun = mysqli_query($link,$sqldiscount);
		$sqldiscountt = mysqli_fetch_array($sqldiscountrun);
		echo mysqli_error($link);
		$discount = $sqldiscountt[0];

		//Get User Realname 获取买家信息
		$sqlrealname = "select realname,address,phone,email from user where id = '$userid'";
		$userrealnamerun = mysqli_query($link, $sqlrealname);
		$userrealnamet = mysqli_fetch_array($userrealnamerun);

		//Get Store Email 获取商家邮箱地址
		$sqlsmail = "select email from user where sid = '$emailsid'";
		$semailrun = mysqli_query($link, $sqlsmail);
		$smailt = mysqli_fetch_array($semailrun);

		//Get Store smsPhone 从Store获取短信电话号码数据
		$sqlsmsNum = "select smsnumber from store where sid = '$emailsid'";
		$smsNumrun = mysqli_query($link, $sqlsmsNum);
		$smsNumrunt = mysqli_fetch_array($smsNumrun);

		//为下单后的用户信息创建变量
		$userinfo = $userrealnamet[0].' & '.$userrealnamet[1].' & '.$userrealnamet[2];

		//Set Timezone from PHP timezone funciton 调用PHP默认函数设定时区
		date_default_timezone_set("Europe/London");

		//Set Timezone from PHP time function 调用PHP时间函数获取时间
		$date = date("Y/m/d h:i:sa");

		//Set UNIX time from PHP time function 调用PHP时间函数获取UNIX时间戳（以1970.1.1为起始的一串数字）
		$unixtime = time();

		//Insert order detail to Orderlist table 插入订单数据到Orderlist表
		$sqlinsert = "insert into orderlist (time,userID,userInfo,orderStatus,allAmount,afterDis,orderFeedback,
						item1Name,item1Amount,item1Qty,item1Sid,
						item2Name,item2Amount,item2Qty,item2Sid,
						item3Name,item3Amount,item3Qty,item3Sid,
						item4Name,item4Amount,item4Qty,item4Sid,
						item5Name,item5Amount,item5Qty,item5Sid,note,unixtime)

						value('$date','$userid','$userinfo','1','$allAmount','$discount','0',
						'$orderName_1','$orderAmount_1','$orderQty_1','$orderStoreid_1',
						'$orderName_2','$orderAmount_2','$orderQty_2','$orderStoreid_2',
						'$orderName_3','$orderAmount_3','$orderQty_3','$orderStoreid_3',
						'$orderName_4','$orderAmount_4','$orderQty_4','$orderStoreid_4',
						'$orderName_5','$orderAmount_5','$orderQty_5','$orderStoreid_5','$note','$unixtime')";

		//Run SQL query 将以上语句输入数据库中执行
		$sqlinsertrun = mysqli_query($link, $sqlinsert);

		//If run 如果执行成功
		if($sqlinsertrun){

			//清除由购物车创建的LocalStorage（类Cookie或Session，储存在浏览器的数据本地储存方式）
			echo "<script>localStorage.clear();</script>";

			$toS = "$smailt[0], 465002414@qq.com";
			$subjectS = "朴村外卖 - 店铺订单通知";
			$messageS = "您好，您的店铺在朴村外卖有一个有新的订单。点击这里查看 --> https://waimai.pucun.co.uk/ordercenter.php ";
			$fromS = "hallo@pucun.co.uk";
			$headersS = "From: $fromS";
			mail($toS,$subjectS,$messageS,$headersS);

			$toU = "$userrealnamet[3],";
			$subjectU = "朴村外卖 - 成功下单通知";
			$messageU = "您好，您在朴村外卖成功下单外卖订单。十分钟内未确认订单，请在订单中心中拨打店家电话确认 --> https://waimai.pucun.co.uk/ordercenter.php ";
			$fromU = "hallo@pucun.co.uk";
			$headersU = "From: $fromU";
			mail($toU,$subjectU,$messageU,$headersU);

			if($smsNumrunt[0] != '0'){

				include('../common/smsapi/TextMagicAPI.php');

				$api = new TextMagicAPI(array(
			    "username" => "jianfengwu",
			    "password" => "EnYjuyWXmm"
				));

				$text = "【朴村】您的店铺有新订单，查看：https://waimai.pucun.co.uk/ordercenter.php";

				$phones = array($smsNumrunt[0]);

				$results = $api->send($text, $phones, true);

			}


			echo "<script>alert('提交成功，现在去订单中心看看店家有没有确认吧');window.location.href='../../ordercenter.php';</script>";
		}else{
			echo mysqli_error($link);
			echo "<script>alert('出问题了？快通过微信报告给管理员');history.go(-1)</script>";
		}


	}

?>
