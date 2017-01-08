<?php include('header.php'); include('./checker/notlogincheck.php'); ?>

	<title>朴村外卖 - 用户中心</title>
	<style>
		.removeBtn {
			display: none;
		}
	</style>
</head>

<body>

	<?php include('navbar.php'); ?>

	<?php


		include('./services/common/connect.php');

		$username = $_SESSION['username'];

		//E-mail query
		$user_email = "select email from user where username='$username'";
		$user_email_query = mysqli_query($link,$user_email);
		$email_row = mysqli_fetch_array($user_email_query);
		$email = $email_row[0];

		//Realname query
		$user_realname = "select realname from user where username='$username'";
		$user_realname_query = mysqli_query($link,$user_realname);
		$realname_row = mysqli_fetch_array($user_realname_query);
		$realname = $realname_row[0];

		//Phone query
		$user_phone = "select phone from user where username='$username'";
		$user_phone_query = mysqli_query($link,$user_phone);
		$phone_row = mysqli_fetch_array($user_phone_query);
		$phone = $phone_row[0];

		//Address query
		$user_address = "select address from user where username='$username'";
		$user_address_query = mysqli_query($link,$user_address);
		$address_row = mysqli_fetch_array($user_address_query);
		$address = $address_row[0];

		//Usertype query
		$user_usertype = "select usertype from user where username='$username'";
		$user_usertype_query = mysqli_query($link,$user_usertype);
		$usertype_row = mysqli_fetch_array($user_usertype_query);
		$usertype = $usertype_row[0];

		//Idnum query
		$user_idnum = "select idnum from user where username='$username'";
		$user_idnum_query = mysqli_query($link,$user_idnum);
		$idnum_row = mysqli_fetch_array($user_idnum_query);
		$idnum = $idnum_row[0];

		mysqli_close($link);

	?>



	<div class="columns_form">

			<figure>

				<a>邀请码</a>
				<form action="./services/takeaway/invitefunc.php" method="post">

					<?php
						$uid = $_SESSION['userid'];

						include('./services/common/connect.php');

						$check = "select uid,code from invitecode where uid = '$uid'";
						$checkrun = mysqli_query($link, $check);
						$check_row = mysqli_fetch_array($checkrun);

						if(empty($check_row)){
							echo
							"
								<a>随意输入一串文字作为你的密令，只有接收者能解密</a>
								<input type='text' name='invitercode'>
								<input type='Submit' name='Submit' value='生成邀请码'/>
							";
						}else{
							echo
							"
								<a>$check_row[1]</a>
								<a><br><br>（只能生成一次邀请码，一个邀请码可以注册三次）</a>

							";
						}



					?>


				</form>


			</figure>

			<figure>

				<form  action="./services/takeaway/ucenterfunc.php" method="post">

						<h1>密码验证</h1><br><br>

						<a>现密码：<input type="password" name="orpassword"/></a>
						<a>(修改所有信息均需要输入现密码)</a>
						<br><br><br><br>

						<h1>基础信息</h1><br><br>
					    <a>用户名：<?php echo htmlspecialchars($username) ?></a>
							<a>(不可修改)</a>
							<br><br><br><br>

					    <a>新密码：<input type="password" name="newpassword"/></a>
					    <a>(不修改即不填)</a>
							<br><br><br><br>


					    <a>邮箱：<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>" /></a>
					    <br><br>

					    <h1>送餐信息</h1><br><br>

					    <a>送餐地址（英国）：<input type="text" name="address" value="<?php echo htmlspecialchars($address) ?>" /></a>
					    <br><br>

					    <a>电话（英国）：<input type="number" name="phone" value="<?php echo htmlspecialchars($phone) ?>" /></a>
					    <br/><br>

					    <a>真实姓名（中文）：<input type="text" name="realname" value="<?php echo htmlspecialchars($realname) ?>"/></a>
					    <br><br>

					    <h1>实名信息</h1><br><br>
					    <a>学号：<input type="text" name="idnum" value="<?php echo htmlspecialchars($idnum) ?>" /></a>
					    <br><br>

						<input type="Submit" name="Submit" value="确认修改"/>

				</form>
			</figure>
		</div>
		<?php include('footer.php');?>

</body>
