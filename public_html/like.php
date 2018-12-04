<?php
	header("Content-Type: text/html;charset=utf-8");
    function __autoload($a){
        if(is_file("db.class.php")){
            include_once "db.class.php";
        }
    }
	session_start(); 
	if(isset($_SESSION['login'])&&$_SESSION['login']==1&&isset($_SESSION['type'])&&$_SESSION['type']=='customer'){
		$sql="insert into favorite (Userid,CarId) values(".$_SESSION['userid'].",".$_GET['CarId'].")";
	}else{
		echo "<script>alert('Please Login!');window.location.href='login.html';</script>";
	}
    $db = new DB(array('dbname' => 'azhu8_test'));
	//echo $sql;
	if($db->db_insert($sql)){

		echo "<script>alert('Add Favorite Success!');window.location.href='index.html';</script>";
	}else{
		echo "<script>alert('Add Favorite Fail!');history.back();</script>";
	}
	