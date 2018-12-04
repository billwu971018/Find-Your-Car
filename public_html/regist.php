<?php
	header("Content-Type: text/html;charset=utf-8");
    function __autoload($a){
        if(is_file("db.class.php")){
            include_once "db.class.php";
        }
    }
    $db = new DB(array('dbname' => 'azhu8_test'));
	$sql="select * from customerinformation where Username = '".$_POST['username']."'";
	if($db->db_getRow($sql)){
		//echo $db->db_getRow($sql);
		echo "<script>alert('Name exist!');history.back();</script>";
	}else{
		$sql="INSERT INTO customerinformation (Username,Password) VALUES ('".$_POST['username']."', '".$_POST['password']."')";
		if($db->db_insert($sql)){
			//echo "Register success!";
			echo "<script>alert('Register success!');window.location.href='login.html';</script>";
			//header("location:login.html");window.location.href='http://www.ddhbb.com';
		}else{
			//echo "Register fail!";
			echo "<script>alert('Register fail!');history.back();</script>";
		}
		
	}
	