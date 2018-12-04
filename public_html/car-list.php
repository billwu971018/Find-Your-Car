<!DOCTYPE html>
<html lang="en">
<head>
  <title>Car Finder</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/my.js"></script>

<style>
body {
    background-color: #343a40;
}

.container{

    margin-left: auto;
    margin-right: auto;
}
 

</style>




</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.html">Car Finder</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mr-auto">
      <a class="nav-item nav-link active" href="index.html">Home <span class="sr-only">(current)</span></a>

    </div>
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link" href="login-d.html">Dealer Login</a>
        <a class="nav-item nav-link" href="login.html">Login</a>
    </div>
  </div>
</nav> 



<br>
<br>
<div class="container"  >
    <!-- Content here -->
  <div class="row">
   
    <div class="row">
        
<?php
  function __autoload($a){
    if(is_file("db.class.php")){
      include_once "db.class.php";
    }
  };
  $db = new DB(array('dbname' => 'azhu8_test'));
  if($_POST['colors']==0){

  }
  switch ($_POST['price']) {
    case 0:
      $sql="select * from carinformation  where Make like '%".$_POST['makes']."%' and Model like '%".$_POST['models']."%' and Color like '%".$_POST['colors']."%' and NewOrUsed like '%".$_POST['newused']."%' ORDER BY time DESC ";
      break;
    case 1:
      $sql="select * from carinformation  where Make like '%".$_POST['makes']."%' and Model like '%".$_POST['models']."%' and Color like '%".$_POST['colors']."%' and NewOrUsed like '%".$_POST['newused']."%' and Price < 10000 ORDER BY time DESC ";
      break;
    case 2:
      $sql="select * from carinformation  where Make like '%".$_POST['makes']."%' and Model like '%".$_POST['models']."%' and Color like '%".$_POST['colors']."%' and NewOrUsed like '%".$_POST['newused']."%' and Price >= 10000 and Price < 4000 ORDER BY time DESC ";
      break;
    case 3:
      $sql="select * from carinformation  where Make like '%".$_POST['makes']."%' and Model like '%".$_POST['models']."%' and Color like '%".$_POST['colors']."%' and NewOrUsed like '%".$_POST['newused']."%' and Price >=40000 ORDER BY time DESC ";
      break;      
    
    default:
      $sql="select * from carinformation  where Make like '%".$_POST['makes']."%' and Model like '%".$_POST['models']."%' and Color like '%".$_POST['colors']."%' and NewOrUsed like '%".$_POST['newused']."%' ORDER BY time DESC ";
      break;
  }
  
  //echo $sql;
  $res=$db->db_getAll($sql);
  if($res){
    foreach ($res as $value) {
      echo '<div class="card" style="width: 18rem;">

            <img class="card-img-top" src="images/car.jpg" alt="Card image cap">
            <div class="card-body">
            <h3 class="detail-h3">
            <i class="am-icon-mobile am-icon-sm"></i>'.$value['Make'].'/'.$value['Model'].'</h3>
            <h5 class="detail-p">Price: $'.$value['Price'].'</h5>
            <p class="detail-p">Color: '.$value['Color'].'</p>
            <p class="card-text">NewOrUsed: '.$value['NewOrUsed'].'</p>
            <a href="car-content.php?id='.$value['CarId'].'" class="btn btn-primary">Enter</a>
            </div>
        </div>';
    }
  }else{
    echo "Database error!";
  }
  ?>
        
        
  </div>
  </div>
  
</div>
<div class="container">
    <!-- Content here -->
  <div class="row">
    <div class="col-md-4">
    
    </div>
    <div class="row">
    
        
  </div>
  </div>
  
</div>





<!--
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Column 1</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 3</h3>        
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
  </div>
</div>
-->


</body>
</html>
