<?php  
header("content-Type: text/html; charset=utf-8");//字符编码设置  
$servername = "localhost";  
$username = "root";  
$password = "root";  
$dbname = "Car";   
if(!isset($_GET['uname'])){  
    die('用户名 is not define');  
}  
if(!isset($_GET['passwd'])){  
    die('密码 is not define');  
}  
$uname=$_GET['uname'];
$passwd=$_GET['passwd'];

if(empty($uname)){  
    die('用户名 is  empty');    
}  
if(empty($passwd)){  
    die('密码 is empty');
}  


// 创建连接  
$conn =new mysqli($servername, $username, $password, $dbname);  
// 检测连接  
if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}  
  
$sql = "select * from Users where uname='{$uname}' AND passwd='{$passwd}'";  
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
if(empty($arr)){
	$conn->close(); 
	$arr['status'] = 0;
	$arr['msg']   = '用户不能存在或密码错误';
	echo json_encode($arr);
}else{
//print_r($arr);  
echo json_encode($arr,JSON_UNESCAPED_UNICODE);//json编码  
$conn->close(); 
}
  
?>  