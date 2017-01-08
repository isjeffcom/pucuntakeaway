<!--CREATE BY WU JIANFENG IN MAY 2 2016-->
<!DOCTYPE html>
<?php include('header.php');?>


	<title>朴村外卖 - 搜索结果</title>
	</header>

	<body>


<?php include('navbar.php'); include('shoppingcart.php'); ?>


<?php



		if(isset($_POST['ss']) && $_POST['ss'] == "搜索"){

					include('./services/common/connect.php');

					$sid = $_POST['asid'];
					$text = $_POST['sc'];

					$sql = "select * from store".$sid."data where name like '%".$text."%' order by top DESC,id";
					$sqlrun = mysqli_query($link,$sql);
					$rownum = mysqli_num_rows($sqlrun);
					echo mysqli_error($link);
					echo "<a class = 'storeID' style='display:none'>".$sid."</a>";
					echo "<div class='columns'>";

					while($row = mysqli_fetch_array($sqlrun)){
						
						echo "
							<figure>
				    			";


				    	if($row['pic'] != ""){

				    	echo	"

				    			<img src='".$row['pic']."'>

				    			";

						}

						echo	"

					    		<figcaption>
							    	<a class='name'>".$row['name']."</a> <br>
							    	<a class='detail'>". $row['des'] ."</a> <br>
							    	<a>£</a><a class='price'>".$row['price']."</a><br>
							    	<input type = 'hidden' class='id' value='".$row['id']."'>
							    	<input type='number' class='qty' value='1' />
							    	<button class='add'>加入</button>
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
