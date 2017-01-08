<!--CREATE BY WU JIANFENG IN MAY 2 2016-->
<!DOCTYPE html>
<?php include('header.php');?>


	<title>朴村集市 - 搜索结果</title>
	</header>

	<body>


<?php include('navbar.php');?>


<?php



		if(isset($_POST['ss']) && $_POST['ss'] == "搜索"){

					include('../services/common/connect.php');

					$sid = $_POST['asid'];
					$text = $_POST['sc'];

					$sql = "select * from m_post where item_name like '%".$text."%' order by pid DESC";
					$sqlrun = mysqli_query($link,$sql);
					$rownum = mysqli_num_rows($sqlrun);
					echo mysqli_error($link);
					echo "<a class = 'storeID' style='display:none'>".$sid."</a>";
					echo "<div class='columns'>";

					while($row = mysqli_fetch_array($sqlrun)){

						echo "
							<figure>
				    			";


									if($row['item_img'] != ""){

										//区分多个图片地址
										$coverImg = explode(';',$row['item_img']);

						    	echo	"

						    			<img src='".$coverImg[0]."'>

						    			";

								}

						echo	"

							<figcaption>
								<a class='name'>".$row['item_name']."</a> <br>
								<a class='detail'>". $row['item_age'] ."</a> <br>
								<a>£</a><a class='price'>".$row['item_price']."</a><br>
								<a href='./post.php?pid=".$row['pid']."'><button>详情</button></a>
								<input type = 'hidden' class='id' value='".$row['pid']."'>
							</figcaption>

							</figure>
							";
					}

					echo "</div>";



		}


?>

<?php include('footer.php');?>

	</body>

</html>
