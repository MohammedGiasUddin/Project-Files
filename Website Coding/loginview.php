<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
    require("connect.php"); 
   
    $submitted_username = ''; 
     

    if(!empty($_POST)) 
    { 
 
        $query = " 
            SELECT 
				*				
            FROM mousers 
            WHERE 
                name = :name
        "; 
         

        $query_params = array( 
            ':name' => $_POST['name'] 
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
         

        $login_ok = false; 
         

        $row = $stmt->fetch(); 
        if($row) 
        { 

            $check_password = $_POST['password']; 

            if($check_password === $row['password']) 
            { 
                // If they do, then we flip this to true 
                $login_ok = true; 
            } 
        } 
         

        if($login_ok) 
        { 

            unset($row['password']); 
             

            $_SESSION['user'] = $row; 
             

            header("Location: view.php"); 
            die("Redirecting to: view.php"); 
        } 
        else 
        { 

            print("<center><h2>Login Failed.</2></center>"); 
             
            $submitted_username = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
     
?> 

<body bgcolor="#99FF33">
<center>
    <br /><br /> 
<h1>Nutri-Diet</h1> 
    <br /><br /> 
        <br /><br /> 
<form action="loginview.php" method="post"> 
    Username:
    <input type="text" name="name" value="<?php echo $submitted_username; ?>" /> 
    <br /><br /> 
    Password: 
    <input type="password" name="password" value="" /> 
    <br /><br /> 
    <input type="submit" value="LOGIN" /> 
</form>
<form action="register.php">
    <input type="submit" value="REGISTER">
</form> </center>
