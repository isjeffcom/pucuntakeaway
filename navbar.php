	<!--NAV START-->

		    <nav class="navbar navbar-inverse" >

			    <div class="container-fluid">
			        <div class = "navbar-header">
						<a href="./index.php"><img class="logo" src="./img/logo.png"></a>
				    </div>
				</div>

				<div>
				    <ul class="nav navbar-nav navbar-right">

				    	<?php
				    	session_start();
						 if(isset($_SESSION['username'])){

					    	echo

					    	"

					    	<li><a><span class='nav menu'></span>你好，".$_SESSION['realname']."</a></li>
					    	<li><a href='usercenter.php'><span class='nav menu'></span>用户中心</a></li>
							<li><a href='ordercenter.php'><span class='nav menu'></span>订单中心</a></li>


					    	";

							if($_SESSION['usertype'] == '2'){
								echo "<li><a href='bulletincenter.php'><span class='nav menu'></span>店铺管理</a></li>";
							}

							echo "<li><a href='./services/common/loginfunc.php?action=logout'><span class='nav menu'></span>退出</a></li>";

						}else{

				    		echo

				    		"
				    		<li><a><span class='nav menu'></span>还没有账号？</a></li>
				    		<li><a href='login.php'><span class='nav menu'></span>登录</a></li>
							<li><a href='signup.php'><span class='nav menu'></span>注册</a></li>

							";
				    	}
						?>


					</ul>
				</div>

		</nav>

	<!--NAV END-->
