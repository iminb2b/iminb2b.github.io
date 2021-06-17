<?php
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang Quản Lí Sinh Viên</title>
	<style >
		html{
			margin-left: 100px ;

		}
		body{
			width: 80%;
		}
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
			width: 100px;
			margin-left: 30px;
			background-color: pink;
			text-indent: 0px;
			float: left;

		}
		button >a{
			text-decoration: none;
			color: white;
		}
	</style>
</head>
<body>

<h2>THÊM MỚI SINH VIÊN </h2>
<form action="them1.php" method="POST">

<label for="name">Họ và tên</label>
<input class="in" type="text" name="name">
<?php
	if(isset($_SESSION['errors']['name']))
		echo $_SESSION['errors']['name'];
		unset($_SESSION['errors']['name']);

?><br>
<label for="name">Mã số sinh viên</label>
<input class="in" type="text" name="id">
<?php
	if(isset($_SESSION['errors']['id']))
	echo $_SESSION['errors']['id'];
	unset($_SESSION['errors']['id']);
?><br>
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

?><br>
<label for="gender">Giới tính</label>
<input type="radio" class="gender" name="gender" value="1"><label>Nam</label>
<input type="radio" class="gender"  name="gender" value="2"><label>Nữ</label>
<br>
<?php
	if(isset($_SESSION['errors']['gender']))
	echo $_SESSION['errors']['gender'];
	unset($_SESSION['errors']['gender']);

?>
<br><br>
<input type="submit" class="submit" value="Lưu Lại">
<button><a href="admin.php">Hủy</a></button>
</form>

</body>
</html>