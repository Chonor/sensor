<?php  
header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "root";  
$dbname = "Car";   
if(!isset($_GET['uname'])){  
    die('用户名 is not define');  
}  
if(!isset($_GET['passwd'])){  
    die('密码 is not define');  
}  

$uname=$_GET['uname'];
$passwd=$_GET['passwd'];

if(empty($uname)){  
    die('用户名 is  empty');    
}  
if(empty($passwd)){  
    die('密码 is empty');
}  


// 创建连接  
$conn =new mysqli($servername, $username, $password, $dbname);  
// 检测连接  
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}  
  
$sql = "update Users set passwd='{$passwd}' where uname='{$uname}'";  
if($conn->query($sql)==true){
	$arr['status'] = 1;
	$arr['msg']   = '提交成功';
	echo json_encode($arr);
}else{
	$arr['status'] = 0;
	$arr['msg']   = '提交失败';
	echo json_encode($arr);
}
  
?>  