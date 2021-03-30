<?php
    include 'Dao.php';
    if(isset($_POST["submit"])){
      
        $name = $_POST["name"];
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];

        
        $dao = new Dao();
        
        //require_once 'functions.inc.php';
        
        if($dao->emptyInputSignUp($name, $uid, $pwd, $pwdRepeat)!==false){
            header("location: ../signup.php?error=emptyInput");
            exit();
        }
        
        if($dao->pwdMatch($pwd, $pwdRepeat)!==false){
            header("location: ../signup.php?error=passwordnullmatch");
            exit();
        }
        if($dao->uidExists($uid)!==false){
            header("location: ../signup.php?error=usernametaken");
            exit();
        }
        if($dao->invalidUid($uid)!==false){
            header("location: ../signup.php?error=invalidUid");
            exit();
        }

        $dao->createUser($name,$uid,$pwd);



    }else{
        header("location: ../signup.php");
        exit();
    }