<?php  
header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "root";  
$dbname = "Car";  
if(!isset($_GET['addition'])){  
    die('赠送 is not define');
}  
if(!isset($_GET['title'])){  
    die('优惠标题 is not define');  
}  
if(!isset($_GET['info'])){  
    die('优惠内容 is not define');  
}  
if(!isset($_GET['btime'])){  
    die('起始日期 is not define');  
}  
if(!isset($_GET['etime'])){  
    die('截止日期 is not define');  
}  

$addition=$_GET['addition'];
$title=$_GET['title'];
$info=$_GET['info'];
$btime=$_GET['btime'];
$etime=$_GET['etime'];


if(empty($addition)){  
    die('赠送 is empty');  
}  
if(empty($title)){  
    die('标题 is empty');
}  
if(empty($info)){  
    die('内容 is not empty');    
}  
if(empty($btime)){  
    die('开始时间 is not empty');   
}  
if(empty($etime)){
	 die('结束时间 is not empty');   
}


// 创建连接  
$conn =new mysqli($servername, $username, $password, $dbname);  
// 检测连接  
if ($conn->connect_error) {  
     die("Connection failed: " . $conn->connect_error);  
}  
  
$sql = "INSERT INTO `Sends` (`addition`, `title`, `info`, `btime`, `etime`) VALUES ('{$addition}', '{$title}', '{$info}', '{$btime}','{$etime}')";
  

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