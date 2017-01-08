<?php

/**
 * Create by WU JIANFENG
 * 2016/4/11
 * Pucun-Takeaway WebApp
 * OrderList Row Display for Normal User
 */
echo "<br><a><b>您好：".$_SESSION['username']." 以下是您的订单</b><br><br> [本页每30秒自动刷新]</a><br/>";
				//Connect to database
				include('./services/common/connect.php');

				//Find Order Number
				$sqloid = "select oid from orderlist where userID = '$userid'";
				$sqloidrun = mysqli_query($link,$sqloid);
				$rownum = mysqli_num_rows($sqloidrun);


				$show_num=10;//显示多少条
	    		$total_pages=ceil($rownum/$show_num);//获取总的页数，ceil向上去整，floor向下
	    		$current=isset($_GET['page'])?$_GET['page']:1;//当前页号
	    		$next=($current==$total_pages)?false:$current+1;
	    		$prev=($current==1)?false:$current-1;
	    		$offset=($current-1)*$show_num;

				//Get all order
				$sqlgeto = "select * from orderlist where userID = '$userid' order by unixtime DESC  limit $offset,$show_num";
				$sqlgetorun = mysqli_query($link,$sqlgeto);
				$listnum = mysqli_num_rows($sqlgetorun);

				//Display


				//DISPLAY ALL RELETIVE ORDER FORM DATABASE
				while($row = mysqli_fetch_array($sqlgetorun)){

					$sid = $row['item1Sid'];
					$sqlsphone = "select phone from user where sid = '$sid'";
					$sqlsphonerun = mysqli_query($link,$sqlsphone);
					$phone = mysqli_fetch_array($sqlsphonerun);

					$orderstatus = $row['orderStatus'];

					//PRINT TABLE
					echo "<figure><br/><table border = '1'>
								<tr>
									<th>订单号</th>
									<th>下单时间</th>
									<th>地址信息</th>
									<th>总价</th>
									<th>备注</th>
									<th>操作</th>
								</tr>
							";

					echo "<tr>";
						echo "<td>".$row['oid']."</td>";
						echo "<td>".$row['time']."</td>";
						echo "<td>".$row['userInfo']."</td>";
						echo "<td>".$row['allAmount']."</td>";
						echo "<td>".$row['note']."</td>";

						//REACT FROM ORDER STATUS
						switch ($orderstatus){

							case 0;
								echo "	<td>
											<a>订单被管理员撤销，不知道原因请微信联系我们</a>
										</td>";
							break;

							case 111;
								echo "	<td>
											<a>订单被店家拒绝，理由是：".$row['refuseReason']."</a>
										</td>";
							break;

							case 1;
								echo "	<td>
											<a>等待店家确认订单</a>
										</td>";
							break;

							case 11;
								echo "	<td>
											<a>店家已确认，等待送出</a>
										</td>";
							break;

							case 22;
								echo "	<td>
											<form action = './services/takeaway/orderupdate.php' method='post'>
												<a>店家已经送出</a><br>
												<input type='submit' class='doyes' name='update' value = '确认送达'>
												<input type='hidden' name='upoid' value = '".$row['oid']."'>
											</form>
										</td>";
							break;

							case 55;
								echo "	<td>
											<form action = './services/takeaway/orderupdate.php' method='post'>
												<a>店家申请撤单,理由：".$row['refuseReason']."</a><br>
												<input type='submit' class='doyes' name='update' value = '允许撤单'>
												<input type='submit' class='dono' name='update' value = '拒绝撤单'>
												<input type='hidden' name='upoid' value = '".$row['oid']."'>
											</form>
										</td>";
							break;

							case 51;
								echo "	<td>
											<a>已确认撤单，订单取消</a>
										</td>";
							break;

							case 44;
								echo "	<td>
											<a>已拒绝撤单，订单继续生效</a>
										</td>";
							break;

							case 98;
								echo "	<td>
											<form action = './services/takeaway/orderupdate.php' method='post'>
												<a>请评价本次服务</a><br>
												<input type='submit' class='doyes' name='update' value = '很好'>
												<input type='submit' class='doyes' name='update' value = '可以'>
												<input type='submit' class='dono' name='update' value = '不好'>
												<input type='hidden' name='upoid' value = '".$row['oid']."'>
												<input type='hidden' name='upsid' value = '".$row['item1Sid']."'>
											</form>
										</td>";
							break;

							case 99;
								echo "	<td>
											<a>订单已完成</a>
										</td>";
							break;

						}



						echo "</tr></table><br/><table border = '1'>
								<tr>
									<th>项目1</th>
									<th>价格1</th>";

						if(!$row['item2Name'] == ""){
							echo '<th>项目2</th>';
							echo '<th>价格2</th>';
						}

						if(!$row['item3Name'] == ""){
							echo '<th>项目3</th>';
							echo '<th>价格3</th>';
						}

						if(!$row['item4Name'] == ""){
							echo '<th>项目4</th>';
							echo '<th>价格4</th>';
						}

						if(!$row['item5Name'] == ""){
							echo '<th>项目5</th>';
							echo '<th>价格5</th>';
						}
						echo "</tr><tr>";

						if(!$row['item1Name'] == "" && $row['item1Sid'] == $sid){
							echo "<td>".$row['item1Name'].'x'.$row['item1Qty'].'</td>'.'<td>'.$row['item1Amount']."</td>";
							$tprice = $tprice + $row['item1Amount'];
						}

						if(!$row['item2Name'] == "" && $row['item2Sid'] == $sid){
							echo "<td>".$row['item2Name'].'x'.$row['item2Qty'].'</td>'.'<td>'.$row['item2Amount']."</td>";
							$tprice = $tprice + $row['item2Amount'];
						}

						if(!$row['item3Name'] == "" && $row['item3Sid'] == $sid){
							echo "<td>".$row['item3Name'].'x'.$row['item3Qty']."</td>"."<td>".$row['item3Amount']."</td>";
							$tprice = $tprice + $row['item3Amount'];
						}

						if(!$row['item4Name'] == "" && $row['item4Sid'] == $sid){
							echo "<td>".$row['item4Name'].'x'.$row['item4Qty']."</td>"."<td>".$row['item4Amount']."</td>";
							$tprice = $tprice + $row['item4Amount'];
						}

						if(!$row['item5Name'] == "" && $row['item5Sid'] == $sid){
							echo "<td>".$row['item5Name'].'x'.$row['item5Qty']."</td>"."<td>".$row['item5Amount']."</td>";
							$tprice = $tprice + $row['item5Amount'];
						}

						$tpricef = $tprice;
						$tpriceAF = $tprice * ($row['afterDis'] / 100);

					echo "</tr></table><br/><b>商家电话：".$phone[0]."</b><br>";
					echo "<a>订单总价：".$tpricef."￡</a><a>   折后总价：".$tpriceAF."￡ (0则为不打折)</a><br/><br/></figure><br>";

				}

				mysqli_error($link);
				echo "<br><br>一共有{$rownum}个历史订单，显示{$show_num}条，{$current}/{$total_pages} （数据仅保留14天）";
				echo "<a href='ordercenter.php?page=1'> 首页  </a>";
				if(!$prev){
						echo " 上一页 ";
				}else{
						echo "<a href='ordercenter.php?page={$prev}'> 上一页 </a>";
				}

				if(!$next){
						echo " 下一页 ";
				}else{
						echo "<a href='ordercenter.php?page={$next}'> 下一页 </a>";
				}

?>
