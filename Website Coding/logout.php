<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
    require("connect.php");  
    unset($_SESSION['user']); 
?> 
<body bgcolor="#99FF33">
<center>
    <br /><br /> 
<h1>You Have Successfully Logged Out!</h1> 
    <br /><br /> 
    <form action="home.php">
    <input type="submit" value="LOGIN">
</form>
</center>
