<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["pwd"]);
header("location:index.html");
?>