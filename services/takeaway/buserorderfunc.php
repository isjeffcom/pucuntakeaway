<meta http-equiv="content-type" content="text/html" charset="UTF-8">


<?php
/**
 * Create by WU JIANFENG
 * 2016/4/11
 * Pucun-Takeaway WebApp
 * OrderList Row Display for Bussiness User
 */


				echo "<a>您好，商家：".$_SESSION['username']." 以下是您店铺最近的订单<br><br>[本页每30秒自动刷新]</a><br/>";
				//Connect to database
				include('./services/common/connect.php');

				$sid = $_SESSION['sid'];
				$cookiename = "lastorder";

				//Find Order Number 查询订单数量
				$sqloid = "select oid from orderlist where item1sid = '$sid'";
				$sqloidrun = mysqli_query($link,$sqloid);
				$rownum = mysqli_num_rows($sqloidrun);

				//Check if the order remain the same as last time and set the new number. (For Sound Notification)
				//从COOKIE查询上一次的订单数量并检查是否与现有数相同，且设置新的数量（订单声音提醒）
				if(isset($_COOKIE['lastorder'])){
					$lastTimeOrder = $_COOKIE['lastorder'];
				}else{
					setcookie($cookiename,$rownum);
					$lastTimeOrder = $_COOKIE['lastorder'];
				}

				//Pages function 分页功能
				$show_num=10;//显示多少条
	    	$total_pages=ceil($rownum/$show_num);//获取总的页数，ceil向上去整，floor向下
	    	$current=isset($_GET['page'])?$_GET['page']:1;//当前页号
	    	$next=($current==$total_pages)?false:$current+1; //NEXT PAGE
	    	$prev=($current==1)?false:$current-1; //PREV PAGE
	    	$offset=($current-1)*$show_num;

				//Get all order 开始所有订单循环查询
				$sqlgeto = "select * from orderlist where item1sid = '$sid' or item2sid = '$sid' or item3sid = '$sid' or item4sid = '$sid' or item5sid = '$sid' order by unixtime DESC limit $offset,$show_num";
				$sqlgetorun = mysqli_query($link,$sqlgeto);
				$listnum = mysqli_num_rows($sqlgetorun);

				//Display all order data as HTML table 显示循环查询的数据为HTML表格
				if($lastTimeOrder != $rownum){

					echo "<audio autoplay><source src='./media/beep.mp3' type='audio/mpeg'></audio>";
					setcookie($cookiename,$rownum);
				}else{

					//do nothing
				}


				//Started row and query all data and create table. 显示每次查询到的数据，并制成表格
				while($row = mysqli_fetch_array($sqlgetorun)){
					$tprice = 0;
					$orderstatus = $row['orderStatus'];
					//First table: Order Detail 第一个表格：订单基本信息
					echo "<figure><br/><table border = '1'>
								<tr>
									<th>订单号</th>
									<th>下单时间</th>
									<th>地址信息</th>
									<th>订单备注</th>
									<th>操作</th>
								</tr>
							";
					echo "<tr>";
						echo "<td>".$row['oid']."</td>";
						echo "<td>".$row['time']."</td>";
						echo "<td>".$row['userInfo']."</td>";
						echo "<td>".$row['note']."</td>";
						switch ($orderstatus){

							//Order is set but wait for confirm 订单已下单，等待商家确认
							case 1;
								echo "	<td>
											<form action = './services/takeaway/orderupdate.php' method='post'>
												<input type='submit' class='doyes' name='update' value = '确认订单'>
												<input type='submit' class='dono' name='update' value = '拒绝订单'>
												<input type='text' class = 'noreason' name='reason' value = '填写拒绝理由'>
												<input type='hidden' name='upoid' value = '".$row['oid']."'>
											</form>
										</td>";
							break;

							//Order has been cancel by Website Admin for some reason 订单被管理员撤销
							case 0;
								echo "	<td>
											<a>订单被管理员撤销，不知道原因请微信联系我们</a>
										</td>";
							break;

							//Order has been refuse by store. 订单被商家拒绝
							case 111;
								echo "	<td>
											<a>订单被您拒绝</a>
										</td>";
							break;

							//Order has been confirm by store 订单被确认，将送出
							case 11;
								echo "	<td>
											<form action = './services/takeaway/orderupdate.php' method='post'>
												<input type='submit' class='doyes' name='update' value = '订单送出'>
												<input type='submit' class='dono' name='update' value = '申请撤单'>
												<input type='text' class = 'noreason' name='reason' value = '填写撤单理由'>
												<input type='hidden' name='upoid' value = '".$row['oid']."'>
											</form>
										</td>";
							break;

							//Waiting for user confirm receive 等待用户确认送达
							case 22;
								echo "	<td>
											<a>等待用户确认送达</a>
										</td>";
							break;

							//Store apply for cancel the Order 商家申请撤销订单
							case 55;
								echo "	<td>
											<a>正在撤单，等待用户确认</a>
										</td>";
							break;

							//User agree cancel the order 用户同意撤销
							case 51;
								echo "	<td>
											<a>用户确认撤单</a>
										</td>";
							break;

							//User refuse cancel 用户拒绝撤销
							case 44;
								echo "	<td>
											<a>用户拒绝撤单，订单继续</a><br>
											<form action = './services/takeaway/orderupdate.php' method='post'>
												<input type='submit' class='doyes' name='update' value = '订单送出'>
												<input type='hidden' name='upoid' value = '".$row['oid']."'>
											</form>
										</td>";
							break;


							//User confirm received but not estimate 用户确认送达，但未评价
							case 98;
								echo "	<td>
											<a>用户确认送达</a>
										</td>";
							break;

							//User confirm received 用户确认送达
							case 99;
								echo "	<td>
											<a>用户确认送达</a>
										</td>";
							break;


						}

						//Secound table: Item and Price 第二个表格：商品和价格
						echo "</tr></table><br/><table border = '1'>
								<tr>";

						if(!$row['item1Name'] == "" && $row['item1Sid'] == $sid){
							echo '<th>餐品</th>';
							echo '<th>价格</th>';
						}

						if(!$row['item2Name'] == "" && $row['item2Sid'] == $sid){
							echo '<th>餐品</th>';
							echo '<th>价格</th>';
						}

						if(!$row['item3Name'] == "" && $row['item3Sid'] == $sid){
							echo '<th>餐品</th>';
							echo '<th>价格</th>';
						}

						if(!$row['item4Name'] == "" && $row['item4Sid'] == $sid){
							echo '<th>餐品</th>';
							echo '<th>价格</th>';
						}

						if(!$row['item5Name'] == "" && $row['item5Sid'] == $sid){
							echo '<th>餐品</th>';
							echo '<th>价格</th>';
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

						echo "</tr></table>";
						echo "<a>订单总价：".$tpricef."￡</a><a>   折后总价：".$tpriceAF."￡ (0则为不打折)</a><br/><br/></figure><br>";
				}

				//Print error infomation (if exist) 打印错误信息（如果存在）
				echo mysqli_error($link);

				echo "<br><br>一共有{$rownum}个历史订单，显示{$show_num}条，{$current}/{$total_pages} （数据仅保留14天）";
				echo "<a href='ordercenter.php?page=1'> 首页 </a>";

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
