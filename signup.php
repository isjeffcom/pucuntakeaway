<html>

<?php include('header.php'); include('./checker/logincheck.php'); ?>

		<title>朴村外卖 - 注册</title>
	</head>


	<body>

		<!--NAV START-->

		    <nav class="navbar navbar-inverse" >

			    <div class="container-fluid">
			        <div class = "navbar-header">
						<a href="./index.php"><img class="logo" src="./img/logo.png" height="90px"></a>
				    </div>
				</div>

				<div>
				    <ul class="nav navbar-nav navbar-right">
					    <li><a><span class="nav menu"></span>已经有账号？</a></li>
						<li><a href="login.php"><span class="nav menu"></span>登录</a></li>
					</ul>
				</div>
			</nav>

			<!--NAV END-->
		<div class="columns_form">
			<figure>
				<form action="./services/common/signupfunc.php" method="post">

					<h1>内测邀请码 Invite Code</h1>
					<a>内测期间推荐使用邀请码注册</a><br>
					<input type="text" name="invitecode" />
					<br />
					<a href="sign-up-free-noinvite-vip-only.php">我没有激活码 I do not have invite code</a><br><br><br>

					<h1>基础信息 Basic Info</h1><br />
				    <a>用户名 Username：<input type="text" name="username" /></a>
				    <a>（英文和数字，不带字符）</a><br>
				    <br />

				    <a>密码 Password：<input type="password" name="password" /></a>
				    <a>（英文或数字，不带字符）</a><br>
				    <br/>

				    <a>确认密码 Password Confirm：<input type="password" name="confirm"/></a>
				    <br />

				    <a>电子邮箱 E-MAIL：<input type="text" name="email" /></a>
				    <br/>

				    <h1>送餐信息 Deliver Info</h1><br />

				    <a>送餐地址（英国）Address(UK) ：<input type="text" name="address" /></a>
				    <a>（请包含邮编 Include Postcode）</a><br>
				    <br><br>

				    <a>电话（英国）Phone(UK) ：<input type="number" name="phone" /></a>
				    <br/>

				    <a>真实姓名（中文）Real Name (Chinese Name Only)：<input type="text" name="realname" /></a>
				    <br/>

				    <h1>实名信息 Identity Info</h1><br />
				    <a>学号 UoP Student Number ：<input type="text" name="idnum" /></a>
				    <br/><br/>

				    <a>（为什么要实名制？为了不让商家刷单，和保证送餐的精确性。）</a><br/>
				    <a>（注册即同意我们的<a href="serviceterm.php">服务与隐私条款</a>）</a><br/> <br/>


				    <input type="Submit" name="Submit" value="注册"/>
				</form>
			</figure>

			<?php include('footer.php');?>
		</div>

	</body>
</html>
