<?php
error_reporting(E_ALL ^ E_DEPRECATED);
    require("connect.php"); 
    if(empty($_SESSION['user'])) 
    {
        header("Location: login.php"); 
        die("Redirecting to login.php"); 
    } 
	
	 if(!empty($_POST)) 
    {  
        if(empty($_POST['carbs'])) 
        { 
            die("Please enter intake information."); 
        } 
     

	 
        $query = " 
		
		UPDATE mousers
		SET carbs = :carbs, fat = :fat, protein = :protein, vits = :vits, total = :total
		WHERE id = :id
		
        "; 

$id = $_SESSION['user']['id'];
$total = $_SESSION['user']['total'];
        $query_params = array( 
            ':carbs' => $_POST['carbs'],
			':fat' => $_POST['fat'],
			':protein' => $_POST['protein'],
			':vits' => $_POST['vits'],
			':id' => $id,
			':total' => $_POST['carbs'] + $_POST['fat'] + $_POST['protein'] + $_POST['vits'],
        ); 
         
        try 
        { 

            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         

        header("Location: intake.php"); 
          
        die("Redirecting to intake.php"); 
    } 
     
?> 
<body bgcolor="#99FF33">
<center>
    <br /><br /> 
<h1>Intake</h1>
  <br /><br />
  <?php  
 echo '		<p><b>User:</b> ' . htmlentities($_SESSION['user']['name'], ENT_QUOTES, 'UTF-8') .'</p>'; 
   ?>
     <br /><br />
<h4><p>The main nutrients that are needed for a good healthy diet are:</p>
<p>1.	Proteins, </p>
<p>2.	Carbohydrates,</p> 
<p>3.	Fats, </p>
<p>4.	Vitamins and Minerals. </p>
<p>These nutrients each have a different purpose. Enter your daily consumption of these nutrients below.</p></h4>


   
<form action="intake.php" method="post"> 
        <br /><br /> 
    Carbohydrates:
    <input type="text" name="carbs" value="" /> 
    <br /><br /> 
    Fat:
    <input type="text" name="fat" value="" /> 
    <br /><br /> 
	Protein:
    <input type="text" name="protein" value="" /> 
    <br /><br /> 
    Vitamins & Minerals:
    <input type="text" name="vits" value="" /> 
    <br /><br /> 
    <input type="submit" value="ADD" /> 
</form>


	<br /><br /> 

	
<form action="logout.php">
    <input type="submit" value="Log Out">
</form>