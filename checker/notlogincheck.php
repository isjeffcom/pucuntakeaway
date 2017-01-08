<head>

	<meta http-equiv="content-type" content="text/html" charset="UTF-8">

</head>

<?php

/**
 * Create by WU JIANFENG
 * 2016/3/29
 * Pucun-Takeaway WebApp
 * If not login function
 */

	//Check login
	session_start();
	if(!isset($_SESSION['userid'])){
		echo "<script>alert('朴村外卖：以下功能需要登录后才能使用');window.location.href='./login.php'</script>";
		exit();
	}

?>
