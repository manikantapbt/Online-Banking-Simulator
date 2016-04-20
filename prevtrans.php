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
$sql1=mysql_query("select transtype,amount,time,tid from transaction where accno='$accid'");
echo "<table>";

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
    background-image:url("money6.jpg");
  }
  td {
    padding: 20px;
	background-color:lightgreen;
}
  table {
    width: 700px;
}
  </style>  
</head>
<body>

<div class="container">
<h2>Transcation Table!</h2>
<br>
<br>
<form role="form">
<div class="col-xs-2">
<label>Transcations::</label>
<?php
echo "<p> Customer With Name as <strong>$usr</strong>.</p>"."<br>" ;
echo "<p><b>Customer With Account No:&nbsp $accid &nbsp is logged in.</p>";
echo "<br>";
		echo "<table border='2' align='center' >";
		echo "<tr><th>".'Trans_Id'."</th><th>".'Trans_type'."</th><th>".'Amount'."</th><th>".'Time'."</th></tr>";

	while($row1=mysql_fetch_array($sql1))
		{
		echo "<tr><td>".$row1['tid']."</td><td>".$row1['transtype']."</td><td>".$row1['amount']."</td><td>".$row1['time']."</td></tr>";
		}
	echo "</table>";
?>
<span class="help-block" align="center">Your last Transcations are here:</span>

<br>
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