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
$sql1=mysql_query("select c.accno,c.fname,p.message,p.time from customer c JOIN passupdate p on c.accno = p.accno and c.accno='$accid'");
echo "<table>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update:</title>
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
	background-color:#FFFACD;
}
  table {
    width: 700px;
	background-color:#F0F0F0;
}
  </style>  
</head>
<body>

<div class="container">
<h2 align="center">Passupdate History!</h2>
<br>
<br>
<form role="form">
<div class="col-xs-2">
<label align="center">HISTORY TABLE:</label>
<?php
//echo "<p> Customer With Name as <strong>$usr</strong>.</p>"."<br>" ;
//echo "<p><b>Customer With Account No:&nbsp $accid &nbsp is logged in.</p>";
echo "<br>";

	echo "<table border='2' align='center' >";
	echo "<tr><th>".'Account NO'."</th><th>".'First Name'."</th><th>".'Message'."</th><th>".'Time'."</th></tr>";
	while($row1=mysql_fetch_array($sql1))
		{
		echo "<tr><td>".$row1['accno']."</td><td>".$row1['fname']."</td><td>".$row1['message']."</td><td>".$row1['time']."</td></tr>";
		}
	echo "</table>";
?>
<span class="help-block" align="center">Your Password Update HISTORY are here:</span>

<br>
<div class="col-xs-2">
<label>Logout:</label><br />
<button type="" class="form-control"><a href="logout.php">Logout</a></button><br />
<span class="help-block">Redirecting:</span>
</div>
</div>
</form>
</div>

</body>
</html>