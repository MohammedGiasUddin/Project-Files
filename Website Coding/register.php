<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
    require("connect.php");
	
	 if(!empty($_POST)) 
    {  
        if(empty($_POST['username'])) 
        { 
            die("Please enter a username."); 
        } 
     
        $query = " 
            INSERT INTO mousers ( 
                name, 
				password,
				dob,
				email,
                mobile 
            ) VALUES ( 
                :username, 
				:password,
				:dob,
				:email,
                :mobile
            ) 
			

        "; 

        $query_params = array( 
            ':username' => $_POST['username'],
			':password' => $_POST['password'],
			':dob' => $_POST['dob'],
			':email' => $_POST['email'], 
            ':mobile' => $_POST['mobile'] 
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
         

        header("Location: home.php"); 
          
        die("Redirecting to home.php"); 
    } 
     
?> 
<body bgcolor="#99FF33">
<center>
    <br /><br /> 
<h1>Register</h1>
  <br /><br /> 
<form action="register.php" method="post"> 
        <br /><br /> 
    Username:
    <input type="text" name="username" value="" /> 
    <br /><br /> 
    Password:
    <input type="password" name="password" value="" /> 
    <br /><br /> 
	DOB:
    <input type="text" name="dob" value="" /> 
    <br /><br /> 
    Personal E-Mail:
    <input type="text" name="email" value="" /> 
    <br /><br /> 
    Mobile:
    <input type="text" name="mobile" value="" /> 
    <br /><br /> 
    <input type="submit" value="ADD" /> 
</form>
<form action="home.php">
    <input type="submit" value="BACK">
</form>
  </body>
</html>
