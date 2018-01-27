<?php  
header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "root";  
$dbname = "Car";  
if(!isset($_GET['cid'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '车牌号 is not define';
	echo json_encode($arr);
    die();
}  
if(!isset($_GET['uid'])){  
	$arr['status'] = 0;
	$arr['msg']   = '用户id is not define';
	echo json_encode($arr);
    die();  
}  
if(!isset($_GET['cname'])){  
	$arr['status'] = 0;
	$arr['msg']   = '车主名 is not define';
	echo json_encode($arr);
    die();  
}  
if(!isset($_GET['types'])){  
	$arr['status'] = 0;
	$arr['msg']   = '车辆类型 is not define';
	echo json_encode($arr);
    die();  
}  
if(!isset($_GET['age'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '车龄 is not define';
	echo json_encode($arr);
    die();  
}  

$cid=$_GET['cid'];
$uid=$_GET['uid'];
$cname=$_GET['cname'];
$types=$_GET['types'];
$age=$_GET['age'];


if(empty($cid)){  
	$arr['status'] = 0;
	$arr['msg']   = '车牌号 is empty';
	echo json_encode($arr);
    die();  
}  
if(empty($uid)){ 
	$arr['status'] = 0;
	$arr['msg']   = '用户id is empty';
	echo json_encode($arr);
    die();
}  
if(empty($cname)){  
	$arr['status'] = 0;
	$arr['msg']   = '车主姓名 is empty';
	echo json_encode($arr);
    die();    
}  
if(empty($types)){  
	$arr['status'] = 0;
	$arr['msg']   = '车辆类型 is empty';
	echo json_encode($arr);
    die();   
}  
if(empty($age)){
	$arr['status'] = 0;
	$arr['msg']   = '车龄 is empty';
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
  
$sql = "UPDATE Cars SET `uid`='{$uid}', `cname`='{$cname}', `age`='{$age}', `types`='{$types}' where cid='{$cid}'";
  

if($conn->query($sql)==true){
	$arr['status'] = 1;
	$arr['msg']   = '提交成功,success';
	echo json_encode($arr);
}else{
	$arr['status'] = 0;
	$arr['msg']   = '提交失败,fail';
	echo json_encode($arr);
}


?>  