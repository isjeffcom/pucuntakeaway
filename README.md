运行要求：
PHP版本：PHP5.5+
MySQL数据库
推荐安装phpmyadmin

前font-end：

bulletincenter.php: 店铺管理 公告板编辑界面
login.php 登录界面
signup.php 邀请码注册界面
sign-up-free-noinvite-vip-only.php 无邀请码注册
ordercenter.php 订单中心界面
shoppingcart.php 购物车显示
footer.php 页尾（根据内容决定位置）
footer_index.php （根据浏览器决定位置）
header.php HTML头部（不包含</head>和<title>）
navbar.php 导航栏 真正的头部
confirm.php 订单确认界面
usercenter.php 用户中心界面
searchfunc.php 搜索功能和显示
privateterm / serviceterm 用户和隐私条款页面
store（1-7）.php 店铺1-7




后back-end：

connect.php 数据库连接
bulletinfunc.php 店铺管理 公告板信息 处理
buserorderfunc.php 商家用户订单显示+处理
userorderfunc.php 普通用户订单显示+处理
loginfunc.php 登录功能处理
signupfunc.php 注册功能处理
orderupdate.php 订单状态处理 商家和普通用户公用
ucenterfunc.php 用户中心 用户信息更新处理
uploadfunc.php 上传图片功能
smsapi.php 用于发送短信，来自短信平台，直接调用即可，无需修改
storeupdatefunc.php 更新商家菜单功能
storerowfunc.php 通过商店ID显示商店信息
invitefunc.php 生成邀请码功能




检查checker：

notlogincheck.php 检查是否登录（用于登录后的页面，如订单中心）
logincheck.php 检查是否未登录 （用于登录前的界面，如注册界面要求先注销）
scychech.php 输入框字符限定 防SQL注入


保留项plug-in：

silder.php 幻灯片插件


样式表CSS：
style.css 全部样式
slider.css 幻灯片插件样式 提取自bootstrap

JS：
jquery.js 载入jQuery插件
cart.js 购物车功能
（Bootstrap.min.js 幻灯片插件必须）

数据表备份文件在sql文件夹中




部分解释：

对数据库的依赖：

所有查询和执行数据库的时候，依赖数据库连接成功，并创建了相应的结构
请修改connect.php中的数据库名（一般为localhost），数据库用户名和数据库密码
在phpmyadmin中创建一个名为pucuntw的数据库，导入sql文件夹中的pucuntw.sql文件即可自动导入所有数据库结构。（必要）

数据库查询用法：

1.声明一个变量，填入数据库语句
$sql = "select password,usertype from user where username = 'aaa'";

直译意思为：选择数据表中的password和usertype项目，从数据表user中，找寻username为aaa的。
意译意思为：从数据表user中，寻找username为aaa，的password和usertype项目数据

2.运行数据库语句
$sqlrun = mysqli_query($link, $sql);

（$link为连接数据库时的变量）

3.将查询数据合成为数组
$result = mysqli_fetch_array($sqlrun);

结果：$result[0] = password （result数组中的第一个值则为查询到的password，第二个则为查询到的usertype）

如果不合成为数组，因为数据类型不同，无法直接输出。

具体语法解释：
http://www.w3school.com.cn/php/php_mysql_select.asp


POST方法使用：

一种用来将前端数据发送到后端处理，或者跨文件传输变量的办法，简单易用：

== 简易介绍 ==
<form action="welcome_get.php" method="post">

	Name: <input type="text" name="name"><br>

<form>

接受：<?php $_POST['name']; ?>



== 案例介绍 ==

前端发送：

<form action="welcome_get.php" method="post">
	Name: <input type="text" name="name"><br>
	E-mail: <input type="text" name="email"><br>
	<input type="submit" value="submit">
</form>

后端接受：
（isset的意思是，验证变量是否存在）
if(isset($_POST["Submit"]) && $_POST["Submit"] == "submit"){

	$username = $_POST['name']; //接受前端POST出去的名为NAME的数据，写入变量username中
	$useremail = $_POST['email']; //接受前端POST出去的名为NAME的数据，写入变量usermail中

}


http://www.w3schools.com/php/php_forms.asp


SESSION, Cookie解释：
一种将一些小数据储存在用户电脑本地的存储方式，本程序中，用于用户登陆后用户信息的储存，SESSION遵循默认过期时间，在1440秒后过期，在PHP中设置和调用。

LocalStorage解释：
一种将较大的数据（不大于4M）储存在用户电脑本地的储存方式，在本程序中，在用户使用购物车时，将用户选择的临时数据储存在LocalStorage当中。在JavaScript中设置和调用。





