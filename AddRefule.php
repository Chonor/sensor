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
if(!isset($_GET['types'])){  
	$arr['status'] = 0;
	$arr['msg']   = '油品 is not define';
	echo json_encode($arr);
    die();   
}  
if(!isset($_GET['price'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '单价 is not define';
	echo json_encode($arr);
    die();    
}  
if(!isset($_GET['count'])){
	$arr['status'] = 0;
	$arr['msg']   = '数量 is not define';
	echo json_encode($arr);
    die();    
}  
if(!isset($_GET['dates'])){
	$arr['status'] = 0;
	$arr['msg']   = '日期 is not define';
	echo json_encode($arr);
    die();     
}  
if(!isset($_GET['position'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '地点 is not define';
	echo json_encode($arr);
    die();   
}  

$cid=$_GET['cid'];
$uid=$_GET['uid'];
$types=$_GET['types'];
$price=$_GET['price'];
$count=$_GET['count'];
$dates=$_GET['dates'];
$position=$_GET['position'];

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
if(empty($types)){  
	$arr['status'] = 0;
	$arr['msg']   = '油品 is empty';
	echo json_encode($arr);
    die();   
}  
if(empty($price)){  
	$arr['status'] = 0;
	$arr['msg']   = '单价 is empty';
	echo json_encode($arr);
    die();   
}  
if(empty($count)){  
	$arr['status'] = 0;
	$arr['msg']   = '数量 is empty';
	echo json_encode($arr);
    die();      
}
if(empty($dates)){  
	$arr['status'] = 0;
	$arr['msg']   = '日期 is empty';
	echo json_encode($arr);
    die();     
}

if(empty($position)){  
	$arr['status'] = 0;
	$arr['msg']   = '地点 is empty';
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
$allprice=$price*$count;


$sql0 = "SELECT moneys FROM Users where uid='{$uid}'";
$result = $conn->query($sql0);
$moneys=0;
if($row = $result->fetch_assoc()){
	$moneys=$row['moneys'];
	if($moneys<$allprice){
		$arr['status'] = 0;
		$arr['msg']   = '余额不足,no moneys';
		echo json_encode($arr);
		die();
	}
}else{
	$arr['status'] = 0;
	$arr['msg']   = '用户不存在,no user';
	echo json_encode($arr);
	die();
}

$sql = "INSERT INTO `Refuel` (`cid`, `uid`, `types`, `price`, `count`, `allprice`, `dates`, `position`) VALUES ('{$cid}', '{$uid}', '{$types}', '{$price}','{$count}','{$allprice}', '{$dates}','{$position}')";   
$sql1 = "INSERT INTO `Notices` (`nid`, `uid`, `title`, `info`, `ntime`) VALUES (NULL, '{$uid}', '消费通知', '你在{$position}加油{$count}升,单价{$price}元/升,总价{$allprice}元', '{$dates}')";

$sql2 = "update Users set moneys=moneys-{$allprice} where uid='{$uid}'";  
$conn->query("SET AUTOCOMMIT=0");
if($conn->query($sql)==true&&$conn->query($sql1)==true&&$conn->query($sql2)==true){
	$conn->commit();
	$arr['status'] = 1;
	$arr['msg']   = '提交成功,success';
	echo json_encode($arr);

}else{
	$conn->rollback();
	$arr['status'] = 0;
	$arr['msg']   = '提交失败,fail';
	echo json_encode($arr);
}

?>  