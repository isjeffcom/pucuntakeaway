<?php
				
				$sqloid = "select id from store".$sid."data";
				$sqloidrun = mysqli_query($link,$sqloid);
				$rownum = mysqli_num_rows($sqloidrun);
				
				$show_num=32;//显示多少条
	    		$total_pages=ceil($rownum/$show_num);//获取总的页数，ceil向上去整，floor向下
	    		$current=isset($_GET['page'])?$_GET['page']:1;//当前页号
	    		$next=($current==$total_pages)?false:$current+1;
	    		$prev=($current==1)?false:$current-1;
	    		$offset=($current-1)*$show_num;
				
				//Get all item 获取所有商品 通过top排序，如果top为1则置顶（倒序），再根据id排序（正序），限制每页显示数量
				$sqlgeto = "select * from store".$sid."data order by top DESC,id limit $offset,$show_num";
				$sqlgetorun = mysqli_query($link,$sqlgeto);
				$listnum = mysqli_num_rows($sqlgetorun); 
				
				//Query and Display 循环查询并显示
				while($row = mysqli_fetch_array($sqlgetorun)){
					
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