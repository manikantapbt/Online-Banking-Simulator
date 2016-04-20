<?php
//session_name($_POST["username"]);
session_start();
?>
<?php
//echo $_SESSION["username"];
//echo $_SESSION["pwd"];
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
<h3>Manager works!</h3>
<br>
<br> 
<form role="form">
<div class="col-xs-2">
<label>Adding new customer:</label>
<button type="" class="form-control"><a href="addcust.html">Add Customer</a></button>
<span class="help-block">Click here:</span>
</div>

<div class="col-xs-2">
<label>Loan Form:</label>
<button type="" class="form-control"><a href="giveloan.html">Sanction Loan</a></button>
<span class="help-block">Click here:</span>
</div>
</form>
</div>
</body>
</html>