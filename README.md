����Ҫ��
PHP�汾��PHP5.5+
MySQL���ݿ�
�Ƽ���װphpmyadmin

ǰfont-end��

bulletincenter.php: ���̹��� �����༭����
login.php ��¼����
signup.php ������ע�����
sign-up-free-noinvite-vip-only.php ��������ע��
ordercenter.php �������Ľ���
shoppingcart.php ���ﳵ��ʾ
footer.php ҳβ���������ݾ���λ�ã�
footer_index.php ���������������λ�ã�
header.php HTMLͷ����������</head>��<title>��
navbar.php ������ ������ͷ��
confirm.php ����ȷ�Ͻ���
usercenter.php �û����Ľ���
searchfunc.php �������ܺ���ʾ
privateterm / serviceterm �û�����˽����ҳ��
store��1-7��.php ����1-7




��back-end��

connect.php ���ݿ�����
bulletinfunc.php ���̹��� �������Ϣ ����
buserorderfunc.php �̼��û�������ʾ+����
userorderfunc.php ��ͨ�û�������ʾ+����
loginfunc.php ��¼���ܴ���
signupfunc.php ע�Ṧ�ܴ���
orderupdate.php ����״̬���� �̼Һ���ͨ�û�����
ucenterfunc.php �û����� �û���Ϣ���´���
uploadfunc.php �ϴ�ͼƬ����
smsapi.php ���ڷ��Ͷ��ţ����Զ���ƽ̨��ֱ�ӵ��ü��ɣ������޸�
storeupdatefunc.php �����̼Ҳ˵�����
storerowfunc.php ͨ���̵�ID��ʾ�̵���Ϣ
invitefunc.php ���������빦��




���checker��

notlogincheck.php ����Ƿ��¼�����ڵ�¼���ҳ�棬�綩�����ģ�
logincheck.php ����Ƿ�δ��¼ �����ڵ�¼ǰ�Ľ��棬��ע�����Ҫ����ע����
scychech.php ������ַ��޶� ��SQLע��


������plug-in��

silder.php �õ�Ƭ���


��ʽ��CSS��
style.css ȫ����ʽ
slider.css �õ�Ƭ�����ʽ ��ȡ��bootstrap

JS��
jquery.js ����jQuery���
cart.js ���ﳵ����
��Bootstrap.min.js �õ�Ƭ������룩

���ݱ����ļ���sql�ļ�����




���ֽ��ͣ�

�����ݿ��������

���в�ѯ��ִ�����ݿ��ʱ���������ݿ����ӳɹ�������������Ӧ�Ľṹ
���޸�connect.php�е����ݿ�����һ��Ϊlocalhost�������ݿ��û��������ݿ�����
��phpmyadmin�д���һ����Ϊpucuntw�����ݿ⣬����sql�ļ����е�pucuntw.sql�ļ������Զ������������ݿ�ṹ������Ҫ��

���ݿ��ѯ�÷���

1.����һ���������������ݿ����
$sql = "select password,usertype from user where username = 'aaa'";

ֱ����˼Ϊ��ѡ�����ݱ��е�password��usertype��Ŀ�������ݱ�user�У���ѰusernameΪaaa�ġ�
������˼Ϊ�������ݱ�user�У�Ѱ��usernameΪaaa����password��usertype��Ŀ����

2.�������ݿ����
$sqlrun = mysqli_query($link, $sql);

��$linkΪ�������ݿ�ʱ�ı�����

3.����ѯ���ݺϳ�Ϊ����
$result = mysqli_fetch_array($sqlrun);

�����$result[0] = password ��result�����еĵ�һ��ֵ��Ϊ��ѯ����password���ڶ�����Ϊ��ѯ����usertype��

������ϳ�Ϊ���飬��Ϊ�������Ͳ�ͬ���޷�ֱ�������

�����﷨���ͣ�
http://www.w3school.com.cn/php/php_mysql_select.asp


POST����ʹ�ã�

һ��������ǰ�����ݷ��͵���˴������߿��ļ���������İ취�������ã�

== ���׽��� ==
<form action="welcome_get.php" method="post">

	Name: <input type="text" name="name"><br>

<form>

���ܣ�<?php $_POST['name']; ?>



== �������� ==

ǰ�˷��ͣ�

<form action="welcome_get.php" method="post">
	Name: <input type="text" name="name"><br>
	E-mail: <input type="text" name="email"><br>
	<input type="submit" value="submit">
</form>

��˽��ܣ�
��isset����˼�ǣ���֤�����Ƿ���ڣ�
if(isset($_POST["Submit"]) && $_POST["Submit"] == "submit"){

	$username = $_POST['name']; //����ǰ��POST��ȥ����ΪNAME�����ݣ�д�����username��
	$useremail = $_POST['email']; //����ǰ��POST��ȥ����ΪNAME�����ݣ�д�����usermail��

}


http://www.w3schools.com/php/php_forms.asp


SESSION, Cookie���ͣ�
һ�ֽ�һЩС���ݴ������û����Ա��صĴ洢��ʽ���������У������û���½���û���Ϣ�Ĵ��棬SESSION��ѭĬ�Ϲ���ʱ�䣬��1440�����ڣ���PHP�����ú͵��á�

LocalStorage���ͣ�
һ�ֽ��ϴ�����ݣ�������4M���������û����Ա��صĴ��淽ʽ���ڱ������У����û�ʹ�ù��ﳵʱ�����û�ѡ�����ʱ���ݴ�����LocalStorage���С���JavaScript�����ú͵��á�





