<?php 
require_once "../include/db.php";
require_once "../include/functies/sessionStart.php";
require_once "../include/functies/logout.php";
 
 // Check if the user is already logged in, if yes then redirect him to protected page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	echo 'hoi';
    header("location: overview.php");
    exit;
}
 
$username = $password = "";
$username_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["pass"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["pass"]);
    }
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM users WHERE username = :username";
        if($stmt = $db->prepare($sql)){
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($_POST["username"]);
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
							
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                     
                            header("location: overview.php"); // redirect to protected page
                        } else{
                            $password_err = "Wachtwoord komt niet overeen!";
                        }
                    }
                } else{
                    $username_err = "Gebruiker bestaat niet!";
                }
            } else{
                echo "Oeps er is iets mis gegaan. Probeer het opnieuw!";
            }
            unset($stmt); 
        }
    }
    unset($db);
}
?> 
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
		<title>Log in</title>
	</head>
	<body>
		<form class="login" method="post" action="Login.php">
			<label for="username">Username</label>
			<input type="text" id="username" name="username" placeholder="Username" required>
			<span class="error"><?php echo $username_err; ?></span>
			<label for="password">Password</label>
			<input type="password" id="password" name="pass" placeholder="Password" required>
			<span class="error"><?php echo $password_err; ?></span>
			<input type="submit" name="login" value="Log In">
		</form>               
    </div>
  </body>
</html>

