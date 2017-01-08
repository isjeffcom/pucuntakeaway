<meta http-equiv="content-type" content="text/html" charset="UTF-8">

<?php

		//Multiple Image Upload Loop 多文件上传循环语句
		for($i=1; $i<=6; $i++){

			//If triger the uplaad 如果触发上传情况
			if($_FILES["fileToUpload".$i.""]["name"] != null){
				$time = time();
				$target_dir = "../../upload/img/";
				$fake_dir = "./upload/img/";

				$fileName = $time.'_'.basename($_FILES["fileToUpload".$i.""]["name"]);
        echo $fileName;
				$upAddress = $target_dir.$fileName;
				$uploadOk = 1;
				$imageFileType = pathinfo($upAddress,PATHINFO_EXTENSION);

				//File checker 文件类型检查器

							//Check image file type 检查文件格式
							if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

							    echo "<script>alert('请上传JPG/JPEG/PNG/GIF格式图片');history.go(-1);</script>";
									exit();
							    $uploadOk = 0;

							}

							// Check image is image 检查图片是图片

							$check = getimagesize($_FILES["fileToUpload".$i.""]["tmp_name"]);

							   	if($check !== false) {

							        //echo "File is an image - " . $check["mime"] . ".";
							        $uploadOk = 1;

							    } else {

							        echo "<script>alert('您选择的文件不是图片，请上传JPG/PNG文件');history.go(-1);</script>";
							        $uploadOk = 0;

							}

							// Check file size 检查文件大小
							if ($_FILES["fileToUpload".$i.""]["size"] > 4000000) {

							    echo "<script>alert('您的图片尺寸过大，可以通过微信压缩图片至可接受大小（小于4M）');history.go(-1);</script>";
							    $uploadOk = 0;

							}






				// Check if file already exists
				/*if (file_exists($upAddress)) {

				    echo "Sorry, file already exists.";
				    $uploadOk = 0;

				}*/


				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {

				    echo "<script>alert('由于一些原因，无法开始上传');history.go(-1);</script>";
					exit();

				}else{

					    if (move_uploaded_file($_FILES["fileToUpload".$i.""]["tmp_name"], $upAddress)){

                  //For Debug only 仅用于打印调试
					        //echo "The file ". basename( $_FILES["fileToUpload".$i.""]["name"]). " has been uploaded.";

									//var tf = Output URL. Multiple File Use ';' for Separate 输出地址，一个则为一个地址，多个为多个地址用分号隔开
									if(isset($tf)){
										$tf = $tf.";".$fake_dir.$fileName;
									}else{
										$tf = $fake_dir.$fileName;
									}

					    }else{

					        echo "<script>alert('上传出错，换个文件试下');history.go(-1);</script>";

							exit();
					    }
				}
			}

	}




?>
