<?php
	header("Content-Type: text/html;charset=utf-8");
    function __autoload($a){
        if(is_file("db.class.php")){
            include_once "db.class.php";
        }
    }
	session_start(); 
	if(isset($_SESSION['login'])&&$_SESSION['login']==1&&isset($_SESSION['type'])&&$_SESSION['type']=='customer'){
		$sql="delete from favorite where Userid =".$_SESSION['userid']." and CarId = ".$_GET['CarId'];
		echo $sql;
	}else{
		echo "<script>alert('Please Login!');window.location.href='login.html';</script>";
	}
    $db = new DB(array('dbname' => 'azhu8_test'));
	//echo $sql;
	if($db->db_delete($sql)){

		echo "<script>alert('Delete Favorite Success!');window.location.href='my-c.php?UserId=".$_SESSION['userid']."';</script>";
	}else{
		echo "<script>alert('Add Favorite Fail!');history.back();</script>";
	}
	