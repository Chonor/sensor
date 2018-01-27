<?php  
	header("content-Type: text/html; charset=utf-8");//字符编码设置  
	$servername = "localhost";  
	$username = "root";  
	$password = "root";  
	$dbname = "Car";   
	$dates=date("Y-m-d");

	// 创建连接  
	$conn =new mysqli($servername, $username, $password, $dbname);  
	// 检测连接  
	if ($conn->connect_error) {  
		$arr['status'] = 0;
		$arr['msg']   = "Connection failed: " . $conn->connect_error;
		echo json_encode($arr);
		die();  
	}  

	$sql = "select * from Users";  
	$result = $conn->query($sql);  
	$users="<table border=1>"."<tr><th>用户id</th><th>姓名</th><th>性别</th><th>邮箱</th><th>电话</th><th>地址</th><th>余额</th></tr>";

	// 输出每行数据  
	while($row = $result->fetch_assoc()) {  
		$users=$users."<tr><td>".$row['uid']."</td><td>".$row['uname']." </td><td>".$row['sex']." </td><td>".$row['email']." </td><td>".$row['phone']." </td><td>".$row['position']." </td><td>".$row['moneys']." </td></tr>";
	} 
	$users=$users."</table>";

	$sql = "select * from Cars";  
	$result = $conn->query($sql);  
	$cars="<table border=1>"."<tr><th>车牌</th><th>用户id</th><th>用户姓名</th><th>车龄</th><th>车型</th></tr>";

	// 输出每行数据  
	while($row = $result->fetch_assoc()) {  
		$cars=$cars."<tr><td>".$row['cid']."</td><td>".$row['uid']." </td><td>".$row['cname']." </td><td>".$row['age']." </td><td>".$row['types']." </td></tr>";
	} 
	$cars=$cars."</table>";

	$sql = "select * from Refuel";  
	$result = $conn->query($sql);  
	$refuel="<table border=1>"."<tr><th>加油id</th><th>车牌</th><th>用户id</th><th>油品</th><th>单价</th><th>数量</th><th>总价</th><th>时间</th><th>地点</th></tr>";

	// 输出每行数据  
	while($row = $result->fetch_assoc()) {  
		$refuel=$refuel."<tr><td>".$row['rid']."</td><td>".$row['cid']."</td><td>".$row['uid']." </td><td>".$row['types']." </td><td>".$row['price']." </td><td>".$row['count']." </td><td>".$row['allprice']."</td><td>".$row['dates']."</td><td>".$row['position']."</td></tr>";
	} 
	$refuel=$refuel."</table>";

	$sql = "select * from Discounts";  
	$result = $conn->query($sql);  
	$dis="<table border=1>"."<tr><th>折扣id</th><th>标题</th><th>简介</th><th>内容</th><th>起始时间</th><th>结束时间</th></tr>";

	// 输出每行数据  
	while($row = $result->fetch_assoc()) {  
		$dis=$dis."<tr><td>".$row['did']."</td><td>".$row['title']."</td><td>".$row['intr']." </td><td>".$row['info']." </td><td>".$row['btime']." </td><td>".$row['etime']."</td></tr>";
	} 
	$dis=$dis."</table>";

	$sql = "select * from Sends";  
	$result = $conn->query($sql);  
	$send="<table border=1>"."<tr><th>礼包id</th><th>标题</th><th>简介</th><th>内容</th><th>起始时间</th><th>结束时间</th></tr>";

	// 输出每行数据  
	while($row = $result->fetch_assoc()) {  
		$send=$send."<tr><td>".$row['sid']."</td><td>".$row['title']."</td><td>".$row['intr']." </td><td>".$row['info']." </td><td>".$row['btime']." </td><td>".$row['etime']."</td></tr>";
	} 
	$send=$send."</table>";
$conn->close(); 
?> 
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>加油站小程序后端控制台</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
	#frame_out{
		width: 100%;
		min-width: 1000px;
		z-index: 999;
		position: absolute;
		top:150px;
		display: none;
	}
	#frame{
		width: 980px;
		margin: 0px auto;
		text-align: center;
		background: white;
		border: solid 1px black;
		border-radius: 20px;
	}
	#iframe1{
		width: 900px;
		height: 500px;
		margin: auto;
		border: none;
	}
	#close{
		text-align: right;
		height: 30px;
		margin: 5px;
		padding-right: 20px;
	}
	#clo{
		display: inline-block;
		width: 30px;
		height: 30px;
		background: red;
		padding: 6px 11px;
		border-radius: 5px;
		color: white;
	}
	table{
		margin: 10px auto;
		width: 95%;
		text-align: center;
	}
	th{
		text-align: center;
		background-color: aqua;
		font-size: 24px;
	}
	tr:nth-of-type(2n){
		background-color: #efefef;
	}
	tr:nth-of-type(2n+1){
		background-color: #dfdfdf;
	}
</style>
<script>
	function a(){
		obj=document.getElementById("frame_out");
		obj.style.display="none";	
	}
	function b(){
		obj=document.getElementById("frame_out");
		obj.style.display="block";	
	}
</script>
</head>

<body>
<div id="frame_out">
	<div id="frame">
		<div id="close" >
			<span id="clo" onclick="a()">X</span>
		</div>
		<iframe id="iframe1" name="iframe1" src="#" onload="document.all('iframe1').width=test.document.body.scrollWidth">

		</iframe>
	</div>
</div>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false"><span class="sr-only">加油站小程序后端控制台</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="#">加油站小程序后端控制台</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">控制界面<span class="sr-only">(current)</span></a></li>
        <li><a href="example.html">接口示例</a></li>
        <li><a href="#"></a></li>
        
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
<div role="tabpanel">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home1" data-toggle="tab" role="tab" aria-controls="tab1">用户信息查看</a></li>
    <li role="presentation"><a href="#paneTwo1" data-toggle="tab" role="tab" aria-controls="tab2">车辆信息查看</a></li>
    <li role="presentation"><a href="#paneTwo2" data-toggle="tab" role="tab" aria-controls="tab3">加油记录查看</a></li>
   	<li role="presentation"><a href="#paneTwo3" data-toggle="tab" role="tab" aria-controls="tab4">优惠信息查看</a></li>
    <li role="presentation" class="dropdown"><a href="#" id="tabDropOne1" class="dropdown-toggle" data-toggle="dropdown" role="tab" aria-controls="tab3" aria-haspopup="true" aria-expanded="false">查询<span class="caret"></span></a>
      <ul class="dropdown-menu" aria-labelledby="tabDropOne1">
        <li><a href="#tabDropDownOne1" tabindex="-1" data-toggle="tab">查询用户信息</a></li>
        <li><a href="#tabDropDownTwo1" tabindex="-1" data-toggle="tab">查询车辆信息</a></li>
        <li><a href="#tabDropDownThr1" tabindex="-1" data-toggle="tab">查找加油信息（车牌）</a></li>
        <li><a href="#tabDropDownFor1" tabindex="-1" data-toggle="tab">查找加油信息（用户）</a></li>
      </ul>
    </li>
    <li role="presentation" class="dropdown"><a href="#" id="tabDropOne1" class="dropdown-toggle" data-toggle="dropdown" role="tab" aria-controls="tab3" aria-haspopup="true" aria-expanded="false">修改<span class="caret"></span></a>
      <ul class="dropdown-menu" aria-labelledby="tabDropOne1">
        <li><a href="#tabDropDownOne2" tabindex="-1" data-toggle="tab">修改用户信息</a></li>
        <li><a href="#tabDropDownTwo2" tabindex="-1" data-toggle="tab">修改车辆信息</a></li>
        <li><a href="#tabDropDownThr2" tabindex="-1" data-toggle="tab">修改用户密码</a></li>
        <li><a href="#tabDropDownFor2" tabindex="-1" data-toggle="tab">用户钱包充值</a></li>
      </ul>
    </li>
    <li role="presentation" class="dropdown"><a href="#" id="tabDropOne1" class="dropdown-toggle" data-toggle="dropdown" role="tab" aria-controls="tab3" aria-haspopup="true" aria-expanded="false">新增<span class="caret"></span></a>
      <ul class="dropdown-menu" aria-labelledby="tabDropOne1">
        <li><a href="#tabDropDownOne3" tabindex="-1" data-toggle="tab">新增优惠礼包</a></li>
        <li><a href="#tabDropDownTwo3" tabindex="-1" data-toggle="tab">新增用户</a></li>
        <li><a href="#tabDropDownThr3" tabindex="-1" data-toggle="tab">新增车辆</a></li>
        <li><a href="#tabDropDownFor3" tabindex="-1" data-toggle="tab">新增加油</a></li>
      </ul>
    </li>
  </ul>
  <div id="tabContent1" class="tab-content">
	<div role="tabpanel" class="tab-pane fade in active" id="home1">
		<div>
			<?php echo($users)?>
		</div>
	</div>
    <div role="tabpanel" class="tab-pane fade" id="paneTwo1">
      <p><?php echo($cars)?></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="paneTwo2">
      <p><?php echo($refuel)?></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="paneTwo3">
      <p><?php echo($dis)?></p>
      <p><?php echo($send)?></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownOne1">
		  <p><table>
			<tr>
				<th>查询用户信息（需要密码）</th>
			</tr>
			<tr>
				<td>
					<form action="Login.php" method="get" target="iframe1">
						<p>用户名:<input type="text" name="uname"></p>
						<p>密码:<input type="password" name="passwd"></p>
						<p><input type="submit" value="提交" onClick="b()"></p>
					</form> 
				</td>
			</tr>
		  </table></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownTwo1">
		  <p><table>
			<tr>
				<th>查询车辆</th>
			</tr>
			<tr>
				<td>
					<form action="SelectCar.php" method="get" target="iframe1">
						<p>用户名:<input type="text" name="uname"></p>
						<p><input type="submit" value="提交" onClick="b()"></p>
					</form> 
				</td>
			</tr>
		  </table></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownThr1">
		  <p><table>
			<tr>
				<th>查找加油信息（车牌）</th>
			</tr>
			<tr>
				<td>
					<form action="selectByCid.php" method="get" target="iframe1">
						<p>车辆牌:<input type="text" name="cid"></p>
						<p><input type="submit" value="提交" onClick="b()"></p>
					</form> 
				</td>
			</tr>
		  </table></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownFor1">
		  <p><table>
			<tr>
				<th>查找加油信息（用户）</th>
			</tr>
			<tr>
				<td>
					<form action="selectByUname.php" method="get" target="iframe1">
						<p>用户名:<input type="text" name="uname"></p>
						<p><input type="submit" value="提交" onClick="b()"></p>
					</form>  
				</td>
			</tr>
		  </table></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownOne2">
		  <p><table>
			<tr>
				<th>修改用户信息</th>
			</tr>
			<tr>
				<td>
					<form action="ChangeUser.php" method="get"  target="iframe1">
						<p>用户id:<input type="number" name="uid"></p>
						<p>用户名:<input type="text" name="uname"></p>
						<p>性别:<input type="radio" value="男" name="sex" checked>男<input type="radio" value="女" name="sex">女</p>
						<p>手机:<input type="tel" name="phone"></p>
						<p>邮箱:<input type="email" name="email"></p>
						<p>地区:<input type="text" name="position"></p>
						<p><input type="submit" value="提交" onClick="b()"></p>
					</form> 
				</td>
			</tr>
		  </table></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownTwo2">
		  <p><table>
			<tr>
				<th>修改车辆信息</th>
			</tr>
			<tr>
				<td>
					<form action="ChangeCar.php" method="get" target="iframe1">
						<p>车辆牌:<input type="text" name="cid"></p>
						<p>用户id:<input type="number" name="uid"></p>
						<p>车主姓名:<input type="text" name="cname"></p>
						<p>车辆类型:<input type="text" name="types"></p>
						<p>车龄:<input type="number" name="age" step="0.1"></p>
						<p><input type="submit" value="提交"  onClick="b()"></p>
					</form> 
				</td>
			</tr>
		  </table></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownThr2">
		  <p><table>
			<tr>
				<th>修改用户密码</th>
			</tr>
			<tr>
				<td>
					<form action="Changepasswd.php" method="get" target="iframe1">
						<p>用户名:<input type="text" name="uname"></p>
						<p>旧密码:<input type="password" name="oldpasswd"></p>
						<p>新密码:<input type="password" name="passwd"></p>
						<p><input type="submit" value="提交" onClick="b()"></p>
					</form>  
				</td>
			</tr>
		  </table></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownFor2">
		  <p><table>
			<tr>
				<th>用户钱包充值</th>
			</tr>
			<tr>
				<td>
					<form action="Changemoney.php" method="get" target="iframe1">
						<p>用户名:<input type="text" name="uname"></p>
						<p>数额:<input type="number" name="money" step="0.01" ></p>
						<p><input type="submit" value="提交" onClick="b()"></p>
					</form> 
				</td>
			</tr>
		  </table></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownOne3">
      <p><table>
      	<tr>
      		<th>增加优惠</th>
      		<th>增加礼包</th>
      	</tr>
      	<tr>
      		<td>
      			<h1>添加折扣</h1> 
				<form action="AddDiscounts.php" method="get" target="iframe1">
					<p>标题:<input type="text" name="title"></p>
					<p>简介:<input type="text" name="intr"></p>
					<p>内容:<input type="text" name="info"></p>
					<p>折扣:<input type="number" name="discount" min="0.0" step="0.01"></p>
					<p>起始日期:<input type="date" name="btime"></p>
					<p>截止日期:<input type="date" name="etime"></p>
					<p><input type="submit" value="提交" onClick="b()"></p>
				</form>  
      		</td>
      		<td>
      			<h1>添加礼包</h1> 
				<form action="AddSends.php" method="get" target="iframe1">
					<p>标题:<input type="text" name="title"></p>
					<p>简介:<input type="text" name="intr"></p>
					<p>内容:<input type="text" name="info"></p>
					<p>赠送量:<input type="number" name="addition" min="0.0" step="0.01"></p>
					<p>起始日期:<input type="date" name="btime"></p>
					<p>截止日期:<input type="date" name="etime"></p>
					<p><input type="submit" value="提交" onClick="b()"></p>
				</form>  
      		</td>
      	</tr>
      </table></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownTwo3">
		  <p><table>
			<tr>
				<th>新增用户</th>
			</tr>
			<tr>
				<td>
					<form action="AddUsers.php" method="get" target="iframe1">
						<p>用户名:<input type="text" name="uname"></p>
						<p>密码:<input type="password" name="passwd"></p>
						<p>性别:<input type="radio" value="男" name="sex" checked>男<input type="radio" value="女" name="sex">女</p>
						<p>手机:<input type="tel" name="phone"></p>
						<p>邮箱:<input type="email" name="email"></p>
						<p>地区:<input type="text" name="position"></p>
						<p><input type="submit" value="提交" onClick="b()"></p>
					</form> 
				</td>
			</tr>
		  </table></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownThr3">
		  <p><table>
			<tr>
				<th>新增车辆</th>
			</tr>
			<tr>
				<td>
					<form action="AddCars.php" method="get" target="iframe1">
						<p>车辆牌:<input type="text" name="cid"></p>
						<p>用户id:<input type="number" name="uid"></p>
						<p>车主姓名:<input type="text" name="cname"></p>
						<p>车辆类型:<input type="text" name="types"></p>
						<p>车龄:<input type="number" name="age" step="0.1"></p>
						<p><input type="submit" value="提交" onClick="b()"></p>
					</form>  
				</td>
			</tr>
		  </table></p>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="tabDropDownFor3">
		  <p><table>
			<tr>
				<th>新增加油</th>
			</tr>
			<tr>
				<td>
					<form action="AddRefule.php" method="get" target="iframe1">
						<p>车辆牌:<input type="text" name="cid"></p>
						<p>用户id:<input type="number" name="uid"></p>
						<p>油品:<input type="text" name="types"></p>
						<p>单价:<input type="number" name="price" min="0.0" step="0.01"></p>
						<p>数量:<input type="number" name="count" min="0.0" step="0.01"></p>
						<p>日期:<input type="date" name="dates"></p>
						<p>地点:<input type="text" name="position"></p>
						<p><input type="submit" value="提交" onClick="b()"></p>
					</form>
				</td>
			</tr>
		  </table></p>
    </div>
  </div>
</div>
</body>
</html>