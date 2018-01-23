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
if(!isset($_GET['types'])){  
    die('油品 is not define');  
}  
if(!isset($_GET['price'])){  
    die('单价 is not define');  
}  
if(!isset($_GET['count'])){  
    die('数量 is not define');  
}  
if(!isset($_GET['allprice'])){  
    die('总价 is not define');  
}  
if(!isset($_GET['dates'])){  
    die('日期 is not define');  
}  
if(!isset($_GET['position'])){  
    die('地点 is not define');  
}  

$cid=$_GET['cid'];
$uid=$_GET['uid'];
$types=$_GET['types'];
$price=$_GET['price'];
$count=$_GET['count'];
$allprice=$_GET['allprice'];
$dates=$_GET['dates'];
$position=$_GET['position'];

if(empty($cid)){  
    die('车牌号 is empty');    
}  
if(empty($uid)){  
    die('用户id is empty');
}  
if(empty($types)){  
    die('油品 is empty');
}  
if(empty($price)){  
    die('单价 is empty');    
}  
if(empty($count)){  
    die('数量 is empty');    
}
if(empty($allprice)){  
    die('总价 is empty');    
}
if(empty($dates)){  
    die('日期 is empty');    
}

if(empty($position)){  
    die('地区 is empty');    
}  
// 创建连接  
$conn =new mysqli($servername, $username, $password, $dbname);  
// 检测连接  
if ($conn->connect_error) {  
     die("Connection failed: " . $conn->connect_error);  
}  
echo ($price*$count);
$sql = "INSERT INTO `Refuel` (`cid`, `uid`, `types`, `price`, `count`, `allprice`, `dates`, `position`) VALUES ('{$cid}', '{$uid}', '{$types}', '{$price}','{$count}','{$allprice}', '{$dates}','{$position}')";   
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