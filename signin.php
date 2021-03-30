<?php
    include_once 'header.php'
    ?>

            <div>
                <form action="includes/login.inc.php"method="post">
                    <div class="container">
                        
                      <input type="text" placeholder="Enter Username" name="uname" required>
                  
                    
                      <input type="password" placeholder="Enter Password" name="psw" required>
                  
                      <button type="submit">Login</button>
                      <button type="newacc"><a href="signup.php">Need to Create an Account?</a></button>
                    </div>
                  
                  </form>
            </div>
    </body>
    <?php
    include_once 'footer.php'
    ?>