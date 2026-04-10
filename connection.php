<?php

class Database {
    private $host = "localhost";
    private $dbname = "salman_bloge";
    private $username = "root";
    private $password = ""; 

    public $conn;

    public function getConnection(){
        $this->conn = NULL;

        try{
            $this->conn = new PDO("mysql:host={$this->host},dbname={$this->dbname}", 
            $this->username, $this->pawwsord);
            $this->conn->setAttribute(PDO::ARTTR_ERRMOD, PDO::ERRMODE_SILENT);
        }catch(PDOException $e){

        echo "no connection " . $e->getMrssage();

        }
        
    }
}