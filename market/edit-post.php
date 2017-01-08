<html>

<?php include('./header.php');?>

		<title>朴村物语 - 修改信息</title>
	</head>


	<body>

		<!--NAV START-->

		    <?php include('./navbar.php'); ?>

			<!--NAV END-->
		<div class="columns_form">

				<?php

				$userid = $_SESSION['userid'];
				$pid = $_GET['pid'];
				include('../services/common/connect.php');

				$sql = "select item_name,item_age,item_img,item_details,item_price,item_contacts,item_tel,item_wechat from m_post where pid = '$pid'" ;
				$sqlrun = mysqli_query($link,$sql);
				$sqlrunt = mysqli_fetch_array($sqlrun);
				echo mysqli_error($link);

				$imgArr = explode(';',$sqlrunt[2]);

				echo "
				<h1> 修改信息 </h1>

        <div class='columns_publisher'>
    			<figure>
    				<form action='../services/market/newpostfunc.php' method='post' enctype='multipart/form-data'>

							<h1>物品名称</h1><br>
							<a>
    					<input type='text' name='item-name' value='".$sqlrunt[0]."' /></a>
    					<br>

							<h1>交易类型</h1><br>

                <select name='item-age'>
                  <option value='iType-sale'>出售</option>
                  <option value='iType-exchange'>物品交换</option>
                </select>

    				  <br>

							<h1>物品新旧程度</h1><br>

                <select name='item-age' value=''>
                  <option value='00'>全新</option>
                  <option value='99'>99成新</option>
                  <option value='90'>9成新</option>
                  <option value='80'>8成新</option>
                  <option value='70'>7成新</option>
                  <option value='50'>5成新</option>
                  <option value='10'>伊拉克</option>
                </select>

    				  <br><br><br>


    					<h1>详细描述</h1><br><br>
							<textarea class='text' cols='86' rows ='14' name='item-details'>".$sqlrunt[3]."</textarea>
    				  <br><br>

							<h1>预期价格</h1><br>
							<a>
    					<input type='text' name='item-price' value='$sqlrunt[5]' />£</a>
    					<br><br><br>

							<h1>上传图片</h1><br><br>

								<div class='img_preview'>";

									if(isset($imgArr[0])){
									echo "
									<img src='.$imgArr[0]' ><br><br>";
									}

									echo "
									<input type='file' name='fileToUpload1' id='fileToUpload1' class='inputfile' value='upload'/>
									<label for='fileToUpload1'><span>选择图片</span></label><br>
									<a>封面</a><br><br>";

									if(isset($imgArr[1])){
									echo "
									<img src='.$imgArr[1]' ><br><br>";
									}

									echo "
									<input type='file' name='fileToUpload2' id='fileToUpload2' class='inputfile' value='upload'/>
									<label for='fileToUpload2'><span>选择图片</span></label><br>
									<a>第2张</a><br><br>";

									if(isset($imgArr[2])){
									echo "
									<img src='.$imgArr[2]' ><br><br>";
									}

									echo "
									<input type='file' name='fileToUpload3' id='fileToUpload3' class='inputfile' value='upload'/>
									<label for='fileToUpload3'><span>选择图片</span></label><br>
									<a>第3张</a><br><br>";

									if(isset($imgArr[3])){
									echo "
									<img src='.$imgArr[3]' ><br><br>";
									}

									echo "
									<input type='file' name='fileToUpload5' id='fileToUpload5' class='inputfile' value='upload'/>
									<label for='fileToUpload5'><span>选择图片</span></label><br>
									<a>第5张</a><br><br>";

									if(isset($imgArr[4])){
									echo "
									<img src='.$imgArr[4]' ><br><br>";
									}

									echo "
									<input type='file' name='fileToUpload4' id='fileToUpload4' class='inputfile' value='upload'/>
									<label for='fileToUpload4'><span>选择图片</span></label><br>
									<a>第4张</a><br><br>";

									if(isset($imgArr[5])){
									echo "
									<img src='.$imgArr[5]' ><br><br>";
									}

									echo "
									<input type='file' name='fileToUpload6' id='fileToUpload6' class='inputfile' value='upload'/>
									<label for='fileToUpload6'><span>选择图片</span></label><br>
									<a>第6张</a><br><br>

									<script>

										var inputs = document.querySelectorAll('.inputfile');
										Array.prototype.forEach.call(inputs, function(input)
										{
											var label	 = input.nextElementSibling,
													labelVal = label.innerHTML;

											input.addEventListener( 'change', function(e)
											{
												var fileName = '';
												fileName = e.target.value.split( '' ).pop();
												if(fileName){
													label.querySelector('span').innerHTML = fileName;
													alert('ss');

												}else{
													label.innerHTML = labelVal;
													alert('a');
												}
											});
										});

									</script>

								</div>

							<br><br>";







								echo "
								<br><br><h1>联系人</h1><br>
								<a>
	    					<input type='text' name='item-contacts' value='$sqlrunt[5]'/></a>
	    					<br>

								<br><h1>联系电话</h1><br>
								<a>
	    					<input type='text' name='item-tel' value='$sqlrunt[6]' /></a>
	    					<br>

								<br><h1>微信/QQ</h1><br>
								<a>
	    					<input type='text' name='item-wechat' value='$sqlrunt[7]'/></a>
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
