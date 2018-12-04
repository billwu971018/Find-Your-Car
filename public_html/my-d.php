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
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">

<style>
body {
   
}

.container{
   max-width: 1400px; //Or whatever value you need
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
      <a class="nav-item nav-link" href="my.php">User Center</a>
      <a class="nav-item nav-link" href="login-d.html">Dealer Login</a>
      <a class="nav-item nav-link" href="login.html">Login</a>
    </div>
  </div>
</nav> 
<div class="am-cf admin-main">
<div class="admin-content">
    <div class="admin-content-body">
<div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <a type="button" href="car-add.html" class="am-btn am-btn-default"><span class="am-icon-plus"></span> Add</a>
            </div>
          </div>
        </div>
       
       
      </div>

      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
				<th class="table-id">CarId</th>
				<th class="table-id">Make</th>
				<th class="table-type">Model</th>
				<th class="table-author am-hide-sm-only">Color</th>
				<th class="table-set">Price</th>
				<th class="table-set">NewOrUsed</th>
				<th class="table-set">Time</th>
				<th class="table-set">Operate</th>
              </tr>
              </thead>
              <tbody>
	<?php
	function __autoload($a){
		if(is_file("db.class.php")){
			include_once "db.class.php";
		}
	};
	$db = new DB(array('dbname' => 'azhu8_test'));
	$sql="select * from carinformation where BelongTo='".$_GET['UserId']."'ORDER BY time DESC ";
	$res=$db->db_getAll($sql);
	if($res){
		foreach ($res as $value) {
		  echo '<tr>
                <td>'.$value['CarId'].'</td>
				<td>'.$value['Make'].'</td>
                
                <td>'.$value['Model'].'</td>
                <td  >'.$value['Color'].'</td>
				<td>'.$value['Price'].'</td>
				<td>'.$value['NewOrUsed'].'</td>
				<td>'.$value['time'].'</td>
                <td>
                  <div class="am-btn-toolbar">
                    <div "class="am-btn-group am-btn-group-xs">
                      <a href="car-update.php?id='.$value['CarId'].'&make='.$value['Make'].'&model='.$value['Model'].'&color='.$value['Color'].'&price='.$value['Price'].'&url='.$value['url'].'" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-gear">Edit</a>
					  <a href="car-delete.php?id='.$value['CarId'].'" class="am-btn am-btn-default am-btn-xs am-text-primary am-hide-sm-only"><span class="am-icon-star">Delete</a>
                      </div>
                  </div>
                </td>
              </tr>';
		}
	}else{
		echo "You have not added any car!";
	}
	?>
              
              </tbody>
            </table>
            
            <p>.....</p>
          </form>
        </div>

      </div>
	  </div>
	  </div>
	  </div>

</html>
