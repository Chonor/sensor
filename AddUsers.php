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
if(!isset($_GET['passwd'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '密码 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
if(!isset($_GET['sex'])){  
	$arr['status'] = 0;
	$arr['msg']   = '性别 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
if(!isset($_GET['phone'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '手机 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
if(!isset($_GET['email'])){  
	$arr['status'] = 0;
	$arr['msg']   = '邮箱 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
if(!isset($_GET['position'])){  
	$arr['status'] = 0;
	$arr['msg']   = '地区 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  

$uname=$_GET['uname'];
$passwd=$_GET['passwd'];
$sex=$_GET['sex'];
$email=$_GET['email'];
$phone=$_GET['phone'];
$position=$_GET['position'];

if(empty($uname)){  
	$arr['status'] = 0;
	$arr['msg']   = '用户名 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();    
}  
if(empty($passwd)){  
	$arr['status'] = 0;
	$arr['msg']   = '密码 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();
}  
if(empty($sex)){  
	$arr['status'] = 0;
	$arr['msg']   = '性别 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();
}  
if(empty($phone)){  
	$arr['status'] = 0;
	$arr['msg']   = '电话 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();    
}  
if(empty($email)){  
	$arr['status'] = 0;
	$arr['msg']   = '邮箱 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();    
}
if(empty($position)){  
	$arr['status'] = 0;
	$arr['msg']   ='地区 is empty';
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
$sql = "INSERT INTO `Users` (`uname`, `passwd`, `sex`, `position`, `phone`, `email`) VALUES ('{$uname}', '{$passwd}', '{$sex}', '{$position}','{$phone}','{$email}')";   
if($conn->query($sql)==true){
	$arr['status'] = 1;
	$arr['msg']   = '提交成功';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
}else{
	$arr['status'] = 0;
	$arr['msg']   = '提交失败';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
}
$conn->close(); 
?>  