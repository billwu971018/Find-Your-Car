<?php
	header("Content-Type: text/html;charset=utf-8");
    function __autoload($a){
        if(is_file("db.class.php")){
            include_once "db.class.php";
        }
    }
    $db = new DB(array('dbname' => 'car'));
	session_start(); 
	$sql="update carinformation set Make='".$_POST['make']."',Model='".$_POST['model']."',Color='".$_POST['color']."',Price='".$_POST['price']."',NewOrUsed='".$_POST['neworused']."',BelongTo=".$_SESSION['userid'].",url='".$_POST['url']."'  where CarId=".$_POST['id'];

	if($db->db_update($sql)){
		//echo "Register success!";
		echo "<script>alert('Car edite success!');window.location.href='my-d.php?UserId=".$_SESSION['userid']."';</script>";
		//header("location:login.html");window.location.href='http://www.ddhbb.com';
	}else{
		//echo "Register fail!";
		echo "<script>alert('Car edite fail!');history.back();</script>";
	}

	