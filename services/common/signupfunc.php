<html>

	<head>
		<meta http-equiv="content-type" content="text/html" charset="UTF-8">
		<title>朴村外卖 - 注册</title>
	</head>

</html>


<?php
/**
 * Create by WU JIANFENG
 * 2016/3/29
 * Pucun-Takeaway WebApp
 * Signup Function
 */

    if(isset($_POST["Submit"]) && $_POST["Submit"] == "注册"){

        $user = $_POST["username"];
        $psw = $_POST["password"];
				$psw_confirm = $_POST["confirm"];
				$email = $_POST["email"];
				$realname = $_POST["realname"];
				$idnum = $_POST["idnum"];
				$address = $_POST["address"];
				$phone = $_POST["phone"];
				$invitecode = $_POST['invitecode'];

				include('../../checker/scycheck.php');

				//check invitecode

        if ($invitecode == "" || $user == "" || $psw == "" || $psw_confirm == "" || $email == "" || $realname == "" || $idnum = "" || $address = "" || $phone = ""){

            echo "<script>alert('所有信息都填完整了？');history.go(-1);</script>";
			exit();

        }else{

			//DATABASE Controller
			include('connect.php');
			$checkCode = "select code,realcode,ucount from invitecode where code = '$_POST[invitecode]'";
			$checkCodeRun = mysqli_query($link,$checkCode);
			$CCR = mysqli_fetch_array($checkCodeRun);

			//InviteCode not exist
			if(empty($CCR)){
				echo "<script>alert('邀请码不存在，您可以找已经注册的朋友生成一个邀请码');history.go(-1);</script>";
				exit();
			}

			//InviteCode Already been use
			if($CCR[2] == "3"){
				echo "<script>alert('邀请码已使用，您可以找已经注册的朋友生成一个邀请码');history.go(-1);</script>";
				exit();
			}




			//Check password > 6
            if ($psw == $psw_confirm && strlen($psw) >= 6){

            	//connect to database
                $checkUN = "select username from user where username = '$_POST[username]'";
				$checkEM = "select email from user where email = '$_POST[email]'";
				$checkID = "select idnum from user where idnum = '$_POST[idnum]'";

                $resultUN = mysqli_query($link,$checkUN);
				$resultEM = mysqli_query($link,$checkEM);
				$resultID = mysqli_query($link,$checkID);

				//check the database and return boolean
                $cnm = mysqli_num_rows($resultUN);
				$cem = mysqli_num_rows($resultEM);
				$cidn = mysqli_num_rows($resultID);

				//check if the username already exist
                if ($cnm || $cem || $cidn){

                    echo "<script>alert('用户名，邮箱或学号已经被注册了');history.go(-1);</script>";

                }else{
                	//Encryption the password by hash method
                	$icode = $CCR[0];
                	$psw = password_hash($psw,PASSWORD_DEFAULT);
                    $sql_insert = "insert into user (username,password,email,realname,idnum,phone,address,usertype,icode) value('$user','$psw','$email','$realname','$_POST[idnum]','$_POST[phone]','$_POST[address]','1','$icode')";
                    $res_insert = mysqli_query($link,$sql_insert);

					//INVITE CODE USE COUNT
                    if ($res_insert){
						$update = "update invitecode set ucount=ucount+1 where code = '$invitecode'";
						$run = mysqli_query($link,$update);
						echo "<script>alert('邀请码注册成功，邀请者对你说 ";
						echo $CCR[1];
						echo " ');window.location.href='../../login.php';</script>";
                        //echo "<script>alert('注册成功，现在去登录'); window.location.href='../login.php';</script>";

					}else{
						//CAN NOT CONNECTED TO DATABASE
						echo mysqli_error($link);
                        echo "<script>alert('出状况了，通过微信告诉我们，我们尽快解决');history.go(-1);</script>";
                    }
                }

            }else{
            	//COMFIRM PASSWORD NOT RIGHT
                echo "<script>alert('确认密码不匹配或密码应当大于6位');history.go(-1);</script>";
            }

        }
    }else{

		//CANT FIND SUBMIT BUTTON
        echo "<script>alert('页面不正常，换个浏览器试下？');history.go(-1);</script>";

	}

?>
