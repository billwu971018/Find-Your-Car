<?php
	header("Content-Type: text/html;charset=utf-8");
    function __autoload($a){
        if(is_file("$a.class.php")){
            include_once "$a.class.php";
        }
    }
	session_start(); 
	if(isset($_SESSION['login'])&&$_SESSION['login']==1&&isset($_SESSION['type'])&&$_SESSION['type']=='customer'){
		echo "<script>window.location.href='my-c.php?UserId=".$_SESSION['userid']."';</script>";
	}else if(isset($_SESSION['login'])&&$_SESSION['login']==1&&isset($_SESSION['type'])&&$_SESSION['type']=='dealer'){
		echo "<script>window.location.href='my-d.php?UserId=".$_SESSION['userid']."';</script>";
	}else{
		echo "<script>alert('Please Login!');window.location.href='login.html';</script>";
	}
    