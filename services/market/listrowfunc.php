<?php
				include("../services/common/connect.php");

				$sqloid = "select pid from m_post";
				$sqloidrun = mysqli_query($link,$sqloid);
				$rownum = mysqli_num_rows($sqloidrun);

				$show_num=32;//显示多少条
	    	$total_pages=ceil($rownum/$show_num);//获取总的页数，ceil向上去整，floor向下
	    	$current=isset($_GET['page'])?$_GET['page']:1;//当前页号
	    	$next=($current==$total_pages)?false:$current+1;
	    	$prev=($current==1)?false:$current-1;
	    	$offset=($current-1)*$show_num;

				//Get all item 获取所有商品 通过top排序，如果top为1则置顶（倒序），再根据id排序（正序），限制每页显示数量
				$sqlgeto = "select * from m_post order by pid DESC limit $offset,$show_num";
				$sqlgetorun = mysqli_query($link,$sqlgeto);
				$listnum = mysqli_num_rows($sqlgetorun);

				//Query and Display 循环查询并显示
				while($row = mysqli_fetch_array($sqlgetorun)){

					if($row['status'] != 0){


						//准备转义
						$itype = $row['item_type'];
						$iage = $row['item_age'];

						//转义INT值为通用语言
						include('../services/market/itemtypefunc.php');
						include('../services/market/itemagefunc.php');

						echo "
							<figure>
				    			";


				    	if($row['item_img'] != ""){

								//区分多个图片地址
								$coverImg = explode(';',$row['item_img']);

				    	echo	"

				    			<img src='.".$coverImg[0]."'>

				    			";

						}

						echo	"

					    		<figcaption>
							    	<a class='name'>".$row['item_name']."</a> <br>
							    	<a class='detail'>".$itypename."  ".$iagename."</a> <br>
							    	<a>£</a><a class='price'>".$row['item_price']."</a><br>
							    	<a href='./post.php?pid=".$row['pid']."'><button>详情</button></a>
										<input type = 'hidden' class='id' value='".$row['pid']."'>
					    		</figcaption>

							</figure>
							";
							
						}
				}





				//Page Ctrl
				echo "<div class='smore'>

		    	<figure>

			    	<figcaption>

			    		<b>一共有{$rownum}样菜品，显示{$show_num}条，{$current}/{$total_pages}</b>
			    		<b><a href='".$_SERVER['PHP_SELF']."?page=1'> 首页  </a></b>

			    	";

				if(!$prev){
						echo "<b><a>  上一页   </a></b> ";
				}else{
						echo "<b><a href='".$_SERVER['PHP_SELF']."?page={$prev}'>  上一页   </a></b>";
				}

				if(!$next){
						echo "<b><a>  下一页   </a></b>";
				}else{
						echo "<b><a href='".$_SERVER['PHP_SELF']."?page={$next}'>  下一页   </a></b>";
				}

				echo "</figcaption></figure></div>";




?>
