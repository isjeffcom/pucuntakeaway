<head>
	<meta http-equiv="content-type" content="text/html" charset="UTF-8">
	<title>朴村外卖 - 店铺信息更新</title>
</head>

<?php

	//Menu Update Function 菜单更新功能

	//调用notloginchecker.php的代码，检查是否登陆，如果没登陆则跳转至登陆页面
	include('../../checker/notlogincheck.php');

	//调用连接数据库的代码
	include('../common/connect.php');

	//如果用户点击update名字的按钮，内容为提交，则执行
	if(isset($_POST["update"]) && $_POST["update"] == "提交"){

		//调用安全检查代码
		include('../../checker/scycheck.php');

		//调用上传功能代码
		include('../common/uploadfunc.php');

		//从SESSION和前端拿取必要数据
		$sid = $_SESSION['sid'];
		$mid = $_POST["mid"];
		$mName = $_POST["mname"];
		$mDes = $_POST["mdes"];
		$mPrice = $_POST["mprice"];

		//tf来自上传功能代码upload.php中
		if(isset($tf)){
			//如果用户上传图片，则图片地址为mPic，并写入数据库
			$mPic = $tf;
		}else{
			//If the picture is nopic.jpg 如果原图为无图，
			if($_POST["mpic"] == "./img/nopic.jpg"){
				$mPic = "";
			}else{
				//Otherwise start use old picture 否则用原图
				$mPic = $_POST["mpic"];
			}
		}



		//检查是否缺乏未填写的数据
		if($mName == "" || $mDes == "" || $mPrice == ""){
			echo "<script>alert('名称/描述/价格不能为空，图片地址可以'); history.go(-1);</script>";
			exit();

		}

		//如果用户勾选置顶，写入菜单数据，写入时top为1
		if($_POST["top"] == 'Yes'){


			$sql = "update store".$sid."data set name = '$mName', des = '$mDes', price = '$mPrice', pic = '$mPic', top = '1' where id = '$mid'";
			$sqlrun = mysqli_query($link, $sql);
			echo mysqli_error($link);

		//如果用户未勾选置顶，写入菜单数据，写入时top为0
		}else{

			$sql = "update store".$sid."data set name = '$mName', des = '$mDes', price = '$mPrice', pic = '$mPic', top = '0'  where id = '$mid'";
			$sqlrun = mysqli_query($link, $sql);
			echo mysqli_error($link);

		}

		//告知用户是否运行成功
		if ($sqlrun){
				echo mysqli_error($link);
				echo $mPrice;

				//执行JavaScript代码，退后一步
			    echo "<script>history.go(-1);</script>";

			}else{

				//执行JavaScript代码，弹出提示窗口
			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
		}


	}

	//删除功能
	if(isset($_POST["update"]) && $_POST["update"] == "删除"){

		$sid = $_SESSION['sid'];
		$mid = $_POST["mid"];

		$sql = "delete from store".$sid."data where id = '$mid'";
		$sqlrun = mysqli_query($link, $sql);

		if ($sqlrun){

			echo "<script>alert('已删除本条'); history.go(-1);</script>";

		}else{
			echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
		}
	}

	//新增功能
	if(isset($_POST["update"]) && $_POST["update"] == "新增"){

		include('../../checker/scycheck.php');

		include('../common/uploadfunc.php');

		$sid = $_SESSION['sid'];
		$mid = $_POST["mid"];
		$mName = $_POST["mname"];
		$mDes = $_POST["mdes"];
		$mPrice = $_POST["mprice"];

		if(isset($tf)){
			$mPic = $tf;
		}else{
			$mPic = null;
		}

		if($mName == "" || $mDes == "" || $mPrice == ""){

			echo "<script>alert('名称/描述/价格不能为空，图片可以'); history.go(-1);</script>";
			exit();

		}

		if(isset($mPic)){
			$sql = "insert into store".$sid."data (name,des,price,pic) value('$mName','$mDes','$mPrice','$mPic')";
			$sqlrun = mysqli_query($link, $sql);
			echo mysqli_error($link);
		}else{
			$sql = "insert into store".$sid."data (name,des,price) value('$mName','$mDes','$mPrice')";
			$sqlrun = mysqli_query($link, $sql);
			echo mysqli_error($link);
		}

		if($sqlrun){
			echo "<script>alert('新增成功'); history.go(-1);</script>";
		}else{
			echo "<script>alert('出问题了，微信联系管理员'); history.go(-1);</script>";
		}

	}



?>
