<?php  
header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "root";  
$dbname = "Car";  
if(!isset($_GET['addition'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '赠送 is not define';
	echo json_encode($arr);
    die();
}  

if(!isset($_GET['title'])){  
	$arr['status'] = 0;
	$arr['msg']   = '礼包标题 is not define';
	echo json_encode($arr);
    die();  
}
if(!isset($_GET['intr'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '礼包简介 is not define';
	echo json_encode($arr);
    die();  
}  
if(!isset($_GET['info'])){  
	$arr['status'] = 0;
	$arr['msg']   = '礼包内容 is not define';
	echo json_encode($arr);
    die();  
}  
if(!isset($_GET['btime'])){  
	$arr['status'] = 0;
	$arr['msg']   = '起始日期 is not define';
	echo json_encode($arr);
    die();  
}  
if(!isset($_GET['etime'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '截止日期 is not define';
	echo json_encode($arr);
    die();  
}  

$addition=$_GET['addition'];
$title=$_GET['title'];
$intr=$_GET['intr'];
$info=$_GET['info'];
$btime=$_GET['btime'];
$etime=$_GET['etime'];


if(empty($addition)){ 
	$arr['status'] = 0;
	$arr['msg']   = '赠送 is empty';
	echo json_encode($arr);
    die();  
}  
if(empty($title)){  
	$arr['status'] = 0;
	$arr['msg']   = '提交失败';
	echo json_encode($arr);
    die();
}  
if(empty($intr)){
	$arr['status'] = 0;
	$arr['msg']   = '简介 is empty';
	echo json_encode($arr);
	die();
}
if(empty($info)){  
	$arr['status'] = 0;
	$arr['msg']   = '内容 is not empty';
	echo json_encode($arr);
    die();    
}  
if(empty($btime)){  
	$arr['status'] = 0;
	$arr['msg']   = '开始时间 is not empty';
	echo json_encode($arr);
    die();   
}  
if(empty($etime)){
	$arr['status'] = 0;
	$arr['msg']   = '结束时间 is not empty';
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
  
$sql = "INSERT INTO `Sends` (`addition`, `title`, `intr`,`info`, `btime`, `etime`) VALUES ('{$addition}', '{$title}','{$intr}', '{$info}', '{$btime}','{$etime}')";
  

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