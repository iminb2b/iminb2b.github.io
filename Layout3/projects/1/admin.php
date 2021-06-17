<?php
	session_start();
	$per=$_GET['permission']??1;
	$p=$_GET['p']??1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách sinh viên</title>
	<style>
		html{
			background-color: #a5fffe;
		}
		body{
			margin: 0px auto;
			width: 90%;
		}
		h2{
			float: left;
			width: 80%;
		}
		table{
			background-color: pink;
			border: 2px solid white;
			float: left;
			width: 100%;
			line-height: 40px;
			text-indent: 10px;
		}
		.them{
			float: right;
			text-decoration: none;
			color: blue;
			line-height: 60px;

		}
		.the{
			width: 100%;
			text-align: right;
		}
		.a1{
			color: green;
			text-decoration: none;

		}
		.a2{
			color: red;
			text-decoration: none;

		}
		.center{
			text-align: center;
		}
		.page{
			display: block;
			width: 50px;
			height: 50px;
			background-color: green;
			text-decoration: none;
			float: left;
			margin: 10px;
			text-align: center;
			line-height: 50px;
			color: white;
			font-size: 20px;
		}
		.active{
			display: block;
			width: 50px;
			height: 50px;
			background-color: pink;
			text-decoration: none;
			float: left;
			margin: 10px;
			text-align: center;
			line-height: 50px;
			color: white;
			font-size: 20px;
		}

	</style>
</head>
<body>
<h2>DANH SÁCH SINH VIÊN</h2>

<a class="them" href="main.php">logout</a><br>
<a class="them the" href="them.php"><b>Thêm mới sinh viên</b></a><br>
<?php
echo '<table border="1" cellspacing="0">';
echo '<th>STT</th>';
echo '<th>MSSV</th>';
echo '<th>Họ và tên</th>';
echo '<th>Email</th>';
echo '<th>Số điện thoại</th>';
echo '<th>Giới tính</th>';
if($per==1)
echo '<th>Hành động</th>';


$limit=count($_SESSION['students']);
if ($limit%7 == 0) {
	$nump=($limit/7);
}else{
	$nump=(int)($limit/7+1);
}

$in=($p-1)*7+1;
$i=$in-1;

$j=$i+7;
$key=$_SESSION['students'];
for ($in; $in<=$j;$in++) {
	if(isset($key[$i])){
		echo '<tr>';
		echo '<td class="center">'.$in.'</td>';
		$id=$key[$i]['id'];
		echo '<td>'.$key[$i]['id'].'</td>';
		echo '<td>'.$key[$i]['name'].'</td>';
		echo '<td>'.$key[$i]['email'].'</td>';
		echo '<td class="center">'.$key[$i]['phone'].'</td>';
		if($key[$i]['gender']==1){
		echo '<td class="center">Nam</td>';}
		else if($key[$i]['gender']==2){
		echo '<td class="center">Nữ</td>';}else {
		echo '<td></td>';}
		$name=$key[$i]['name'];
		$confirm="confirm('Bạn muốn xóa thông tin sinh viên ${name}')";
		if($per==1)
		echo '<td class="center">'.'<a class="a1" href="sua.php?id='.$id.'">Sửa |</a>
		<a class="a2" href="xoa.php?id='.$id.'&p='.$p.'" 
		onclick="'.$confirm.'"> Xóa</a>'.'</td>';
		echo '</tr>';
		$i++;
		if($in==$limit){
			break;	
		}
	}else{
		$i++;
		$in--;
		continue;
	}
}
echo '</table><br>';
for($page=1; $page<=$nump;$page++){
	$class= $page == $p ? 'active':'page';
	echo '<a class="'.$class.'" href="admin.php?p='.$page.'&permission='.$per.'">'.$page.'</a>';

}
//$students=$_SESSION['students'];
?>
</body>
</html>