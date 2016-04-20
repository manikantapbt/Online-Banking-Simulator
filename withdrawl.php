<?php
session_start();
$usr=$_SESSION["username"];
$pswd=$_SESSION["pwd"];
$conn = mysql_connect("localhost","admin","admin");
mysql_select_db("banking",$conn);
$amt= $_POST['amount'];
$sql=mysql_query("select accno from customer where username='$usr' and pwd='$pswd'");
	while($rows = mysql_fetch_array($sql)):
		$accid = $rows['accno'];
	endwhile;
$sql1=mysql_query("select sum(amount) as sum from transaction where accno='$accid'");
$row1=mysql_fetch_assoc($sql1);
$sum=$row1['sum'];
if($sum<$amt)
{
	echo "<h2 align = 'center'>Insufficient Balance</h2>";
}	
else
{   $amt=-$amt;
		$sql=mysql_query("insert into transaction (accno,transtype,amount) values ('$accid','withdrawl','$amt')");
		echo "<h2 align = 'center'> Sucessfully Withdrawn</h2>";
	
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DBMS Found Transcation:</title>
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
  <h3>Withdrawl Amount is Status!</h3>
  <br>
  <br>
  
  <form role="form">
    <div class="col-xs-2">
    <label>If you want Withdrawl agin:</label>
    <button type="" class="form-control"><a href="withdrawl.html">withdrawl</a></button>
	<span class="help-block">Click here:</span>
	</div>
	<div class="col-xs-2">
    <label>Back to Home-page:</label>
    <button type="" class="form-control"><a href="customer.php">HOME</a></button>
	<span class="help-block">Redirecting to homepage:</span>
	</div>
  </form>

</div>

</body>
</html>
