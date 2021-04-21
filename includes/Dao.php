
<?php
//include_once 'signup.inc.php';
class Dao {
    
    private $host = "us-cdbr-east-03.cleardb.com";//servername 
    private $db = "heroku_28353d2db29bb65";//dbusername
    private $user = "b780209395904b";//dbName
    private $pass = "c883b595"; //dbPassword
    private $dsn = 'mysql:dbname=heroku_28353d2db29bb65;host=us-cdbr-east-03.cleardb.com';

    public function getConnection(){
        try{
            $dbh = new PDO($this->dsn, $this->user, $this->pass);
            //echo "It Worked";
        }catch(PDOException $e){
            //echo 'Connection Failed: ' . $e->getMessage()
            $error = 'Connection Failed: ' . $e->getMessage();
        }
        return $dbh;
    }function emptyInputSignUp($name, $uid, $pwd, $pwdRepeat){
        $result =false;
        if(empty($name)||empty($uid)||empty($pwd)||empty($pwdRepeat)){
            $result = true;
        }
        return $result;
    }function pwdMatch($pwd,$pwdRepeat){
        $result =false;
        if($pwd !==$pwdRepeat){
            $result = true;
        }
        return $result;
    }
    function invalidUid($uid){
        $result =false;
        if(!preg_match("/^[a-zA-Z0-9]*$/",$uid)){
            $result = true;
        }
        return $result;
    }
    function uidExists($uid){
        $conn = $this->getConnection();
        try{
            $q = $conn->prepare("SELECT count(*) as total from userdata WHERE userId = :username");
            $q->bindParam(":username" , $uid);
            $q->execute();
            $row = $q->fetch();
            if($row['total'] == 1){
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
            echo print_r($e,1);
            exit;
        }
    }
    function pwdExists($pwd){
        $conn = $this->getConnection();
        try{
            $q = $conn->prepare("SELECT count(*) as total from userdata WHERE password = :password");
            $hashedPwd = hash('sha256',$pwd);
            $q->bindParam(":password" , $hashedPwd);
            $q->execute();
            $row = $q->fetch();
            if($row['total'] == 1){
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
            echo print_r($e,1);
            exit;
        }
    }
    function createUser($name, $uid, $pwd){
        $conn = $this->getConnection();
        try{
            $q = $conn->prepare("INSERT INTO userData (name, userId, password) VALUES (:nameI, :userId, :passwordI)") ;
            //$hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
            $hashedPwd = hash('sha256',$pwd);
            $q->bindParam(":nameI", $name);
            $q->bindParam(":userId", $uid);
            $q->bindParam(":passwordI", $hashedPwd);
            $q->execute();
            header("location: ../signup.php?error=none");
        }catch(Exception $e){
            echo print_r($e,1);
            exit;
        }
    }
    function emptyInputLogIn($uid, $pwd){
        $result = false;
        if(empty($uid)||empty($pwd)){
            $result = true;
        }
        return $result;
    }
    function logInUser($uid, $pwd){
        //echo 'working';
        
        $uidCheck = $this->uidExists($uid);
        $pwdCheck = $this->pwdExists($pwd);
        
        if($uidCheck===false){
            header("location:../signin.php?error=incorrectuser");
            exit();
        }
        if($pwdCheck===false){
            header("location:../signin.php?error=incorrectpass");
            exit();
        }else if($pwdCheck===true){
            //echo 'it works';
            session_start();
            $_SESSION["userid"] = $uid;
            header("location:../index.php");
            exit();
        }
    }
}