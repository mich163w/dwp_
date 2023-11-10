<?php
class DbCon
{
    private $Username = "root";
    private $Pass = "";
    public $dbCon;
    public function __construct(){
        $dsn = 'mysql:host=localhost;dbname=CocktailDB;charset=utf8';
        $this->dbCon = new PDO($dsn, $this->Username, $this->Pass);
        $this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function DBClose(){
        $this->dbCon = null;
    }

    public function getUserIsAdmin($username) {
        $stmt = $this->dbCon->prepare("SELECT IsAdmin FROM Profile WHERE Username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['IsAdmin'];
    }
}
?>
