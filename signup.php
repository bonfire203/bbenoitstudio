<?php
    include_once 'header.php'
    ?>
         <section class="signup-form">
            <h2>Sign Up</h2>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Enter Your Name">
                <input type="text" name="uid" placeholder="Create Username">
                <input type="password" name="pwd" placeholder="Create Password">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password">   
                <button type="submit" name="submit">Sign Up</button>
        </form>
        <?php
    if(isset($_GET["error"])){
        if($_GET["error"]== "emptyinput"){
            echo "<p>Fill in all fields before submission</p>";
        }else if($_GET["error"]=="invaliduid"){
            echo "<p>Username invalid</p>";
        }else if($_GET["error"]=="passwordsdontmatch"){
            echo "<p>Password does not match</p>";
        }else if($_GET["error"]=="stmtfailed"){
            echo "<p>Error Occured</p>";
        }else if($_GET["error"]=="usernametaken"){
            echo "<p>UsernameTaken</p>";
        }else if($_GET["error"]=="none"){
            echo "<p>Sign Up success!</p>";
        }
    }

?>
</section>

        <?php
    include_once 'footer.php'
    ?>