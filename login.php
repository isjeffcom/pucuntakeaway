<html>

<?php include('header.php'); include('./checker/logincheck.php'); ?>

		<title>朴村外卖 - 登录</title>

	<style>
		.removeBtn {
			display: none;
		}
	</style>

	</head>


	<body>
		<?php echo '<script>localStorage.clear();</script>';?>

		<!--NAV START-->

	    <nav class="navbar navbar-inverse" >

		    <div class="container-fluid">
		        <div class = "navbar-header">
					<a href="./index.php"><img class="logo" src="./img/logo.png" height="90px"></a>
			    </div>
			</div>

			<div>
			    <ul class="nav navbar-nav navbar-right">
				    <li><a><span class="nav menu"></span>还没有账号？</a></li>
					<li><a href="signup.php"><span class="nav menu"></span>注册</a></li>
				</ul>
			</div>
		</nav>

		<!--NAV END-->
		<div class="columns_form">

			<figure>

				<form action="./services/common/loginfunc.php" method="post">

					<a>用户名：<input type="text" name="username"/></a>

					<a>密码：<input type="password" name="password"/></a><br>

					<input type="submit" name="submit" value="登录"/>

				</form>
			</figure>
		</div>


		<?php include('footer_index.php');?>
	</body>
</html>
