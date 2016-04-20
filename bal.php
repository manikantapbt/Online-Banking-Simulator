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
$sql1=mysql_query("select sum(amount) as sum from transaction where accno='$accid'");
$row1=mysql_fetch_assoc($sql1);
$sum=$row1['sum'];

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
    
	background-image:url("money1.jpg");
  }

  </style>  
</head>
<body>


<div class="container">
<h2>Balance Enquire Form!</h2>
<br>
<br>
<form role="form">
<div class="">
<label>Balance:</label>
<?php
echo "<p> Customer With Name as <strong>$usr<strong>.</p>"."<br>" ;
echo "<p>Customer With Account No:&nbsp $accid &nbsp is logged in.</p>";
echo "<br>";
echo "<strong>Account Balance::<strong>".$sum;
?>
<span class="help-block">This is Your Present Balance in Your Account:</span>
</div>
<div class="col-xs-2">
<label>Home-page:</label>
<button type="submit" class="form-control"><a href="customer.php">Home</a></button>
<span class="help-block">You can go back to home by clicking here:</span>
</div>
	
</form>
</div>
</body>
</html>