
<?php
class Dao {
private $host = "us-cdbr-east-03.cleardb.com";
private $db = "heroku_28353d2db29bb65";
private $user = "b780209395904b";
private $pass = "c883b595";
public function getConnection () {
    return
        new PDO("mysql:host={$this->host};dbname={$this->db}"
}
try{
    $dbh = new PDO($dsn, $user, $password);
    echo "It Worked";
}catch(PDOException $e){
    echo 'Connection Failed: ' . $e->getMessage()
}
try{
    $dbh->query("Select comment_id, comment, date_entered from comment order by date_entered desc", PDO::FETCH_ASSOC)
}catch(exception $e){
    echo print_r($e,1)
    exit;
}
}