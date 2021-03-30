
<?php
include_once 'signup.inc.php';
class Dao {
    private $host = "us-cdbr-east-03.cleardb.com";//servername 
    private $db = "heroku_28353d2db29bb65";//dbusername
    private $user = "b780209395904b";//dbName
    private $pass = "c883b595"; //dbPassword
    //private $dsn = 'mysql:dbname=heroku_32ded4d6f46196f;host=us-cdbr-east-03.cleardb.com';
    
    public function getConnection(){
            //return
                //new PDO("mysql:host={$this->host};dbname={$this->db}");
        //}
        try{
            $dbh = new PDO($this->dsn, $this->user, $this->password);
            echo "It Worked";
        }catch(PDOException $e){
            //echo 'Connection Failed: ' . $e->getMessage()
            $error = 'Connection Failed: ' . $e->getMessage();
        }
        return $dbh;
    }
    function emptyInputSignUp($name, $uid, $pwd, $pwdRepeat){
        $result =false;
        if(empty($name)||empty($uid)||empty($pwd)||empty($pwdRepeat)){
            $result = true;
        }
    }public function invalidUid($uid){
        $result =false;
        if(!preg_match("/^[a-zA-Z0-9]*$/",$uid)){
            $result = true;
        }
    }public function pwdMatch($pwd,$pwdRepeat){
        $result =false;
        if($pwd !==$pwdRepeat){
            $result = true;
        }
    }
    public function uidExists($uid){
        $conn = $this->getConnection();
        try{
            $q = $conn->prepare("SELECT count(*) as total from Users WHERE username = :username and password = :password");
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
    public function createUser($name, $uid, $pwd){
        $conn = $this->getConnection();
        try{
            $q = $conn->prepare("INSERT INTO userData (name, userId, password) VALUES (?, ?, ?)") ;
            $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
            $q->bindParam($name, $uid, $hashedPwd);
            $q->execute();
            header("location: ../signup.php?error=none");
        }catch(Exception $e){
            echo print_r($e,1);
            exit;
        }
    }
    
//     try{
//         $dbh->query("Select comment_id, comment, date_entered from comment order by date_entered desc", PDO::FETCH_ASSOC)
//     }catch(exception $e){
//         echo print_r($e,1)
//         exit;
//     }
}