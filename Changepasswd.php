<?php  
header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "root";  
$dbname = "Car";   
if(!isset($_GET['uname'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '用户名 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}
if(!isset($_GET['oldpasswd'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '旧密码 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
if(!isset($_GET['passwd'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '密码 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
$uname=$_GET['uname'];
$opasswd=$_GET['oldpasswd'];
$passwd=$_GET['passwd'];

if(empty($uname)){  
	$arr['status'] = 0;
	$arr['msg']   = '用户名 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();    
}  
if(empty($opasswd)){  
	$arr['status'] = 0;
	$arr['msg']   = '旧密码 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();
}  
if(empty($passwd)){  
	$arr['status'] = 0;
	$arr['msg']   = '密码 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();
}  
// 创建连接  
$conn =new mysqli($servername, $username, $password, $dbname);  
// 检测连接  
if ($conn->connect_error) {  
    $arr['status'] = 0;
	$arr['msg']   = "Connection failed: " . $conn->connect_error;
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
  
$sql = "update Users set passwd='{$passwd}' where uname='{$uname}' AND passwd='{$opasswd}'";  
if($conn->query($sql)==true){
	$arr['status'] = 1;
	$arr['msg']   = '提交成功';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
}else{
	$arr['status'] = 0;
	$arr['msg']   = '修改失败';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
}
$conn->close();   
?>  