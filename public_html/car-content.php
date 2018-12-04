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
  <script src="/js/my.js"></script>

<style>
body {
    

.container{
   max-width: 1400px; 
}
 

</style>

<?php
session_start(); 
?>


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
<div class="container">
   <div class="row" >
      <div class="col-xs-6 col-sm-1"          >
         
      </div>
      <div class="col-xs-6 col-sm-5" 
         style="background-color: #eeeeee;box-shadow: 
         inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
         <br><br>
         <?php
            function __autoload($a){
            if(is_file("db.class.php")){
              include_once "db.class.php";
             }
             };
                $db = new DB(array('dbname' => 'azhu8_test'));


              $sql="select url from carinformation  where CarId =".$_GET['id'];
      
                //echo $sql;
                $res=$db->db_getAll($sql);
            if($res){
                    foreach ($res as $value) {
                    echo'<img src="'.$value['url'].'" class="img-responsive" alt="Cinque Terre" width = "400" height = "300">';
                    }
            }
           ?>
         <br><br><br> 
      </div>

      <div class="clearfix visible-xs"></div>

      <div class="col-xs-6 col-sm-5" 
         style="background-color: #eeeeee;
         box-shadow:inset 1px -1px 1px #444, inset -1px 1px 1px #444;">
         <div class="card-body">
<?php



      $sql="select * from carinformation  where CarId =".$_GET['id'];
      
  //echo $sql;
  $res=$db->db_getAll($sql);
  if($res){
    foreach ($res as $value) {
      $dealerid=$value['BelongTo'];
      echo '<div class="card" style="width: 22rem;">

            <div class="card-body">
            <h3 class="detail-h3">
            <i class="am-icon-mobile am-icon-sm"></i>'.$value['Make'].'/'.$value['Model'].'</h3>
            <h5 class="detail-p">Price: $'.$value['Price'].'</h5>
            <p class="detail-p">Color: '.$value['Color'].'</p>
            <p class="card-text">NewOrUsed: '.$value['NewOrUsed'].'</p>
            <a href="like.php?CarId='.$value['CarId'].'" class="btn btn-primary">Like</a>
            </div>
        </div>';
    }
  }else{
    echo "No information!";
  }

        $sql="select * from dealerinformation  where DealerID =".$dealerid;
      
  //echo $sql;
  $res=$db->db_getAll($sql);
  if($res){
    foreach ($res as $value) {
      echo '<div class="card" style="width: 22rem;">

            <div class="card-body">
            <h5 class="detail-h3">
            <i class="detail-p"></i>Name: '.$value['Name'].'</h5>
            <h5 class="detail-p">Address: '.$value['Address'].'</h5>
            <p class="detail-p">Location: '.$value['Location'].'</p>
            <p class="card-text">PhoneNumber: '.$value['PhoneNumber'].'</p>
            </div>
        </div>';
    }
  }else{
    echo "No information!";
  }
  ?>

            
          </div>
      </div>
      <div class="col-xs-6 col-sm-1"          >
         
      </div>
   </div>
</div>



</body>
</html>
