<?php
error_reporting(0);
session_start();
$conn=mysql_connect("localhost","admin","admin");
mysql_select_db("banking",$conn);
if(!$conn)
  {
     die("cannot connect:" . mysql_error());	
  }
	mysql_select_db("banking",$conn);
if($_POST["manager"]=="manager" && $_POST["customer"]!="customer")
{
	$usr=$_POST["username"];
	$pswd=$_POST["password"];
	$sql=mysql_query("select username,password from manager where username='$usr' and password='$pswd'");
	while($rows = mysql_fetch_array($sql)):
		$uid = $rows['username'];
		$pid = $rows['password'];
	endwhile;
	if(($uid != $usr) && ($pid != $pswd))
    {	
         echo "<h2 align = center>invalid username and password</h2>";
    }
    else
    {
		
         $_SESSION["username"] = $usr;
         $_SESSION["pwd"] = $pswd;
         header("location:manager.php");
     }
}
if($_POST["manager"]!="manager" && $_POST["customer"]=="customer")
{
	$usr=$_POST["username"];
	$pswd=$_POST["password"];
	$sql=mysql_query("select username,pwd from customer where username='$usr' and pwd='$pswd'");
	while($rows = mysql_fetch_array($sql)):
		$uid = $rows['username'];
		$pid = $rows['password'];
	endwhile;
	if(($uid != $usr) && ($pid != $pswd))
    {	
         echo "<h2 align = center>invalid username and password</h2>";
    }
    else
    {
		
         $_SESSION["username"] = $usr;
         $_SESSION["pwd"] = $pswd;
         header("location:customer.php");
     }
}
if($_POST["manager"]=="manager" && $_POST["customer"]=="customer")
	header("location:index.html");

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
</body>
</html>