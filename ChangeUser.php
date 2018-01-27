<?php  
header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "root";  
$dbname = "Car";  
if(!isset($_GET['uid'])){  
	$arr['status'] = 0;
	$arr['msg']   = 'uid is not define';
	echo json_encode($arr);
    die();  
}  
if(!isset($_GET['uname'])){  
	$arr['status'] = 0;
	$arr['msg']   = '用户名 is not define';
	echo json_encode($arr);
    die();  
}  
if(!isset($_GET['sex'])){  
	$arr['status'] = 0;
	$arr['msg']   = '性别 is not define';
	echo json_encode($arr);
    die();  
}  
if(!isset($_GET['phone'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '手机 is not define';
	echo json_encode($arr);
    die();  
}  
if(!isset($_GET['email'])){  
	$arr['status'] = 0;
	$arr['msg']   = '邮箱 is not define';
	echo json_encode($arr);
    die();  
}  
if(!isset($_GET['position'])){  
	$arr['status'] = 0;
	$arr['msg']   = '地区 is not define';
	echo json_encode($arr);
    die();  
}  
$uid=$_GET['uid'];
$uname=$_GET['uname'];
$sex=$_GET['sex'];
$email=$_GET['email'];
$phone=$_GET['phone'];
$position=$_GET['position'];

if(empty($uid)){  
	$arr['status'] = 0;
	$arr['msg']   = 'uid is empty';
	echo json_encode($arr);
    die();    
}  
if(empty($uname)){  
	$arr['status'] = 0;
	$arr['msg']   = '用户名 is empty';
	echo json_encode($arr);
    die();    
}  
if(empty($sex)){  
	$arr['status'] = 0;
	$arr['msg']   = '性别 is empty';
	echo json_encode($arr);
    die();
}  
if(empty($phone)){  
	$arr['status'] = 0;
	$arr['msg']   = '电话 is empty';
	echo json_encode($arr);
    die();    
}  
if(empty($email)){  
	$arr['status'] = 0;
	$arr['msg']   = '邮箱 is empty';
	echo json_encode($arr);
    die();    
}
if(empty($position)){  
	$arr['status'] = 0;
	$arr['msg']   ='地区 is empty';
	echo json_encode($arr);
    die();    
}  
// 创建连接  
$conn =new mysqli($servername, $username, $password, $dbname);  
// 检测连接  
if ($conn->connect_error) {  
	$arr['status'] = 0;
	$arr['msg']   = "Connection failed: " . $conn->connect_error;
	echo json_encode($arr);
    die();
}  
$sql = "UPDATE Users SET uname='{$uname}', `sex`='{$sex}', `position`='{$position}', `phone`='{$phone}', `email`='{$email}' where  uid={$uid}";
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