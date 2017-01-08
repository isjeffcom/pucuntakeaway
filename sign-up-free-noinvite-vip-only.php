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

					<input type="hidden" name="invitecode" value="7eca689f0d3389d9dea66ae112e5cfd7"/>
					<br />

					<h1>基础信息</h1><br />
				    <a>用户名：<input type="text" name="username" /></a>
				    <br />

				    <a>密码：<input type="password" name="password" /></a>
				    <br/>

				    <a>确认密码：<input type="password" name="confirm"/></a>
				    <br />

				    <a>邮箱：<input type="text" name="email" /></a>
				    <br/>

				    <h1>送餐信息</h1><br />

				    <a>送餐地址（英国）：<input type="text" name="address" /></a>
				    <br/>

				    <a>电话（英国）：<input type="number" name="phone" /></a>
				    <br/>

				    <a>真实姓名（中文）：<input type="text" name="realname" /></a>
				    <br/>

				    <h1>实名信息</h1><br />
				    <a>学号：<input type="text" name="idnum" /></a>
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
