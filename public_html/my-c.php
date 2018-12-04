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

<div class="container"  >
    <!-- Content here -->
    <h1 align="center"><font color = "white">Your Favorite Cars</font></h1>
 
    <!--<div class="col-md-2">
        <br>
        <br>
        <h1 align="center"><font color = "white">Hot Selling</font></h1>
        <h1 align="center"><font color = "white">Cars</font></h1>
    
    </div>-->
    <div class="row">
<?php
  if($_GET){
    if(isset($_GET['delete'])){
        echo "The select function is called.";
    }
}
  function __autoload($a){
    if(is_file("db.class.php")){
      include_once "db.class.php";
    }
  };
  $db = new DB(array('dbname' => 'azhu8_test'));
  $sql="select DISTINCT CarId from favorite  where UserId=".$_GET['UserId'];
  //echo $sql;
  $res=$db->db_getAll($sql);
  //var_dump($res);
  if($res){
    foreach ($res as $value) {
		$sql="select * from carinformation  where CarId=".$value['CarId'];
		//echo $sql;
		$res2=$db->db_getAll($sql);
		foreach ($res2 as $value2) {
			echo '<div class="card" style="width: 17rem;">

            <img class="card-img-top" src="images/car.jpg" alt="Card image cap">
            <div class="card-body">
            <h3 class="detail-h3">
            <i class="am-icon-mobile am-icon-sm"></i>'.$value2['Make'].'/'.$value2['Model'].'</h3>
            <h5 class="detail-p">Price: $'.$value2['Price'].'</h5>
            <p class="detail-p">Color: '.$value2['Color'].'</p>
            <p class="card-text">NewOrUsed: '.$value2['NewOrUsed'].'</p>
            <a href="car-content.php?id='.$value2['CarId'].'" class="btn btn-primary">Enter</a>
            <a href="delete_like.php?CarId='.$value2['CarId'].'" class="btn btn-primary">Delete</a>
            </div>
        </div>';
		}
    }
    
  }else{
    
    ?>
    &nbsp&nbsp&nbsp<p><font color = "white">You have not added any car to your favorite list!</font></p>
    <?php
    

  }
  ?>
 
 </div> 
 
<div class="container">
    <!--
    <h1 class="display-4">Your Recommendation Cars</h1> -->
     <hr class="my-4" font color = "white">
    <h1 align="center"><font color = "white">Recommended Cars</font></h1>
    
    
    <div class="row">
 

<?php
  $minprice = 0;
  $maxprice =999999;
  $mid =1;
  $aver  = 0;
  $sameprice = 0;
  $sql ="select min(price),max(price),avg(price) from carinformation c,favorite f where c.CarId = f.CarId and UserId = ".$_GET['UserId'];
  $pri=$db->db_getAll($sql);
  $stack = array();
  foreach($pri as $p)
  {
      $minprice = $p['min(price)'];
      $maxprice = $p['max(price)'];
      $aver = $p['avg(price)'];
  }
  $mid = ($minprice + $maxprice + $aver)/3;
  $maxprice = $mid *1.5;
  $minprice = $mid /2; 
  
  $sql="select DISTINCT CarId from favorite  where UserId=".$_GET['UserId'];
  //echo $sql;
  $res=$db->db_getAll($sql);
  //var_dump($res);
  if($res){
    foreach ($res as $value) {

		$sql="select Make,Color,Price,url from carinformation  where CarId=".$value['CarId'];
		//echo $sql;
		$res3=$db->db_getAll($sql);
		foreach($res3 as $value3)
		{
		 $sameprice = $value3['Price'];
		 $sql = "select Level from carstype where Brand ='".$value3['Make']."'";
		 $res4 = $db->db_getAll($sql);
		 foreach($res4 as $value4)
		 {
		     $sql = "select Brand from carstype where Level =".$value4['Level'];
		     $res5 = $db->db_getAll($sql);
		     foreach($res5 as $value5)
		     {
		      $sql1 = "select kind from carscolor where color ='".$value3['Color']."'";
		      $color = $db->db_getAll($sql1);
		      foreach($color as $type)
		      {
		         $sql = "select color from carscolor where kind ='".$type['kind']."'";
		         $color1 = $db->db_getAll($sql);
		         foreach($color1 as $valuecolor)
		         {
		         $sql = "select distinct * from carinformation where Make ='".$value5['Brand']."' and Color = '".$valuecolor['color']."' and Price >".$minprice." and Price <".$maxprice;
                 $sql = $sql." and Price !=".$sameprice;
		         $res2 = $db->db_getAll($sql);
        		foreach ($res2 as $value2) {
        		    if (in_array($value2['CarId'], $stack)) {
        		        continue;
        		    }
        		    array_push($stack, $value2['CarId']);
        			echo '<div class="card" style="width: 17rem;">
                    
                    <img class="card-img-top" src="images/car.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h3 class="detail-h3">
                    <i class="am-icon-mobile am-icon-sm"></i>'.$value2['Make'].'/'.$value2['Model'].'</h3>
                    <h5 class="detail-p">Price: $'.$value2['Price'].'</h5>
                    <p class="detail-p">Color: '.$value2['Color'].'</p>
                    <p class="card-text">NewOrUsed: '.$value2['NewOrUsed'].'</p>
                    <a href="car-content.php?id='.$value2['CarId'].'" class="btn btn-primary">Enter</a>
                    
                    </div>
                </div>';
        		}
		       }
		      }
		     }
		 }
		}
    }
    
  }else{
    
    ?>
    <p><font color = "white">We need to know your favorite cars to make recommendation! </font></p>
    <?php
    
  }
  ?>
        
        
  
  </div>
  
</div>
<div class="container">
    <!-- Content here -->
  <div class="row">
    <div class="col-md-2">
    
    </div>
    <div class="row">
    
        
  </div>
  </div>
  
</div>




<div class="container">
    
    <hr class="my-4" font color = "white">
    <h1 align="center"><font color = "white">Get Your Best Visiting Route</font></h1>
    <p class="lead"><font color = "white">Click the button and you can get your best visiting route to visit all of your favorite cars.</p>
    <p><font color = "white">Following the route we provide, you will have minimum total travel distance! Save your time and money!</p>
    <form method = 'post' >
        <input type="submit" value="Get route!" name ='getRoute'>
  </form>
</div>
<br>
<?php


    if(isset($_POST['getRoute'])){
        //echo "AAA";
        $sql="select DISTINCT d.address from favorite f, dealerinformation d, carinformation c where d.dealerID = c.belongto and c.carID = f.carID and f.UserId=".$_GET['UserId'];
        $addr=$db->db_getAll($sql);
        $str = " ";
        foreach($addr as $a)
        {
            $str = $str.$a['address']." @ ";
        }
        $output2 = shell_exec('python shell.py '.$str);
        
        
        echo $output2;

        
    }
    

?>
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
