<!--CREATE BY WU JIANFENG IN APRIL 11 2016-->
<head>

	<meta http-equiv="content-type" content="text/html" charset="UTF-8">
	<title>邀请码生成器</title>

</head>

<?php

/**
 * Create by WU JIANFENG
 * 2016/4/11
 * Pucun-Takeaway WebApp
 * Create InviteCode function
 */
	//调用连接数据库代码
	include('../common/connect.php');

	session_start();

	//Invide Code Create funciton 邀请码生成功能

	//Get USER ID from SESSION 从SESSION拿取现在登陆用户的ID
	$uid = $_SESSION['userid'];

	//Get User input from Front-End POST 从前端输入框拿取用户输入内容
	$code = $_POST["invitercode"];

	//If user click submit button and value is "生成邀请码" 如果用户点击提交按钮，且按钮内容为：“生成邀请码”
	if(isset($_POST["Submit"]) && $_POST["Submit"] == "生成邀请码"){

		//Check User input's content for security reason 调用安全检查代码，对用户输入内容做安全检查，避免用户输入数据库语句
		include('../../checker/scycheck.php');

		//Do MD5 encryption for what user input 对用户输入内容做MD5加密
		$enCode = md5($code);

		//Insert content to database 将MD5加密后的用户输入内容和用户输入内容写入数据库
		$sql = "insert into invitecode (uid,realcode,code,ucount) value('$uid','$code','$enCode','0')";
		$sqlrun = mysqli_query($link, $sql);

		//Tell the user if successful 告知用户是否生成成功
		if($sqlrun){
			//使用JavaScript代码弹出通知
			echo "<script>alert('邀请码生成成功');history.go(-1);</script>";
		}else{
			echo "<script>alert('无法生存邀请码，请微信联系管理员');history.go(-1);</script>";
		}

	}



?>
