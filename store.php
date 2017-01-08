<!DOCTYPE html>
<html lang="en">
<?php
	include('header.php');
	$storeid = $_GET['sid'];
?>


		<!--COLUMN START-->



		    <!--SID POST END-->

		    <!--BULLETIN START-->
		    <?php
				include('./services/common/connect.php');

				$sid = "$storeid";
				$sql = "select sbulletin,sstatus,dis,sname from store where sid = '$sid'";
				$sqlrun = mysqli_query($link,$sql);
				$sqlrunt = mysqli_fetch_array($sqlrun);

				if($sqlrunt[1] == "1" ){
					$status = "开业";
				}else{
					$status = "歇业";
				}

				echo "

				<title>朴村外卖 - $sqlrunt[3]</title>";

				include('navbar.php');
				include('shoppingcart.php');

				echo "

				</header>

				<body>

				<div class='columns'>
				    <h1>$sqlrunt[3]</h1>

				    <!--SID POST START-->

					<a class = 'storeID' style='display:none'>".$storeid."</a>
					<form action='bulletin.php' method='post'>
					    <!-- STORE ID-->
					    <input type = 'hidden' name='asid' value='".$storeid."'>
					</form>




				<div class='smore'>

		    	<figure>

			    	<figcaption>

			    		<b>店铺公告：". $sqlrunt[0]." </b>

			    	</figcaption>

				</figure>

				</div>";

				echo "
					<div class='search'>
				    	<form action='searchfunc.php' method='post'>

								<input type='text' class='sbarinput' name='sc' value='输入菜名'>
								<input type='submit' class='sbarbut' name='ss' value='搜索'>
								<input type = 'hidden' name='asid' value='".$sid."'>

						</form>
					</div>

					";

				echo "<br><p style='font-size:20px;float:right;'>店铺状态："."$status"."  </p><br>";
				if($sqlrunt[2] == '0' || $sqlrunt [2] == '00'){
					//do nothing
				}else{
					echo "<br><p style='font-size:20px;float:right;'>优惠折扣："."$sqlrunt[2]"."%  </p><br>";
				}
				echo "<a class = 'storestatus' style='display:none'>"."$sqlrunt[1]"."</a><br><br>";


				include('./services/takeaway/storerowfunc.php');


				mysqli_close($link);



			?>
			<!--BULLETIN END-->

		</div>
		<!--COLUMN END-->



		<?php include('footer.php');?>

	</body>

</html>
