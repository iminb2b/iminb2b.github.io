<?php
	session_start();
	session_destroy();
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trang Quản Lí Sinh Viên</title>
	<style >
		body{
			margin: 40px auto;
			width: 80%;
			
		}
		label{
			display: block;
			width: 100px;
			float: left;
			line-height: 40px;
			margin-top: 20px;
			color: lightblue;
			font-size: 20px;

		}
		input{
			width: 400px;
			height:40px;
			margin-top: 20px;
			border: 1px solid pink;
			border-radius: 10px;
			text-indent: 20px;
			color: pink;
		}
		.submit{
			width: 100px;
			margin-left: 400px;
			background-color: pink;
			text-indent: 0px;
			color: white;

		}
		p{
			color: red;
			margin-left: 100px;
			line-height: 40px;
		}
	</style>
</head>
<body>

<form action="mainl5.php" method="POST">
<label for="stid">Student ID:</label>
<input type="text" name="stid"><br>

<label for="pwd">Password:</label>
<input type="Password" name="pwd"><br>

<input type="submit" class="submit" value="Đăng Nhập">
</form>
<?php
if(isset($_SESSION['errors']['blank'])){
	echo $_SESSION['errors']['blank'];}
if(isset($_SESSION['errors']['wrong'])){
	echo $_SESSION['errors']['wrong'];

}
	


?>
</body>
</html>