<?php 
		session_start();
		$students=[
			[
				'id'=>'admin',
				'name' => 'admin',
				'email' => "admin@gmail.com",
				'phone' => "0127458312",
				'password' => "admin",
				'gender' => 2,
				'permission' => 1
			],
			[
				'id'=>'sv1',
				'name' => 'Student1',
				'email' => "thuchong@gmail.com",
				'phone' => "0127421312",
				'password' => "thuchong",
				'gender' => 1,
				'permission' => 3
			],
			[
				'id'=>'sv2',
				'name' => 'Student2',
				'email' => "vanthuy@gmail.com",
				'phone' => "0127433312",
				'password' => "vanthuy",
				'gender' => 2,
				'permission' => 3
			],
			[
				'id'=>'sv3',
				'name' => 'Student3',
				'email' => "thuyhangzv@gmail.com",
				'phone' => "0127456712",
				'password' => "thuyhang",
				'gender' => 2,
				'permission' => 2
			],
			[
				'id'=>'sv4',
				'name' => 'Student3',
				'email' => "iminb2b@gmail.com",
				'phone' => "0127458312",
				'password' => "trangnhung",
				'gender' => 2,
				'permission' => 3
			],
			[
				'id'=>'sv5',
				'name' => 'Student4',
				'email' => "maiduyen@gmail.com",
				'phone' => "0127421312",
				'password' => "maiduyen",
				'gender' => 2,
				'permission' => 3
			]
			,
			[
				'id'=>'sv6',
				'name' => 'Student5',
				'email' => "vietan@gmail.com",
				'phone' => "0127421212",
				'password' => "vietan",
				'gender' => 2,
				'permission' => 3
			],
			[
				'id'=>'btob1',
				'name' => 'Seo Eun Kwang',
				'email' => "seoeunkwang@gmail.com",
				'phone' => "019901122",
				'password' => "eunkwang",
				'gender' => 1,
				'permission' => 3
			],
			[
				'id'=>'btob2',
				'name' => 'Lee Min Huyk',
				'email' => "leeminhyuk@gmail.com",
				'phone' => "019901129",
				'password' => "minhyuk",
				'gender' => 1,
				'permission' => 3
			],
			[
				'id'=>'btob3',
				'name' => 'Lee Chang Sub',
				'email' => "leechangsub@gmail.com",
				'phone' => "019910226",
				'password' => "changsub",
				'gender' => 1,
				'permission' => 1
			],
			[
				'id'=>'btob4',
				'name' => 'Im Hyun Sik',
				'email' => "imhyunsik@gmail.com",
				'phone' => "019920307",
				'password' => "hyunsik",
				'gender' => 1,
				'permission' => 3
			],
			[
				'id'=>'btob5',
				'name' => 'Peniel Shin',
				'email' => "shindonggeun@gmail.com",
				'phone' => "019930310",
				'password' => "peniel",
				'gender' => 1,
				'permission' => 3
			],
			[
				'id'=>'btob6',
				'name' => 'Jung Il Hoon',
				'email' => "jungilhoon@gmail.com",
				'phone' => "019941004",
				'password' => "ilhoon",
				'gender' => 1,
				'permission' => 3
			],
			[
				'id'=>'btob7',
				'name' => 'Yook Sung Jae',
				'email' => "yooksungjae@gmail.com",
				'phone' => "019950502",
				'password' => "sungjae",
				'gender' => 1,
				'permission' => 3
			]
					];
		$_SESSION['students']= $students;
		$id= $_POST['stid'];
		$pwd= $_POST['pwd'];

		if(!$id || !$pwd){
			$_SESSION['errors']['blank']='<p>Your student id or password is missing. Please try again!!!</p>';
			unset($_SESSION['errors']['wrong']);
			header('location:main.php');
		}else{
			foreach ($_SESSION['students'] as $key ) {
				if($id == $key['id'] && $pwd == $key['password']){

					header('location:admin.php?permission='.$key['permission'].'');
					
				}else if($id == $key['id'] && $pwd != $key['password']){
					$_SESSION['errors']['wrong']='<p>Your student id or password is wrong. Please try again!!!</p>';
					unset($_SESSION['errors']['blank']);
					header('location:main.php');
				}else if($id != $key['id'] || $pwd != $key['password']){
					continue;		
				}
			}
		}

 ?>