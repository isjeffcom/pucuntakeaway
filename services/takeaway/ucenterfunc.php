<head>
	<meta http-equiv="content-type" content="text/html" charset="UTF-8">
	<title>朴村外卖 - 用户信息更新</title>
</head>

<?php

/**
 * Create by WU JIANFENG
 * 2016/3/29
 * Pucun-Takeaway WebApp
 * User Center function
 */


		include('../../checker/notlogincheck.php');
		include('../common/connect.php');

		//CHECK IF SUBMIT BUTTON BEEN MODIFY
		if(isset($_POST["Submit"]) && $_POST["Submit"] == "确认修改"){

			$username = $_SESSION['username'];
			$userid = $_SESSION['userid'];
			$orpsw = $_POST["orpassword"];
			$newpsw = $_POST["newpassword"];
			$email = $_POST["email"];
			$realname = $_POST["realname"];
			$idnum = $_POST["idnum"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];

			//LOAD SQL INJECT PROTECTOR
			include('../../checker/scycheck.php');

			//Return userid by username and display
			$sqlpsw = "select password from user where id = '$userid'";
			$userpswrun = mysqli_query($link, $sqlpsw);
			$userpswt = mysqli_fetch_array($userpswrun);

			if(password_verify($orpsw,$userpswt[0])){
				//PASSWORD NOT CHANGE SO...
				if($_POST["newpassword"] ==""){

					//DATABASE CONTROLLER - UPDATE DATABASE DATA
					$sql_update_nopsw = "update user set email = '$_POST[email]', realname = '$_POST[realname]',idnum = '$_POST[idnum]', phone = '$_POST[phone]',address = '$_POST[address]' where username = '$username'";
			        $res_update_nopsw = mysqli_query($link,$sql_update_nopsw);


						if ($res_update_nopsw){

	                        echo "<script>alert('修改成功'); history.go(-1);</script>";

						}else{

	                        echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
	                    }

				//ELSE PASSWORD CHANGE SO...
				}else{
					//DATABASE CONTROLLER - UPDATE DATABASE DATA
					$newpsw = password_hash($newpsw,PASSWORD_DEFAULT);
			        $sql_update_psw = "update user set password = '$newpsw', email = '$_POST[email]', realname = '$_POST[realname]',idnum = '$_POST[idnum]', phone = '$_POST[phone]', address = '$_POST[address]' where id = '$userid'";
			        $res_update_psw = mysqli_query($link,$sql_update_psw);

						//IF USER CHANGE PASSWORD -> UNSET SESSION TO FORCE USER RE-LOGIN
						if ($res_update_psw){
		            unset($_SESSION['userid']);
								unset($_SESSION['username']);
								unset($_SESSION['usertype']);
								unset($_SESSION['realname']);
								if(isset($_SESSION['sid'])){
									unset($_SESSION['sid']);
								}
		                        echo "<script>alert('修改成功，请重新登陆'); window.location.href='../../login.php';</script>";

							}else{
								//DATABASE ERROR
		                        echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
		                    }

				}

			}else{
				echo "<script>alert('输入正确的旧密码，才能更改信息');history.go(-1);</script>";
			}
		}
?>
