		<!--FOOTER START-->
		<div class="tabBar">
			<div class="tabBar_icon">
					<li><a href="../usercenter.php"><img src="../img/ucenter_icon.png"></a></li>
					<li><a href="../ordercenter.php"><img src="../img/ocenter_icon.png"></a></li>
					<?php if(isset($_SESSION['usertype']) && $_SESSION['usertype']  == '2'){ echo "<li><a href='../bulletincenter.php'><img src='../img/store_icon.png'></a></li>"; }?>
					<?php if(isset($_SESSION['username'])){ echo "<li><a href='../services/common/loginfunc.php?action=logout'><img src='../img/logout_icon.png'></a></li>";}?>
					<?php if(!isset($_SESSION['username'])){ echo "<li><a href='../signup.php'><img src='../img/signup_icon.png'></a></li>";}?>
			</div>
		</div>

	    <div class="footer" >

			<div class="footer-social">
			    <li><a href="http://www.weibo.com/5894722044/"><img src="../img/tw.png" alt="Link to Twitter"/></a></li>
				<li><a href="https://www.facebook.com/pucuncouk/"><img src="../img/fb.png" alt="Link to Facebook"/></a></li>
			</div>

		    <div class="footer container-fluid">
				<ul class="fnav footer-right">
				    <li><a href="../app"><span class="fnav menu"></span>APP</a></li>
					<li><a href="../serviceterm.php"><span class="fnav menu"></span>服务条款</a></li>
					<li><a href="../privateterm.php"><span class="fnav menu"></span>隐私条款</a></li>
					<li><a href="#"><span class="fnav menu"></span>朴村团队 PUCUN TEAM 2015-2016</a></li>
				</ul>
			</div>

		</div>


		<!--FOOTER END-->
