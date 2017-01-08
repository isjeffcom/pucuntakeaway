<!--CREATE BY WU JIANFENG IN APRIL 11 2016-->
<meta http-equiv="content-type" content="text/html" charset="UTF-8">

<?php


/**
 * Create by WU JIANFENG
 * 2016/4/11
 * Pucun-Takeaway WebApp
 * Order Update function
 */

	$ifupdate = $_POST["update"];
	include('../common/connect.php');

	switch ($ifupdate){

		case '确认订单';

			$oid = $_POST["upoid"];
			$sql = "update orderlist set orderStatus = '11' where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('已成功确认，当您送出的时候请再次确认送出'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
			}
		break;

		case '拒绝订单';

			$oid = $_POST["upoid"];
			$reason = $_POST['reason'];
			$sql = "update orderlist set orderStatus = '111', refuseReason = '$reason' where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('已拒绝此订单，建议您联系用户再次确认'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
			}
		break;

		case '订单送出';

			$oid = $_POST["upoid"];
			$sql = "update orderlist set orderStatus = '22' where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('已确认送出，谢谢'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
			}
		break;

		case '申请撤单';

			$oid = $_POST["upoid"];
			$reason = $_POST['reason'];
			$sql = "update orderlist set orderStatus = '55', refuseReason = '$reason' where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('已向用户申请撤单，请联系用户确认'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
			}
		break;

		case '确认送达';

			$oid = $_POST["upoid"];
			$sql = "update orderlist set orderStatus = '98' where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('已经确认送达，谢谢！'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
			}
		break;

		case '允许撤单';

			$oid = $_POST["upoid"];
			$sql = "update orderlist set orderStatus = '51' where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('已经确认撤单，谢谢'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
			}
		break;

		case '拒绝撤单';

			$oid = $_POST["upoid"];
			$sql = "update orderlist set orderStatus = '44' where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('已拒绝撤单，请联系店家进一步确认'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";
			}
		break;

		case '很好';

			$oid = $_POST["upoid"];
			$sid = $_POST["upsid"];

			$sqlr = "update store set review=review+1 where sid = '$sid'";
			$sqlrrun = mysqli_multi_query($link,$sqlr);
			echo mysqli_error($link);

			$sqlu = "update orderlist set orderStatus = '99' where oid = '$oid'";
			$sqlurun = mysqli_multi_query($link,$sqlu);



			if ($sqlrrun && $sqlurun){

			    echo "<script>alert('已评价订单，下次继续完美'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";

			}

		break;

		case '可以';
			$oid = $_POST["upoid"];

			$sql = "update orderlist set orderStatus = '99' where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('已评价订单，谢谢'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";

			}

		break;

		case '不好';
			$oid = $_POST["upoid"];
			$sid = $_POST["upsid"];

			$sqlr = "update store set review=review-1 where sid = '$sid'";
			$sqlrrun = mysqli_multi_query($link,$sqlr);

			$sqlu = "update orderlist set orderStatus = '99' where oid = '$oid'";
			$sqlurun = mysqli_multi_query($link,$sqlu);

			if ($sqlrrun && $sqlurun){

			    echo "<script>alert('已评价订单，我们对您糟糕的体验感到遗憾'); history.go(-1);</script>";

			}else{
				echo mysqli_error($link);
			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";

			}



		break;

		case '撤销订单(0)';
			$oid = $_POST["upoid"];

			$sql = "update orderlist set orderStatus = '0' where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('操作成功'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";

			}

		break;

		case '送出订单(22)';
			$oid = $_POST["upoid"];

			$sql = "update orderlist set orderStatus = '22' where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('操作成功'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";

			}

		break;

		case '结束订单(99)';
			$oid = $_POST["upoid"];

			$sql = "update orderlist set orderStatus = '99' where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('操作成功'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";

			}

		break;

		case '删除订单';
			$oid = $_POST["upoid"];

			$sql = "delete from orderlist where oid = '$oid'";
			$sqlrun = mysqli_query($link,$sql);
			echo mysqli_error($link);

			if ($sqlrun){

			    echo "<script>alert('操作成功'); history.go(-1);</script>";

			}else{

			    echo "<script>alert('这里有点问题，微信联系我们');history.go(-1);</script>";

			}

		break;

	}


?>
