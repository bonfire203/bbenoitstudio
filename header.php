<html>
    <head>
        <title> Brandon Benoit</title>
        <link rel="stylesheet" href="style.css">
        <link rel="shortcut icon" href="bstudio.png"/>
    </head>
    <header><title> Brandon Benoit</title></header>
        <body>
            <div class="fixed-header">
                <div id="container">
                    <nav>
                        <a href="index.php">
                            <h1>Benoit.Studio</h1>
                        </a>
                        <img src="bstudio.png" class="logo">
                        <a href="index.php">Home</a>
                        <?php
                            if(isset($_SESSION["userid"])){
                                echo "<a href='signin.php'>Sign In</a>";
                            }else{
                                echo "<a href='signin.php'>Sign Out</a>";
                            }
                        ?>
                        <a href='about.php'>About Me</a>
                    </nav>
                </div>

            </div>