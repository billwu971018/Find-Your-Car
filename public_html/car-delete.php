<?php
	header("Content-Type: text/html;charset=utf-8");
    function __autoload($a){
        if(is_file("db.class.php")){
            include_once "db.class.php";
        }
    }
	session_start(); 
    $db = new DB(array('dbname' => 'azhu8_test'));
	$sql="delete from carinformation where CarId = ".$_GET['id'];

	echo $sql;
	if($db->db_delete($sql)){
		echo "<script>alert('Delete success!');window.location.href='my-d.php?UserId=".$_SESSION['userid']."';</script>";
	}else{
		echo "<script>alert('Delete fail!');history.back();</script>";
	}
	