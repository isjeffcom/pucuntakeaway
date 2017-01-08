<!--CREATE BY WU JIANFENG IN APRIL 11 2016-->
<head>

	    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
	    <meta content="width=device-width">
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		
		<meta name="description" content="朴村外卖，朴茨茅斯中餐馆在线叫外卖平台 - Portsmouth Chinese Takeaway Online Order">
		<meta name="keywords" content="朴村外卖,朴茨茅斯,朴茅,朴村,朴茅外卖,朴茨茅斯中餐外卖,朴村中餐,英国中餐外卖,英国外卖,英国外卖O2O,英国中餐">
		<meta name="author" content="朴村 - PUCUN">
			
		<link rel="stylesheet" href="../css/style.css?2016051101">
		<link rel="stylesheet" href="../css/slider.css">
			
<title>朴村外卖 - 移动应用</title>

</head>

<body>

	<style>
		.removeBtn {
			display: none;
		}
	</style>

	<!--NAV START-->

		    <nav class="navbar navbar-inverse" >
		    	
			    <div class="container-fluid">
			        <div class = "navbar-header">
						<a href="../index.php"><img class="logo" src="../img/logo.png"></a>
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
					    	<li><a href='../usercenter.php'><span class='nav menu'></span>用户中心</a></li>
							<li><a href='../ordercenter.php'><span class='nav menu'></span>订单中心</a></li>
							
							
					    	";
							
							if($_SESSION['usertype'] == '2'){
								echo "<li><a href='../bulletincenter.php'><span class='nav menu'></span>店铺管理</a></li>";
							}
							
							echo "<li><a href='../services/loginfunc.php?action=logout'><span class='nav menu'></span>退出</a></li>";
						
						}else{
				    		
				    		echo 
				    		
				    		"
				    		<li><a><span class='nav menu'></span>还没有账号？</a></li>
				    		<li><a href='../login.php'><span class='nav menu'></span>登录</a></li>
							<li><a href='../signup.php'><span class='nav menu'></span>注册</a></li>
							
							";
				    	}
						?>
						
						
					</ul>
				</div>

		</nav>

	<!--NAV END-->

	
	<div class="columns_index">
		
		<br><br><b>目前暂时仅支持Android设备</b><br><br>
		
		<figure>
			
			<a href="https://play.google.com/store/apps/details?id=pucun.takeaway_web"><img src="../img/a1.jpg"><span class="pictext">从Google Play下载</span></a>
			
					
		</figure>
		
		<figure>
			
			<a href="./app.apk"><img src="../img/a2.jpg"><span class="pictext">直接下载</span></a>
			
		</figure>
				
	</div>
	

		<!--FOOTER START-->
		<div class="tabBar">
			<div class="tabBar_icon">
					<li><a href="../usercenter.php"><img src="../img/ucenter_icon.png"></a></li>
					<li><a href="../ordercenter.php"><img src="../img/ocenter_icon.png"></a></li>
					<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']  == '2'){ echo "<li><a href='../bulletincenter.php'><img src='../img/store_icon.png'></a></li>"; }?>
					<?php if(isset($_SESSION['username'])){ echo "<li><a href='../services/loginfunc.php?action=logout'><img src='../img/logout_icon.png'></a></li>";}?>
					<?php if(!isset($_SESSION['username'])){ echo "<li><a href='../signup.php'><img src='../img/signup_icon.png'></a></li>";}?>
			</div>
		</div>

	    <div class="footer_index" >

			<div class="footer-social">
			    <li><a href="http://www.weibo.com/5894722044/"><img src="../img/tw.png" alt="Link to Twitter"/></a></li>
				<li><a href="https://www.facebook.com/pucuncouk/"><img src="../img/fb.png" alt="Link to Facebook"/></a></li>
			</div>

		    <div class="footer container-fluid">
				<ul class="fnav footer-right">
				    <li><a href="./index.php"><span class="fnav menu"></span>APP</a></li>
					<li><a href="../serviceterm.php"><span class="fnav menu"></span>服务条款</a></li>
					<li><a href="../privateterm.php"><span class="fnav menu"></span>隐私条款</a></li>
					<li><a href="#"><span class="fnav menu"></span>朴村团队 PUCUN TEAM 2015-2016</a></li>
				</ul>
			</div>

		</div>

		<!--FOOTER END-->
