<?php

/**
 * Create by WU JIANFENG
 * 2016/4/11
 * Pucun-Takeaway WebApp
 * OrderList Row Display for Normal User
 */
echo "<br><a><b>您好：".$_SESSION['username']." 以下是您发布的信息</b></a><br/>";

				//Connect to database
				include("../services/common/connect.php");


				//Find Order Number
				$sqloid = "select pid from m_post where userid = '$userid'";
				$sqloidrun = mysqli_query($link,$sqloid);
				$rownum = mysqli_num_rows($sqloidrun);


				$show_num=10;//显示多少条
	    	$total_pages=ceil($rownum/$show_num);//获取总的页数，ceil向上去整，floor向下
	    	$current=isset($_GET['page'])?$_GET['page']:1;//当前页号
	    	$next=($current==$total_pages)?false:$current+1;
	    	$prev=($current==1)?false:$current-1;
	    	$offset=($current-1)*$show_num;

				//Get all order
				$sqlgeto = "select * from m_post where userid = '$userid' order by pid DESC limit $offset,$show_num";
				$sqlgetorun = mysqli_query($link,$sqlgeto);
				$listnum = mysqli_num_rows($sqlgetorun);


				//DISPLAY ALL RELETIVE ORDER FORM DATABASE
				while($row = mysqli_fetch_array($sqlgetorun)){


					$status = $row['status'];

					//PRINT TABLE
					echo "<figure><br/><table border = '1'>
								<tr>
									<th>名称</th>
									<th>价格</th>
									<th>发布时间</th>
									<th>修改时间</th>
									<th>感兴趣</th>
									<th>操作</th>
								</tr>
							";

					echo "<tr>";
						echo "<td>".$row['item_name']."</td>";
						echo "<td>".$row['item_price']."</td>";
						echo "<td>".$row['pub_time']."</td>";
						echo "<td>".$row['mod_time']."</td>";
						echo "<td>".$row['liked']."</td>";

						//REACT FROM ORDER STATUS
						switch ($status){

							case 0;
								echo "	<td>
											<form action = '../services/market/postupdate.php' method='post'>
												<a>草稿或被暂停展示</a><br><br>
												<input type='submit' class='doyes' name='update' value = '查看信息'>
												<input type='submit' class='doyes' name='update' value = '发布信息'>
												<input type='submit' class='doyes' name='update' value = '编辑信息'>
												<input type='submit' class='dono' name='update' value = '关闭信息'>
												<input type='hidden' name='pid' value = '".$row['pid']."'>
											</form>
										</td>";
							break;

							case 1;
								echo "	<td>
											<form action = '../services/market/postupdate.php' method='post'>
												<a>已发布，正在展示</a><br><br>
												<input type='submit' class='doyes' name='update' value = '查看信息'>
												<input type='submit' class='doyes' name='update' value = '暂停展示'>
												<input type='submit' class='doyes' name='update' value = '编辑信息'>
												<input type='submit' class='dono' name='update' value = '关闭信息'>
												<input type='hidden' name='pid' value = '".$row['pid']."'>
											</form>
										</td>";
							break;

							case 99;
								echo "	<td>
											<form action = '../services/market/postupdate.php' method='post'>
												<a>信息已被关闭</a><br><br>
												<input type='submit' class='doyes' name='update' value = '查看信息'>
												<input type='hidden' name='pid' value = '".$row['pid']."'>
											</form>
										</td>";
							break;

						}

						echo "</tr></table><br></figure><br>";
				}

				echo mysqli_error($link);
				echo "<br><br>一共创建过{$rownum}条信息，显示{$show_num}条，{$current}/{$total_pages} ";
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
