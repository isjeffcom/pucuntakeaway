<?php

/**
 * Login-Database-Test
 * Developer: JEFF
 * Date: 2015/7/14
 * Time: 16:48
 */
	//Connect to database DB_NAME, USER_NAME, DB_PASSWORD, DB_MYSQL_NAME   
    $link = mysqli_connect('localhost', 'root', 'WjF1234','pucuntw');//链接数据库
    mysqli_select_db($link,"pucuntw");
    mysqli_query($link,'set names utf8');
	
?>