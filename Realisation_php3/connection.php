<?php
class Database {
    private $host = "localhost";
    private $dbname = "blog_db";
    private $username = "root";
    private $password = ""; 

    public $conn;

    public function getConnection(){
        $this->conn = NULL;
        try{
            
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", 
            $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "no connection " . $e->getMessage();
        }
        
        
        return $this->conn; 
    }
}
?>