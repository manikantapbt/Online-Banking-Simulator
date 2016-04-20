<?php
$pass=$_POST['pass'];
$pass1=$_POST['pass1'];
if($pass!=$pass1)
	echo "Password did not match";
else
{
session_start();
$usr=$_SESSION["username"];
$pswd=$_SESSION["pwd"];
$conn = mysql_connect("localhost","admin","admin");
mysql_select_db("banking",$conn);
echo "logged as  ".$usr;
echo "<br>";
$sql=mysql_query("select accno from customer where username='$usr' and pwd='$pswd'");
	while($rows = mysql_fetch_array($sql)):
		$accid = $rows['accno'];
	endwhile;
echo $accid;
$sql1=mysql_query("update customer set pwd='$pass' where accno='$accid'");
$sql2=mysql_query("call passupdate('$accid')");


/*
mysql> create procedure updatepass(IN param int)
    -> BEGIN
    ->   insert into passupdate (accno) values (param);
    -> END
    -> //
Query OK, 0 rows affected (0.00 sec)
*/
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

<div class="center">
<?php ?>
  <h3 align="center">Password Update Status!</h3>
  <br>
  <br>
  
  <form role="form">
	<div class="col-xs-2">
    <label>Logout:</label>
    <button type="" class="form-control"><a href="logout.php">Logout</a></button>
	<span class="help-block">Redirecting:</span>
	</div>
  </form>

</div>

</body>
</html>
