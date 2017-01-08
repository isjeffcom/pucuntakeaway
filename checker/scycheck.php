<head>
		<meta http-equiv="content-type" content="text/html" charset="UTF-8">
		<title>朴村外卖 - 注册</title>
</head>

<?php

/**
 * Create by WU JIANFENG
 * 2016/4/2 
 * Pucun-Takeaway WebApp
 * Security Check for prevent SQL inject
 */

	
	if(isset($_POST['username'])){
		
		if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["username"])){
			echo "<script>alert('用户名不可以输入符号（英文和数字）'); history.go(-1)</script>";
			exit();
		}
	}
	
	if(isset($_POST['password'])){
		
		if (!preg_match("/^[a-zA-Z0-9]*$/",$_POST["password"])){
			echo "<script>alert('密码不可以输入符号（英文和数字）'); history.go(-1)</script>";
			exit();
		}
	}
	
	if(isset($_POST['orpassword'])){
		
		if(!preg_match("/^[a-zA-Z0-9]*$/",$_POST["orpassword"])){
			echo "<script>alert('密码不可以输入符号（仅支持英文和数字）'); history.go(-1)</script>";
			exit();
		}
		
	}
	
	if(isset($_POST['newpassword'])){
		
		if(!preg_match("/^[a-zA-Z0-9]*$/",$_POST["newpassword"])){
			echo "<script>alert('密码不可以输入符号（仅支持英文和数字）'); history.go(-1)</script>";
			exit();
		}
		
	}
	
	if(isset($_POST['email'])){
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			echo "<script>alert('你好像没填上正确的邮箱，或者忘记了什么'); history.go(-1)</script>";
			exit();
		}
	}
	if(isset($_POST['realname'])){
		
		if (!preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$_POST["realname"])){
			echo "<script>alert('请输入不带符号的中文姓名'); history.go(-1)</script>";
			exit();
		}
	}
		
	if(isset($_POST['idnum'])){
		if (!preg_match("/^[a-zA-Z0-9]{6,8}$/",$_POST["idnum"])){
			echo "<script>alert('看下你学号有没输错'); history.go(-1)</script>";
			exit();
		}
	}
	
	if(isset($_POST['address'])){
		
		if (!preg_match("/^[a-zA-Z0-9\s\,\.\-\，\。]*$/",$_POST["address"])){
			echo "<script>alert('地址只能输入英文字符，逗号和句号'); history.go(-1)</script>";
			exit();
		}
		

	}
	
	if(isset($_POST['phone'])){
		if (!preg_match("/^[0-9]*$/",$_POST["phone"])){
			echo "<script>alert('输入正确的电话号码'); history.go(-1)</script>";
			exit();
		}
	}
	
	if(isset($_POST['invitercode'])){
		if (!preg_match("/^[\x{4e00}-\x{9fa5}]+$/u",$_POST["invitercode"])){
			echo "<script>alert('请输入不带符号的全中文密令'); history.go(-1)</script>";
			exit();
		}
	}
	
	
	if(isset($_POST["mname"])){
		if (!preg_match("/^[\x{4e00}-\x{9fa5}a-zA-Z]+$/u",$_POST["mname"])){
			echo "<script>alert('名称请勿使用符号和空格'); history.go(-1)</script>";
			exit();
		}
	}
	
	if(isset($_POST["mdes"])){
		if (!preg_match("/^[\x{4e00}-\x{9fa5}a-zA-Z0-9\s\,\.\-]+$/u",$_POST["mdes"])){
			echo "<script>alert('描述请勿使用符号'); history.go(-1)</script>";
			exit();
		}
	}
	
	if(isset($_POST["mprice"])){
		if (!preg_match("/^[1-9]\d*\.\d*|0\.\d*[1-9]\d*$/",$_POST["mprice"])){
			echo "<script>alert('请输入小数结尾的数字，如15英镑20便士则为15.20，15英镑则为15.00。谢谢'); history.go(-1)</script>";
			exit();
		}
	}
	
	
	
?>