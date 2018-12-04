<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Car Finder</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #ffffff;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }

    body {
        background-color: #343a40;
        color:#ffffff;
    }
    .container{
       max-width: 1400px; //Or whatever value you need
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>Car Edite</h1>
    <p>Car Finder<br/>Find your car here.</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">


    <form action="car-update2.php" method="post" class="am-form">
		<input type="hidden" name="id" value="<?php echo $_GET['id']?>" />
		<label for="make">make:</label>
		<input type="text" name="make" id="username" value="<?php echo $_GET['make']?>">
		<br>
		<label for="model">model:</label>
		<input type="text" name="model" id="username" value="<?php echo $_GET['model']?>">
		<br>
		<label for="color">color:</label>
		<input type="text" name="color" id="username" value="<?php echo $_GET['color']?>">
		<br>
		<label for="price">price:</label>
		<input type="text" name="price" id="username" value="<?php echo $_GET['price']?>">
		<br>
		<label for="neworused">neworused:</label>
		<select name="neworused">
		  <option value ="New">new</option>
		  <option value ="Used">used</option>
		</select>
		<br>
		<label for="url">url:</label>
		<input type="text" name="url" id="username" value="<?php echo $_GET['url']?>">
		<br>

		<div class="am-cf">
		<input type="submit" name="" value="Confirm" class="am-btn am-btn-primary am-btn-sm am-fl">
		</div>
    </form>
    <hr>
    
  </div>
</div>
</body>
</html>
