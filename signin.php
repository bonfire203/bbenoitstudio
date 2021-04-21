<?php
    include_once 'header.php'
    ?>

            <div>
                <form for="login" action="includes/login.inc.php" method="post">
                    <div class="container">
                        
                      <input type="text" name="username" placeholder="Enter Username"  required>
                  
                    
                      <input type="password" name="password" placeholder="Enter Password"  required>
                  
                      <button type="submit" name="submit">Login</button>
                      <button type="newacc"><a href="signup.php">Need to Create an Account?</a></button>
                    </div>
                  
                  </form>
            </div>
    </body>
    <?php
    include_once 'footer.php'
    ?>