<?php
include 'Dao.php';
if(isset($_POST["submit"])){
    $dao = new Dao();
    $username = $_POST["username"];
    $pwd = $_POST["password"];
    
    if($dao->emptyInputLogIn($username, $pwd)!==false){
        header("location: ../signin.php?error=emptyInput");
        exit();
    }
    $dao->loginUser($username,$pwd);
}else{
    header("location:../signin.php?error=null");
    exit();
}