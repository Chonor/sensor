<?php  
header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "root";  
$dbname = "Car";   
if(!isset($_GET['cid'])){ 
	$arr['status'] = 0;
	$arr['msg']   = '车牌号 is not define';
	echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    die();
}   
$cid=$_GET['cid'];

if(empty($cid)){  
	$arr['status'] = 0;
	$arr['msg']   = '车牌号 is empty';
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
  
$sql = "select * from Refuel where cid='{$cid}'";  
$result = $conn->query($sql);   
  
$arr = array();  
// 输出每行数据  

while($row = $result->fetch_assoc()) {  
    $count=count($row);//不能在循环语句中，由于每次删除row数组长度都减小  
    for($i=0;$i<$count;$i++){  
        unset($row[$i]);//删除冗余数据  
    }  
    array_push($arr,$row);  
  
}  
 
echo json_encode($arr,JSON_UNESCAPED_UNICODE);//json编码  
$conn->close(); 

  
?>  