<?php

    if(isset($_POST["submit"])){
      
        $name = $_POST["name"];
        $uid = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];

        $dao = new Dao();
        include_once 'Dao.php';
        //require_once 'functions.inc.php';
        
        if($dao->emptyInputSignUp($name, $uid, $pwd, $pwdRepeat)!==false){
            header("location: ../signup.php?error=emptyInput");
            exit();
        }
        if($dao->invalidUid($uid)!==false){
            header("location: ../signup.php?error=invalidUid");
            exit();
        }if($dao->pwdMatch($pwd, $pwdRepeat)!==false){
            header("location: ../signup.php?error=invalidUid");
            exit();
        }
        if($dao->uidExists($connection, $uid)!==false){
            header("location: ../signup.php?error=invalidUid");
            exit();
        }

        $dao->createUser($name,$uid,$pwd);



    }else{
        header("location: ../signup.php");
        exit();
    }