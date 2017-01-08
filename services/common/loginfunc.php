<!--CREATE BY WU JIANFENG IN APRIL 11 2016-->
<head>

	<meta http-equiv="content-type" content="text/html" charset="UTF-8">
	<title>测试-登录</title>

</head>

<?php

/**
 * Login-Database-Test
 * Developer: JEFF-PC
 * Date: 2015/7/14
 * Time: 16:48
 */

	//Start SESSION Function 功能SESSION调用语，用于在用户浏览器中写入已登陆状态
	session_start();


	//If user click submit button and content is "登陆" 如果用户点击了提交按钮，且内容为"登陆"
    if(isset($_POST["submit"]) && $_POST["submit"] == "登录"){
		$user = $_POST["username"];
		$psw = $_POST["password"];


		//Security Check important 安全检查用户是否输入正确的内容，防止用户输入数据库语句
		if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["username"])){
			echo "<script>alert('用户名不可以输入符号'); history.go(-1)</script>";
			exit();
		}

		if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["password"])){
			echo "<script>alert('密码不可以输入符号'); history.go(-1)</script>";
			exit();
		}

		//Check if user actually input username and password 检查用户是否输入用户名和密码
		if($user == "" || $psw == ""){
			//调用JavaSctipt弹出提示
			echo " <script>alert('忘记输用户名或密码了？'); history.go(-1)</script> ";

		}else{

			//Find the username and return a number 连接数据库，查询用户输入的用户名并返回用户名和密码（这里只做是否存在查询，与实际检查密码层面分离）
			include('connect.php');
			$sqlcheck = "select username,password from user where username = '$user'";
			$sqlcheckrun = mysqli_query($link,$sqlcheck);
			$num = mysqli_num_rows($sqlcheckrun);

			//If the username exist 如果用户名存在，那么执行
			if($num){
				$row = mysqli_fetch_array($sqlcheckrun); //change data type to what can print 这行的作用是把数据库查询的语句转换成一个数组，可打印

				//Return psw by username and display 通过用户名查询密码是否正确
				$sqlpsw = "select password from user where username = '$row[0]'";
				$userpswrun = mysqli_query($link, $sqlpsw);
				$userpswt = mysqli_fetch_array($userpswrun);

					//Verify the password which is been encryption 验证密码
					if(password_verify($psw,$userpswt[0])){
						//Return userid by username and display 通过用户名返回用户ID
						$sqlid = "select id from user where username = '$row[0]'";
						$useridrun = mysqli_query($link, $sqlid);
						$useridt = mysqli_fetch_array($useridrun);

						//Return usertype by username and display 通过用户ID返回用户类型，真实姓名，商户ID到变量
						$sqluinfo = "select usertype,realname,sid from user where id = '$useridt[0]'";
						$uinforun = mysqli_query($link, $sqluinfo);
						$uinfot = mysqli_fetch_array($uinforun);


						//在SESSION中写入用户名，用户ID，用户类型，真实姓名和商店ID
						$_SESSION['username'] = $row[0];
						$_SESSION['userid'] = $useridt[0];
						$_SESSION['usertype'] = $uinfot[0];
						$_SESSION['realname'] = $uinfot[1];
						$_SESSION['sid'] = $uinfot[2];

						$userstatus = $_SESSION['username'];

						echo "'欢迎您','$uinfot[1]','正在登录...'";

						//alert
						echo "<script>alert('登录成功');window.location.href='../../index.php';</script>";

					//If password not right 如果密码验证识别，提示内容并自动返回上一步
					}else{

						echo "<script>alert('用户名或密码错误');history.go(-1);</script>";
					}
			//If user does not exist 如果用户不存在，提示内容并自动返回上一步（提示内容相同，以防止暴力猜测用户名是否存在）
			}else{
				echo"<script>alert('用户名或密码错误');history.go(-1);</script>";
			}
		}
	//If no login button that the website is close 如果不存在提交按钮则识别为站点已经被关闭，提示内容并自动返回上一步
	}else{
	    echo"<script>alert('站点维护，暂时关闭');history.go(-1);</script>";
    }

	//Print database connect error 打印数据库报错信息（如果有）
	echo mysqli_error();

	//If logout unset the SESSION 登出，撤销所有SESSION数据
	if($_GET['action'] == "logout"){
		unset($_SESSION['userid']);
		unset($_SESSION['username']);
		unset($_SESSION['usertype']);
		unset($_SESSION['realname']);

		if(isset($_SESSION['sid'])){
			unset($_SESSION['sid']);
		}

		session_destroy();
		//跳转至登陆界面
		header("Location:../../login.php");
	}




?>
