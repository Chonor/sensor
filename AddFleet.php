<?php  
header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "root";  
$dbname = "Car";  
if(!isset($_GET['fid'])){  
    die('车队号 is not define');
}  
if(!isset($_GET['fname'])){  
    die('车队名 is not define');  
}  
$fid=$_GET['fid'];
$fname=$_GET['fname'];

if(empty($fid)){  
    die('车队号 is empty');
}  
if(empty($fname)){  
    die('车队名 is not empty');    
}  


// 创建连接  
$conn =new mysqli($servername, $username, $password, $dbname);  
// 检测连接  
if ($conn->connect_error) {  
     die("Connection failed: " . $conn->connect_error);  
}  
  
$sql = "INSERT INTO `Fleet` (`fid`, `fname`) VALUES ('{$fid}', '{$fname}')";
   
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