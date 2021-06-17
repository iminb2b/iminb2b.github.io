<?php
    session_start();
    $name=$_POST['name'] ;
    $id=$_POST['id'];
    $pwd=$_POST['pwd'];
    $email=$_POST['email'];
    $phone=$_POST['phone'] ?? '';
    $gender=$_POST['gender'];
    if(!$id || !$name || !$pwd || !$email || !$gender){
        if(!$phone){
            $_SESSION['errors']['phone']='<font>Vui lòng nhập số điện thoại</font>';
            header('location:sua.php?id='.$id.'');
        }
        if(!$name){
            $_SESSION['errors']['name']='<font>Vui lòng nhập tên</font>';
            header('location:sua.php?id='.$id.'');
        }
        if(!$pwd){
            $_SESSION['errors']['pwd']='<font>Vui lòng nhập mật khẩu</font>';
            header('location:sua.php?id='.$id.'');
        }
        if(!$email){
            $_SESSION['errors']['email']='<font>Vui lòng nhập email</font>';
            header('location:sua.php?id='.$id.'');
        }
        if(!$gender){
            $_SESSION['errors']['gender']='<font>Vui lòng chọn giới tính</font>';
            header('location:sua.php?id='.$id.'');
        }

    }else{
        if(is_numeric($phone) != true || strlen($name)<2 || strlen($phone)<10)
        {
            if(is_numeric($phone) != true){
                $_SESSION['errors']['phone']='<font>Chỉ nhập số</font>';
                header('location:sua.php?id='.$id.'');
            }
            if(strlen($name)<2){
            
                $_SESSION['errors']['name']='<font>Tên phải có độ dài lớn hơn 2 kí tự</font>';
                header('location:sua.php?id='.$id.'');
            }
            if(strlen($phone)<10){
            
                $_SESSION['errors']['phone']='<font>Số điện thoai phải có độ dài lớn hơn 9 số</font>';
                header('location:them.php');
            }
        }else{
            $p=0;

            foreach ($_SESSION['students'] as $key ) {
                if($id==$key['id']){
                    $add=[
                    'id'=>$id,
                    'name' => $name,
                    'email' =>  $email,
                    'phone' => $phone,
                    'password' => $pwd,
                    'gender' => $gender,
                    'permission' => 3
                    ];
                    if ($p%7 == 0) {
                    $page=($p/7);
                    }else{
                    $page=(int)($p/7+1);
                    }
                    $_SESSION['students'][$p]=$add;
                   header('location:admin.php?p='.$page.'');

                }
                $p++;
            }

        }
            
            //array_push($_SESSION['students'], $add);
            //array_pop($_SESSION['students']);
           // header('location:admin.php');
    }
    
    