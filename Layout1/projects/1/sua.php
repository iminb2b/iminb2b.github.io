<?php
	session_start();
	$id=$_GET['id'];
	foreach ($_SESSION['students'] as $key) {
		if($id==$key['id']){
		
		$name=$key['name'] ;
		$id1=$key['id'];
   		$pwd=$key['password'];
    	$email=$key['email'] ?? '';
    	$phone=$key['phone'] ?? '';
    	$gender=$key['gender'] ?? '';
    	}
	}
	$male='';
	$female='';
	if($gender==1){
		$male='checked';
	}else if($gender==2){
		$female='checked';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Trang Quản Lí Sinh Viên</title>
	<style >
		label{
			display: block;
			width: 150px;
			float: left;
			line-height: 40px;
			margin-top: 20px;
			color: pink;
			font-size: 17px;

		}
		.in, .submit, button{
			width: 400px;
			height:40px;
			margin-top: 20px;
			border: 1px solid pink;
			border-radius: 10px;
			text-indent: 20px;
			color: pink;
		}
		.submit{
			clear: both;
			width: 100px;
			margin-left: 150px;
			background-color: #7ce681;
			text-indent: 0px;
			color: white;
			float: left;
			border: lightgreen;
		}
		p{
			color: red;
			margin-left: 150px;
			line-height: 40px;
		}
		.gender{
			line-height: 40px;
			color: pink;
			font-size: 24px;
			width: 30px;
			height: 20px;
			float: left;
			margin-top: 30px;
		}
		font{
			color: red;
			line-height: 40px;
		}
		button{
			float: left;
			width: 100px;
			margin-left: 30px;
			background-color: pink;
			text-indent: 0px;

		}
		button >a{
			text-decoration: none;
			color: white;
		}
		.hidden{
			display: none;
		}
	</style>
</head>
<body>
<?php
echo '<h2>Sinh viên '.$name.' </h2>

<form action="sua1.php" method="POST">

<label for="name">Họ và tên</label>
<input class="in" type="text" name="name" value="'.$name.'" >
<br>
<label for="name">Mã số sinh viên</label>
<input class="in" type="text" name="id" value="'.$id.'" disabled>
<input class="hidden" name="id" value="'.$id.'">
';
?>
<br>
<label for="name">Mật khẩu</label>
<input class="in" type="password" name="pwd">
<?php
	if(isset($_SESSION['errors']['pwd']))
	echo $_SESSION['errors']['pwd'];
	unset($_SESSION['errors']['pwd']);
	
?><br>
<label for="email">Email</label>
<input class="in"  type="email" name="email">
<?php
	if(isset($_SESSION['errors']['email']))
	echo $_SESSION['errors']['email'];
	unset($_SESSION['errors']['email']);

?><br>
<label for="phone">Điện thoại</label>
<input class="in"  type="number" name="phone">
<?php
	if(isset($_SESSION['errors']['phone']))
	echo $_SESSION['errors']['phone'];
	unset($_SESSION['errors']['phone']);
	
	echo '<br>
	<label for="gender">Giới tính</label>
	<input type="radio" class="gender" name="gender" value="1" '.$male.'><label>Nam</label>
	<input type="radio" class="gender"  name="gender" value="2" '.$female.'><label>Nữ</label>
	<br>';

	if(isset($_SESSION['errors']['gender']))
	echo $_SESSION['errors']['gender'];
	unset($_SESSION['errors']['gender']);

?>
<br>
<input type="submit" class="submit" value="Lưu Lại">
<button><a href="admin.php">Hủy</button>
</form>

</body>
</html>