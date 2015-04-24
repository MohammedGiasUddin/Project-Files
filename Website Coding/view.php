<?php
error_reporting(E_ALL ^ E_DEPRECATED);
    require("connect.php"); 
    if(empty($_SESSION['user'])) 
    {
        header("Location: login.php"); 
        die("Redirecting to login.php"); 
    } 
     
?>

<body bgcolor="#99FF33">
<center>
    <br /><br /> 
<h1>Intake View</h1>
  <br /><br />
  
  <?php  
 echo '		<p><b>User:</b> ' . htmlentities($_SESSION['user']['name'], ENT_QUOTES, 'UTF-8') .'</p>'; 
   ?>
  <br /><br /> 


<?php 
$tcarbs = $_SESSION['user']['carbs'];
$tfat = $_SESSION['user']['fat'];
$tprotein = $_SESSION['user']['protein'];
$tvits = $_SESSION['user']['vits'];
$ttotal = $_SESSION['user']['total'];
?>

 <table border="1" cellpadding="20" cellspacing="0" class="Control-Pannel-table">
		  <tr align="center">
			<th scope="col">Carbs</th>
			<th scope="col">Fat</th>
			<th scope="col">Protein</th>
			<th scope="col">Vitamins</th>
			<th scope="col">Total</th>
		  </tr>
			<td><p><?php echo $tcarbs ?></p></td>
			<td><?php echo $tfat ?></td>
			<td><?php echo $tprotein ?></td>
			<td><?php echo $tvits ?></td>
			<td><?php echo $ttotal ?></td>
	</table>

	<br /><br /> 

	
<form action="logout.php">
    <input type="submit" value="Log Out">
</form>