<!--CREATE BY WU JIANFENG IN APRIL 11 2016-->
<html>

		<?php include('header.php'); include('./checker/notlogincheck.php'); ?>

		<title>朴村外卖 - 确认</title>




		<style>
		  .removeBtn {
		  	display: none;
		  }
  		</style>

	</head>



	<body>

	<?php include('navbar.php'); ?>

		<!-- DISPLAY ORDER FORM START-->
			<div class="columns_form">
			<figure>


				<a style='font-size:30px;'>您的订单</a><br><br>
					<div class="order0"></div>
					<div class="order1"></div>
					<div class="order2"></div>
					<div class="order3"></div>
					<div class="order4"></div>

					<a>总共</a><a class = "itallAmount"></a>
					<br><br><br>
			</figure>
		</div>

		<!--CREATE ORDER FORM START-->
		<div class = "columns_form">
			<figure>
				<form action = "./services/takeaway/orderfunc.php" method="post">

					<!-- Begin First Item -->
					<input type="hidden" id = "ppQty_1" name="quantity_1" value="">
					<input type="hidden" id = "ppName_1" name="item_name_1" value="">
					<input type="hidden" id = "ppAmount_1" name="amount_1" value="">
					<input type="hidden" id = "ppstoreid_1" name="storeid_1" value="">
					<!-- End First Item -->

					<!-- Begin Second Item -->
					<input type="hidden" id = "ppQty_2" name="quantity_2" value="">
					<input type="hidden" id = "ppName_2" name="item_name_2" value="">
					<input type="hidden" id = "ppAmount_2" name="amount_2" value="">
					<input type="hidden" id = "ppstoreid_2" name="storeid_2" value="">
					<!-- End Second Item -->

					<!-- Begin Third Item -->
					<input type="hidden" id = "ppQty_3" name="quantity_3" value="">
					<input type="hidden" id = "ppName_3" name="item_name_3" value="">
					<input type="hidden" id = "ppAmount_3" name="amount_3" value="">
					<input type="hidden" id = "ppstoreid_3" name="storeid_3" value="">
					<!-- End Third Item -->

					<!-- Begin Forth Item -->
					<input type="hidden" id = "ppQty_4" name="quantity_4" value="">
					<input type="hidden" id = "ppName_4" name="item_name_4" value="">
					<input type="hidden" id = "ppAmount_4" name="amount_4" value="">
					<input type="hidden" id = "ppstoreid_4" name="storeid_4" value="">
					<!-- End Forth Item -->

					<!-- Begin Fifth Item -->
					<input type="hidden" id = "ppQty_5" name="quantity_5" value="">
					<input type="hidden" id = "ppName_5" name="item_name_5" value="">
					<input type="hidden" id = "ppAmount_5" name="amount_5" value="">
					<input type="hidden" id = "ppstoreid_5" name="storeid_5" value="">
					<!-- End Fifth Item -->

					<input type="hidden" id = "allAmount" name="allamount" value="">
					<br>

					<input type="text" name="note" value="订单备注" />

					<input type="Submit" name="Submit" value="提交"/>

				</form>
			</figure>
		</div>

		<script>window.history.forward(1);</script>

	<?php include('footer.php');?>
	</body>

</html>
