<?php
	header("Content-Type: text/html;charset=utf-8");
    function __autoload($a){
        if(is_file("db.class.php")){
            include_once "db.class.php";
        }
    }
    $db = new DB(array('dbname' => 'azhu8_test'));
	session_start(); 
	$sql="INSERT INTO carinformation (Make,Model,Color,Price,NewOrUsed,BelongTo,url) VALUES ('".$_POST['make']."', '".$_POST['model']."', '".$_POST['color']."', '".$_POST['price']."', '".$_POST['neworused']."',".$_SESSION['userid'].", '".$_POST['url']."')";
	if($db->db_insert($sql)){
		//echo "Register success!";
		echo "<script>alert('Car add success!');window.location.href='my-d.php?UserId=".$_SESSION['userid']."';</script>";
		//header("location:login.html");window.location.href='http://www.ddhbb.com';
	}else{
		//echo "Register fail!";
		echo "<script>alert('Register fail!');history.back();</script>";
	}

	