<?php  
header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "root";  
$dbname = "Car";  
if(!isset($_GET['cid'])){  
    die('车牌号 is not define');
}  
if(!isset($_GET['uid'])){  
    die('用户id is not define');  
}  
if(!isset($_GET['cname'])){  
    die('车主名 is not define');  
}  
if(!isset($_GET['types'])){  
    die('车辆类型 is not define');  
}  
if(!isset($_GET['age'])){  
    die('车龄 is not define');  
}  

$cid=$_GET['cid'];
$uid=$_GET['uid'];
$cname=$_GET['cname'];
$types=$_GET['types'];
$age=$_GET['age'];


if(empty($cid)){  
    die('车牌号 is empty');  
}  
if(empty($uid)){  
    die('用户id is empty');
}  
if(empty($cname)){  
    die('车主姓名 is empty');    
}  
if(empty($types)){  
    die('车辆类型 is empty');   
}  
if(empty($age)){
	 die('车龄 is empty');   
}


// 创建连接  
$conn =new mysqli($servername, $username, $password, $dbname);  
// 检测连接  
if ($conn->connect_error) {  
     die("Connection failed: " . $conn->connect_error);  
}  
  
$sql = "INSERT INTO `Cars` (`cid`, `uid`, `cname`, `age`, `types`) VALUES ('{$cid}', '{$uid}', '{$cname}', '{$age}','{$types}')";
  

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