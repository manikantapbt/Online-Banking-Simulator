<?php
session_start();
$con = mysql_connect("localhost","admin","admin")
 or die(mysql_error());
 
mysql_select_db("banking", $con);


 
$sql="INSERT INTO customer(username,fname,lname,age,addr,country,email,contactno,accno,pwd)
VALUES
('$_POST[cust]','$_POST[fname]','$_POST[lname]','$_POST[age]','$_POST[address]','$_POST[country]','$_POST[email]','$_POST[number]','$_POST[account]','$_POST[password]')";
 
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "<h2 align='center'> Data entered Sucessfully</h2>";

mysql_close($con)

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DBMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <style>
  body {
    background-color:  #00bcd4;  
  }
  </style>   
  </head>
<body>
<div class="container">
<?php ?>
<h3>Manager works!</h3>
<br>
<br> 
<form role="form">
<div class="col-xs-2">
<label>Adding new customer:</label>
<button type="" class="form-control"><a href="addcust.html">Add Customer</a></button>
<span class="help-block">Click here:</span>
</div>

<div class="col-xs-2">
<label>Back to Home-page:</label>
<button type="" class="form-control"><a href="manager.php">HOME</a></button>
<span class="help-block">Redirecting to homepage:</span>
</div>
</form>
</div>
</body>
</html>