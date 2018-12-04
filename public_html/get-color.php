<?php
  header("Content-Type: application/json");
  function __autoload($a){
    if(is_file("db.class.php")){
      include_once "db.class.php";
    }
  }
  $db = new DB(array('dbname' => 'azhu8_test'));
  $sql="SELECT DISTINCT Color FROM carinformation ";

  $res=$db->db_getAll($sql);
  $raw_success=array();
  if($res){
    foreach ($res as $value) {
      
      array_push($raw_success,$value["Color"]);
    }
    $res_success = json_encode($raw_success);
    echo $res_success;
  }else{
    echo "Database error!";
  }



