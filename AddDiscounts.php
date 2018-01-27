<?php  
header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "root";  
$dbname = "Car";  
if(!isset($_GET['discount'])){  
	$arr['status'] = 0;
	$arr['msg']   = '折数 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();
}  
if(!isset($_GET['title'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '优惠标题 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
if(!isset($_GET['intr'])){  
	$arr['status'] = 0;
	$arr['msg']   = '优惠简介 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
if(!isset($_GET['info'])){  
	$arr['status'] = 0;
	$arr['msg']   = '优惠内容 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
if(!isset($_GET['btime'])){  
	$arr['status'] = 0;
	$arr['msg']   = '起始日期 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
if(!isset($_GET['etime'])){  
	$arr['status'] = 0;
	$arr['msg']   = '截止日期 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  

$discount=$_GET['discount'];
$title=$_GET['title'];
$intr=$_GET['intr'];
$info=$_GET['info'];
$btime=$_GET['btime'];
$etime=$_GET['etime'];


if(empty($discount)){  
	$arr['status'] = 0;
	$arr['msg']   = '折扣 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();  
}  
if(empty($title)){  
	$arr['status'] = 0;
	$arr['msg']   = '标题 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();
}  
if(empty($intr)){
	$arr['status'] = 0;
	$arr['msg']   = '简介 is empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
	die();
}
if(empty($info)){  
	$arr['status'] = 0;
	$arr['msg']   = '内容 is not empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();    
}  
if(empty($btime)){  
	$arr['status'] = 0;
	$arr['msg']   = '开始时间 is not empty';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();   
}  
if(empty($etime)){
	$arr['status'] = 0;
	$arr['msg']   = '结束时间 is not empty';
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
  
$sql = "INSERT INTO `Discounts` (`discount`, `title`, `intr`, `info`, `btime`, `etime`) VALUES ('{$discount}', '{$title}', '{$intr}', '{$info}', '{$btime}','{$etime}')";
$sql1 = "INSERT INTO `Notices` (`nid`, `uid`, `title`, `info`, `ntime`) VALUES (NULL, '0', '优惠通知', '你有新的优惠{$title}', '{$btime}')";

$conn->query("SET AUTOCOMMIT=0");
if($conn->query($sql)==true&&$conn->query($sql1)==true){
	$conn->commit();
	$arr['status'] = 1;
	$arr['msg']   = '提交成功,success';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
}else{
	$conn->rollback();
	$arr['status'] = 0;
	$arr['msg']   = '提交失败,fail';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
}
$conn->close(); 

?>  