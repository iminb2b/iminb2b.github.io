
<?php
    session_start();
    $id=$_GET['id'];
    $p=$_GET['p'];
    $i=0;
    echo '<br>';
    foreach ($_SESSION['students'] as $key ) {
    		
        	if($id==$key['id']){
        	array_splice($_SESSION['students'],$i,1);
        	
    		$limit=count($_SESSION['students']);
    		if ($limit%7 == 0) {
             	$page=($limit/7);
            }else{
                $page=(int)($limit/7+1);
            }
            $page= ($p<=$page)? $p:$page;
       		header('location:admin.php?p='.$page.'');
       		break;
    		}
    		$i++;
    }
 
    	