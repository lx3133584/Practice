<?php

$servername = "bdm259768380.my3w.com";
$username = "bdm259768380";
$password = "w0shilxo";
$dbname = "bdm259768380_db";

// 创建连接
$con = mysql_connect($servername,$username,$password);
// 检测连接
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

 mysql_select_db($dbname, $con);

//判断如果是get请求，则进行搜索；如果是POST请求，则进行新建
//$_SERVER是一个超全局变量，在一个脚本的全部作用域中都可用，不用使用global关键字
//$_SERVER["REQUEST_METHOD"]返回访问页面使用的请求方法
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	echo 'Error METHOD';
} elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
	search();
}

function search(){
	$account = $_POST["account"];
	$password = $_POST["password"];
	$sql="SELECT account FROM  MyGuests WHERE (account='$account') AND (password='$password') ";
	$query=mysql_query($sql);
	$rows=mysql_num_rows($query); 

	if($rows>0){
		$row = mysql_fetch_array($query);
		echo '{"success":true,"message":"登陆成功"}';
	}
	else{
		echo '{"success":false,"message":"用户名或密码不正确"}';
	}
}

// ,"name":"$row['name']","sex":"$row['sex']"

?>