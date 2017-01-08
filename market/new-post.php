<html>

<?php include('./header.php');?>

		<title>朴村物语 - 发布信息</title>
	</head>


	<body>

		<!--NAV START-->

		    <?php include('./navbar.php'); ?>

			<!--NAV END-->
		<div class="columns_form">


				<h1> 发布信息 </h1>

        <div class="columns_publisher">
    			<figure>
    				<form action="../services/market/newpostfunc.php" method="post" enctype='multipart/form-data'>

							<h1>物品名称</h1><br>
							<a>
    					<input type="text" name="item-name" /></a>
    					<br>

							<h1>交易类型</h1><br>

                <select name="item-type">
                  <option value="iType-sale">物品出售</option>
                  <option value="iType-exchange">物品交换</option>
									<option value="iType-exchange">物品出租</option>
									<option value="iType-house">房屋出租</option>
									<option value="iType-house">寻找宿友</option>
                </select>

    				  <br>

							<h1>物品新旧程度</h1><br>

                <select name="item-age">
                  <option value="iAge-bnew">全新</option>
                  <option value="iAge-99">99成新</option>
                  <option value="iAge-90">9成新</option>
                  <option value="iAge-80">8成新</option>
                  <option value="iAge-70">7成新</option>
                  <option value="iAge-50">5成新</option>
                  <option value="iAge-10">伊拉克</option>
                </select>

    				  <br><br><br>


    					<h1>详细描述</h1><br><br>
							<textarea class="text" cols="86" rows ="14" name="item-details"></textarea>
    				  <br><br>

							<h1>预期价格</h1><br>
							<a>
    					<input type="text" name="item-price" />£</a>
    					<br><br><br>


							<h1>上传图片</h1><br><br>
							<a><input type="file" name="fileToUpload1" id='fileToUpload1' value="upload">封面</a>
							<a><input type="file" name="fileToUpload2" id='fileToUpload2' value="upload">第2张</a>
							<a><input type="file" name="fileToUpload3" id='fileToUpload3' value="upload">第3张</a>
							<a><input type="file" name="fileToUpload4" id='fileToUpload4' value="upload">第4张</a>
							<a><input type="file" name="fileToUpload5" id='fileToUpload5' value="upload">第5张</a>
							<a><input type="file" name="fileToUpload6" id='fileToUpload6' value="upload">第6张</a>
							<br><br>

							<?php

								$userid = $_SESSION['userid'];
								include('../services/common/connect.php');

								$sql = "select realname,phone from user where id = '$userid'" ;
								$sqlrun = mysqli_query($link,$sql);
								$sqlrunt = mysqli_fetch_array($sqlrun);
								echo mysqli_error($link);

								echo "
								<br><br><h1>联系人</h1><br>
								<a>
	    					<input type='text' name='item-contacts' value='$sqlrunt[0]'/></a>
	    					<br>

								<br><h1>联系电话</h1><br>
								<a>
	    					<input type='text' name='item-tel' value='$sqlrunt[1]' /></a>
	    					<br>

								<br><h1>微信/QQ</h1><br>
								<a>
	    					<input type='text' name='item-wechat'/></a>
	    					<br>
								"

							?>


    				  <br><br><input type="Submit" name="Submit" value="发布"/>
    				</form>

			</figure>
    </div>

			<?php include('footer.php');?>
		</div>

	</body>
</html>
