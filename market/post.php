<html>

<?php include('./header.php'); $pid = $_GET['pid'];?>

		<!--NAV START-->

		  <?php include('./navbar.php'); ?>

      <?php

      /**
       * Create by WU JIANFENG
       * 2016/5/23
       * Pucun-FleaMarket WebApp
       * Post Template
       */

      //Connect to database
      include('../services/common/connect.php');

      $sql = "select user,item_name,item_age,item_img,item_details,item_price,item_contacts,item_wechat,pub_time,mod_time from m_post where pid='$pid'";
      $sqlrun = mysqli_query($link,$sql);
      $sqlrunt = mysqli_fetch_array($sqlrun);
      echo mysqli_error($link);

      $imgArr = explode(";",$sqlrunt[3]);

      echo "
      <title>朴村集市 - ".$sqlrunt[1]."</title>
      </head>


      <body>

			<!--NAV END-->
  		<div class='columns_form'>
  			<figure>

          <div class='div_post_coverimg'>
						<!--Image Src have a .before getting address from database which will become ../upload/img-->
            <img class='post_coverimg' src=.".$imgArr[0]." width='100%'>
          </div>

          <div class='div_post_title'>
            <h1>【内容注释：这是标题】".$sqlrunt[1]."</h1>
          </div>

          <br><br><br><br>

          <div class='div_post_info'>

            <a>【内容注释：这是文章发布相关信息】发布账户：".$sqlrunt[0]." <br>发布日期：".$sqlrunt[8]." <br>修改日期：".$sqlrunt[9]."</a>

          </div>

          <br><br><br><br>

          <div class='div_post_details'>

            <a>【内容注释：这是详细描述】".$sqlrunt[4]."</a>

          </div>

          <br><br><br><br>

          <div class='div_post_image'>";

					// Loop display Image 文章页循环显示图片
          for($imgc = 0; isset($imgArr[$imgc]); $imgc++){

          echo "<a href='.".$imgArr[$imgc]."'><img src='.".$imgArr[$imgc]."' width='50%''></a><br><br>";

					}


            echo "

          </div>

  			  </figure>



        ";

        ?>

  			<?php include('footer.php');?>
  		</div>

	</body>
</html>
