<?php
	header("Content-Type: text/html;charset=utf-8");
    function __autoload($a){
        if(is_file("db.class.php")){
            include_once "db.class.php";
        }
    }
    $db = new DB(array('dbname' => 'azhu8_test'));
	$sql="select * from dealerinformation where Username = '".$_POST['username']."'";
	if($db->db_getRow($sql)){
		//echo $db->db_getRow($sql);
		echo "<script>alert('Name exist!');history.back();</script>";
	}else{
		$sql="INSERT INTO dealerinformation (Username,Password,Name,Address,Location,PhoneNumber) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['name']."', '".$_POST['address']."', '".$_POST['location']."','".$_POST['phone']."')";
		if($db->db_insert($sql)){
			//echo "Register success!";
			echo "<script>alert('Register success!');window.location.href='login-d.html';</script>";
			//header("location:login.html");window.location.href='http://www.ddhbb.com';
		}else{
			echo $db->db_insert($sql);
			//echo "<script>alert('Register fail!');history.back();</script>";
		}
		
	}
	