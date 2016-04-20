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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DBMS :</title>
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
  <h2>Customers Works</h2>
  <br>
  <br>
  <?php
   echo "<p> WELCOME--> <strong>$usr</strong>.</p>"."<br>" ;
   echo "<p><b> Customer With Account No:&nbsp $accid  is logged in.</b></p>";
   echo "<br>";
  ?>
  <form role="form">
	
    <div class="col-xs-2">
      <label>Withdrawl:</label>
      <button type="" class="form-control"><a href="withdrawl.html">withdrawl</a></button>
	  <span class="help-block">Please check your balance while withdrawing:</span>
	</div>
	
	<div class="col-xs-2">
    <label>Deposit:</label>
    <button type="submit" class="form-control"><a href="depositeamt.html">Deposit</a></button>
	<span class="help-block">You can deposit your amt with no Limit here:</span>
	</div>
	
	<div class="col-xs-2">
    <label>Loan Details:</label>
    <button type="submit" class="form-control"><a href="loandetails.php">Loan Details</a></button>
	<span class="help-block">You can check your Loan Details here:</span>
	</div>
	
	<div class="col-xs-2">
    <label>Balance Enquire</label>
    <button type="submit" class="form-control"><a href="bal.php">Balance</a></button>
	<span class="help-block">You can check your Balance here:</span>
	</div>
	<div class="col-xs-2">
    <label>Transactions:</label>
    <button type="submit" class="form-control"><a href="prevtrans.php">Transactions</a></button>
	<span class="help-block">You can check your previous Transactions here:</span>
	</div>
	<div class="col-xs-2">
    <label>Update Password:</label>
    <button type="submit" class="form-control"><a href="passwordupdate.html">Password</a></button>
	<span class="help-block">You can change your password here:</span>
	</div>
	<div class="col-xs-2">
    <label>Password Update History:</label>
    <button type="submit" class="form-control"><a href="update.php">Password</a></button>
	<span class="help-block">You can Check whether your password is Updated or not:</span>
	</div>
	
  </form>
</div>
</body>
</html>