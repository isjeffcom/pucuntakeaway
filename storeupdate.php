<?php include('header.php'); include('./checker/notlogincheck.php'); ?>
	<title>朴村外卖 - 店铺编辑</title>
	<style>
		.removeBtn {
			display: none;
		}
	</style>
</head>
<?php include('navbar.php'); ?>



<body>

	<div class="columns_form corder">
		<input type=button value=刷新 onclick="location.reload()"><br/><br/>

			<figure style="width:80% !important;">
				<h1>新增菜品</h1><br/>
				<table border = '1'>
					<tr>
						<th>商品名称</th>
						<th>商品描述</th>
						<th>商品价格</th>
						<th>图片</th>
						<th>操作</th>
					</tr>

					<tr>

						<form action = './services/takeaway/storeupdatefunc.php' method='post'  enctype='multipart/form-data'>

							<td>

								<input type='text' name='mname' value='菜品名称'/>

							</td>

							<td>

								<input type='text' name='mdes' value='菜品描述或英文名'/>

							</td>

							<td>

								<input type='number' step='0.01' name='mprice' value=''/>

							</td>

							<td>

								<!--input type='text' name='mpic' value='./img/d1.jpg'/-->
								<input type='file' name='fileToUpload1' id='fileToUpload1' value="可以不上传">

							</td>

							<td>

								<input type='submit' class='doyes' name='update' value = '新增'>
								<input type='hidden' name='mid' value = '1'/>

							</td>
						</tr>
					</form>
				</table>
			</figure>


			<figure style="width:80% !important;">
				<h1>现有菜单</h1>
<?php

/**
 * Create by WU JIANFENG
 * 2016/4/17
 * Pucun-Takeaway WebApp
 * Store Update function
 */

				if(isset($_SESSION['sid'])){

				$sid = $_SESSION['sid'];

				}else{
					echo "<script>alert('只有商家账户才能进入店铺编辑');history.go(-1);</script>";
					exit();
				}

				//Connect to database
				include('./services/common/connect.php');

				//Find Order Number
				$sqloid = "select id from store".$sid."data";
				$sqloidrun = mysqli_query($link,$sqloid);
				$rownum = mysqli_num_rows($sqloidrun);


				$show_num= 32;//显示多少条
	    		$total_pages=ceil($rownum/$show_num);//获取总的页数，ceil向上去整，floor向下
	    		$current=isset($_GET['page'])?$_GET['page']:1;//当前页号
	    		$next=($current==$total_pages)?false:$current+1;
	    		$prev=($current==1)?false:$current-1;
	    		$offset=($current-1)*$show_num;

				//Get all order
				$sqlgeto = "select * from store".$sid."data order by id limit $offset,$show_num";
				$sqlgetorun = mysqli_query($link,$sqlgeto);
				$listnum = mysqli_num_rows($sqlgetorun);

				//Display


				//DISPLAY ALL RELETIVE ORDER FORM DATABASE
				while($row = mysqli_fetch_array($sqlgetorun)){

					$mName = str_replace('\n','<br>',str_replace(' ','&nbsp;',$row['name']));
					$mDes = str_replace('\n','<br>',str_replace(' ','&nbsp;',$row['des']));

					if($row['pic'] == ""){
						$row['pic'] = "./img/nopic.jpg";
					}

					//PRINT TABLE
					echo "<br/><table border = '1'>
								<tr>
									<th>商品名称</th>
									<th>商品描述</th>
									<th>商品价格</th>
									<th>图片</th>
									<th>操作</th>
								</tr>
							";

					echo "<tr><form action = './services/takeaway/storeupdatefunc.php' method='post'  enctype='multipart/form-data'>";
						echo "
							<td>

								<input type='text' name='mname' value='".$mName."'/>

							</td>";

						echo "
							<td>
								<input type='text' name='mdes' value='".$mDes."'/>
							</td>";

						echo "
							<td>
								<input type='number' step='0.01' name='mprice' value='".$row['price']."'/>
							</td>";

						echo "
							<td>
								<input type='hidden' name='mpic' value='".$row['pic']."'/>
								<img src=".$row['pic']." width='100px' height='61px'><br><br>
								<input type='file' name='fileToUpload1' id='fileToUpload1'>
							</td>";

						echo "
							<td>

								<input type='submit' class='doyes' name='update' value = '提交'>
								<input type='submit' class='dono' name='update' value = '删除'>
								<input type='hidden' name='mid' value = '".$row['id']."'/><br>";

						if($row['top'] == '0'){echo "<input type='checkbox' name='top' value='Yes'>置顶<br>";}
						if($row['top'] == '1'){echo	"<input type='checkbox' name='top' value='Yes' checked>置顶<br>";}

						echo "</td></tr></form></table><br/>";



				}

				mysqli_error($link);
				echo "<br><br>一共有{$rownum}份商品，显示{$show_num}条，{$current}/{$total_pages}";
				echo "<a href='storeupdate.php?page=1'> 首页 </a>";
				if(!$prev){
						echo " 上一页 ";
				}else{
						echo "<a href='storeupdate.php?page={$prev}'> 上一页 </a>";
				}

				if(!$next){
						echo " 下一页 ";
				}else{
						echo "<a href='storeupdate.php?page={$next}'> 下一页 </a>";
				}






	?>
	</figure>

	</div>

</body>
<?php include('footer.php') ?>
