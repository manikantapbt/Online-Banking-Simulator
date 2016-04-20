<?php
session_start();
$accid=$_POST['accountno'];
$amt=$_POST['amount'];
$con = mysql_connect("localhost","admin","admin")
 or die(mysql_error());
 
mysql_select_db("banking", $con);
$sql=mysql_query("select amount from loan where accno=$accid");
$rows = mysql_num_rows($sql);
if($rows>=1)
{
echo "<h2 align = 'center'>Loan Already Given</h2>";
}
else
{
$sql1=mysql_query("insert into loan (accno,amount) values ('$accid','$amt')");
echo "<h2 align = 'center'>'Thank You Visit Again</h2>";
}
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
<h3>Loan Status!</h3>
<br>
<br> 
<form role="form">
<div class="col-xs-2">
<label>Back to Home-page:</label>
<button type="" class="form-control"><a href="manager.php">HOME</a></button>
<span class="help-block">Redirecting to homepage:</span>
</div>
</form>
</div>
</body>
</html>