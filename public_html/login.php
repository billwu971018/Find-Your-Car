<?php
	header("Content-Type: text/html;charset=utf-8");
    function __autoload($a){
        if(is_file("db.class.php")){
            include_once "db.class.php";
        }
    }
    $db = new DB(array('dbname' => 'azhu8_test'));
	//echo $_POST['name'];
	//echo $_POST['password'];
	$sql="select * from customerinformation where Username = '".$_POST['username']."' and Password = '".$_POST['password']."'";
	//echo $sql;
	if($db->db_getRow($sql)){
		//echo "Login success!";
		//var_dump($db->db_getRow($sql));
		session_start(); 
		$_SESSION['username']=$_POST['username'];
		$_SESSION['userid']=$db->db_getRow($sql)['CustomerId'];
		$_SESSION['type']='customer';
		$_SESSION['login']=1;
		//var_dump($db->db_getRow($sql)['id']);
		echo "<script>alert('Login Success!');window.location.href='index.html';</script>";
	}else{
		//echo "Login fail!";
		echo "<script>alert('Login Fail!');history.back();</script>";
	}
	