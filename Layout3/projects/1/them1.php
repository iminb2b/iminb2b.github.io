<?php
	session_start();
    $name=$_POST['name'] ;
	$id=$_POST['id'];
    $pwd=$_POST['pwd'];
    $email=$_POST['email'];
    $phone=$_POST['phone'] ?? '';
    $gender=$_POST['gender'];
    if(!$id || !$name || !$pwd || !$email || !$gender || !$email){
    	if(!$id){
			$_SESSION['errors']['id']='<font>Vui lòng nhập mã số sinh viên</font>';
			header('location:them.php');}
		if(!$name){
			$_SESSION['errors']['name']='<font>Vui lòng nhập tên</font>';
			header('location:them.php');}
		if(!$pwd){
			$_SESSION['errors']['pwd']='<font>Vui lòng nhập mật khẩu</font>';
			header('location:them.php');
		}
		if(!$email){
			$_SESSION['errors']['email']='<font>Vui lòng nhập email</font>';
			header('location:them.php');
		}
		if(!$gender){
			$_SESSION['errors']['gender']='<font>Vui lòng chọn giới tính</font>';
			header('location:them.php');
		}

	}else{
		if(is_numeric($phone) != true || strlen($name)<2 || strlen($phone)<10)
		{
			if(is_numeric($phone) != true){
				$_SESSION['errors']['phone']='<font>Chỉ nhập số</font>';
				header('location:them.php');}
			if(strlen($name)<2){
			
				$_SESSION['errors']['name']='<font>Tên phải có độ dài lớn hơn 2 kí tự</font>';
				header('location:them.php');}
			}
			if(strlen($phone)<10){
			
				$_SESSION['errors']['phone']='<font>Số điện thoai phải có độ dài lớn hơn 9 số</font>';
				header('location:them.php');
			}
		else{
			$ok=1;
			foreach ($_SESSION['students'] as $key ) {
				if($id == $key['id']){
					$_SESSION['errors']['id']='<font>Mã số sinh viên đã được sử dụng. Xin vui lòng nhập lại</font>';
					$ok=0;
					header('location:them.php');

				}
			}
			if($ok==1){
    		$add=[
    			'id'=>$id,
				'name' => $name,
				'email' =>  $email,
				'phone' => $phone,
				'password' => $pwd,
				'gender' => $gender,
				'permission' => 3
			];
			$p=count($_SESSION['students']);
			if ($p%7 == 0) {
                    $page=($p/7);
            }else{
                    $page=(int)($p/7+1);
            }
    		array_push($_SESSION['students'], $add);
    		
    		header('location:admin.php?p='.$page.'');
   			}
   		}
   	}
    