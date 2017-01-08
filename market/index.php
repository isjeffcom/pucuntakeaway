<!DOCTYPE html>
<html lang="en">
<?php
	include('header.php');
	$storeid = $_GET['sid'];



?>

  <title>朴村集市 - 普次茅斯二手物品交易平台</title>


		<!--COLUMN START-->



		    <!--SID POST END-->

		    <!--BULLETIN START-->
		    <?php

				include('navbar.php');


				echo "

				</header>

				<body>

				<div class='columns'>"

				;

				echo "
					<br><br>
          <div class='search'>
				    	<form action='searchfunc.php' method='post'>

								<input type='text' class='sbarinput' name='sc' value='想找什么？'>
								<input type='submit' class='sbarbut' name='ss' value='搜索'>

						</form>
					</div>
          <br><br><br><br>

					";


				include('../services/market/listrowfunc.php');


				mysqli_close($link);



			?>
			<!--BULLETIN END-->

		</div>
		<!--COLUMN END-->



		<?php include('footer.php');?>

	</body>

</html>
