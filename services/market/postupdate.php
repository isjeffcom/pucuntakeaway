<!--CREATE BY WU JIANFENG ON JUNE 26 2016-->
<meta http-equiv="content-type" content="text/html" charset="UTF-8">

<?php


/**
 * Create by WU JIANFENG
 * 2016/4/11
 * Pucun-Takeaway WebApp
 * Order Update function
 */

	$ifupdate = $_POST["update"];
	include('../common/connect.php');

	switch ($ifupdate){

		case '发布信息';

			$pid = $_POST["pid"];

			//Set Timezone from PHP timezone funciton 调用PHP默认函数设定时区
			date_default_timezone_set("Europe/London");
			//Set Timezone from PHP time function 调用PHP时间函数获取时间
			$date = date("Y/m/d h:i:sa");

			$sql = "update m_post set status = '1',mod_time = '$date' where pid = '$pid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('发布成功，现在在首页能看到您的消息'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
			}
		break;

		case '关闭信息';

			$pid = $_POST["pid"];
			$reason = $_POST['reason'];
			$sql = "update m_post set status = '99' where pid = '$pid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('信息已关闭，无法再编辑/发布，无法看到您的个人信息。'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
			}
		break;

		case '暂停展示';

			$pid = $_POST["pid"];
			$sql = "update m_post set status = '0' where pid = '$pid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('暂停展示，用户无法再看到您发布的信息'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
			}
		break;

		case '查看信息';

			$pid = $_POST["pid"];
			echo "<script>window.location.href='../../market/post.php?pid=".$pid."';</script>";

		break;

		case '编辑信息';

			$pid = $_POST["pid"];
			echo "<script>window.location.href='../../market/edit-post.php?pid=".$pid."';</script>";

		break;


	}


?>
