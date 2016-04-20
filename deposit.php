<?php
session_start();

echo "loan taken";
$usr=$_SESSION["username"];
$pswd=$_SESSION["pwd"];
$conn = mysql_connect("localhost","admin","admin");
mysql_select_db("banking",$conn);
$amt= $_POST['amount'];
$sql=mysql_query("select accno from transaction where username='$usr' and pwd='$pswd'");
	while($rows = mysql_fetch_array($sql)):
		$accid = $rows['accno'];
	endwhile;
$sql=mysql_query("insert into loan (accno,transtype,amount) values ('$accid','deposit','$amt')");
echo "<h2 align='center'>deposited sucessfully</h2>";
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
  <h3>Deposited Amount is Status!</h3>
  <br>
  <br>
  
  <form role="form">
    <div class="col-xs-2">
    <label>If you want Deposit agin:</label>
    <button type="" class="form-control"><a href="depositeamt.html">Deposit</a></button>
	<span class="help-block">Click here:</span>
	</div>
	<br>
	<div class="col-xs-2">
    <label>Back to Home-page:</label>
    <button type="" class="form-control"><a href="customer.php">HOME</a></button>
	<span class="help-block">Redirecting to homepage:</span>
	</div>
  </form>

</div>

</body>
</html>
