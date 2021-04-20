
<html>
<!--Navbar source: https://www.w3schools.com/css/css_navbar_horizontal.asp-->

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <div class="container-fluid">
  <header id="header">
      <img src="images/benoitstudiologo.png" class="logo">
      <nav id="NavBar">
          <ul>
            <li><a class="active" href=index.php>Home</a></li>
            <li><a href=photography.php>Photography</a></li>
            <li><a href=writing.php>Writing</a></li>
            <li><a href=gamedesign.php>Game Design</a></li>
            <li><a href=art.php>Art</a></li>
            <li><a href=about.php>About</a></li>
            <li><?php
                       if(isset($_SESSION["userid"])){
                            echo "<a href='signout.inc.php'>Sign Out</a>";
                        }else{
                            echo "<a href='signin.php'>Sign In</a>";
                        }
                    ?></li>
          </ul>
        </nav>
  </header>
</div>
</head>

