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
if(!isset($_GET['money'])){
	$arr['status'] = 0;
	$arr['msg']   = 'money is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();    
}  

$uname=$_GET['uname'];
$money=$_GET['money'];

if(empty($uname)){ 
	$arr['status'] = 0;
	$arr['msg']   = '用户名 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();    
}  
if(empty($money)){
	$arr['status'] = 0;
	$arr['msg']   = 'money is empty';
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
  
$sql = "update Users set moneys=moneys+{$money} where uname='{$uname}'";  
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