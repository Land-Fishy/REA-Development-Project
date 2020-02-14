
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="css/LoginStyle.css">
    <title>Document</title>
  </head>
  <body>
    <div class="container-fluid">      
      <?php require_once 'include/nav.php';?>
    	<header>
    		<?php require_once 'include/header.php'; 
    		?>
    	</header>
    	<main>
        
          <?php
          session_start();
               include 'include/LoginForm.php'; 
               
          
	                if(isset($_POST["login"])){
		                handleForm();
	                } 

                function handleForm(){
                
                    require 'include/db.php';
                    
                    $_SESSION['error'] = null;
                    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
                    $passwordAttempt = !empty($_POST['pass']) ? trim($_POST['pass']) : null;
                    
                    $sql = "SELECT id, username, password FROM users WHERE username = :username";
                    $stmt = $db->prepare($sql);

                    $stmt->bindValue(':username', $username);

                     $stmt->execute();

                     $user = $stmt->fetch(PDO::FETCH_ASSOC);
                     
                      if($user == false){
                        
                        
                      } else{
                        $passwordAttempt = md5($passwordAttempt);
                                       
                            if($passwordAttempt == $user['password']){
                       
                            $_SESSION['user_id'] = $user['id'];
                            $_SESSION['logged_in'] = time();
            
                            //Redirect to our protected page, 
                            header('Location: home.php');
                            exit;
            
                            } else{
                                
                             $_SESSION['error'] = "Gebruikersnaam en Wachtwoord komt niet overeen!";
                                                        
                            }
                     }
                }
               
           
            ?>
                  
    	</main>
    	<footer>
    		<?php require_once 'include/footer.php';
    		?>
    	</footer>
    </div>
  </body>
</html>

