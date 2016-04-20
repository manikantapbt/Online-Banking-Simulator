<?php
session_start();
$usr=$_SESSION["username"];
$pswd=$_SESSION["pwd"];
$conn = mysql_connect("localhost","admin","admin");
mysql_select_db("banking",$conn);
$sql=mysql_query("select accno from customer where username='$usr' and pwd='$pswd'");
	while($rows = mysql_fetch_array($sql)):
		$accid = $rows['accno'];
	endwhile;
$sql1=mysql_query("select time,amount from loan where accno='$accid'");
while($rows = mysql_fetch_array($sql1)):
		$amount=$rows['amount'];
endwhile;
$sql2=mysql_query("select timestampdiff(second,time,now()) as time1 from loan where accno='$accid'");
while($rows = mysql_fetch_array($sql2)):
		//$time = $rows['time'];
		$time1=$rows['time1'];
endwhile;

$intrest=(0.1*$amount*$time1)/(30*864000);
$intrest=substr($intrest, 0, 4);
echo "<br> <strong>Intrest of loan taken is</strong>:".$intrest;

echo "<br> <strong>Amount of loan taken is</strong>:".$amount;

echo "<br> <br><strong>Intrest rate is $10 per $100 per month</strong>";

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
  <h2>Loan Details!</h2>
  <br>
  <br>

  <form>
 
	<div class="col-xs-2">
    <label>Back to Home-page:</label>
    <button type="" class="form-control"><a href="customer.php">HOME</a></button>
	<span class="help-block">Redirecting to homepage:</span>
	</div>
	   
	</div>
  </form>
</div>

</body>
</html>