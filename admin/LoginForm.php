<div class="wrapper fadeInDown">
                        <div id="formContent">
                        <!-- Tabs Titles -->

                        <!-- Icon -->
                        <div class="fadeIn first">
                            <br>
                        </div>

                        <!-- Login Form -->
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <input type="text" id="login" class="fadeIn second" name="username" placeholder="Gebruikersnaam" required>
                            <br>
                            <span> <?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; } ?></span>
                            <br>
                            <input type="text" id="password" class="fadeIn third" name="pass" placeholder="Wachtwoord" required>     
                            <input type="submit" name="login" class="fadeIn fourth" value="Log In">
                        </form>

    
                        </div>
                    </div>
            