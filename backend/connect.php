<?php
    session_start();
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Content-Type');
    $data = json_decode(file_get_contents("php://input"), true);
    class Database{
        private $host = "localhost";
        private $dbname = "easyreserve";
        private $user = "root";
        private $pass = "";
        private $conn;
        
        public function __construct(){
            try{
                $this->conn = new PDO("mysql:
                host=$this->host;
                dbname=$this->dbname",
                $this->user,$this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $e){
                echo "Connect to Mysql Error !! : " . $e->getMessage();
            }
        }

        public function getDB(){
            return $this->conn;
        }
        
    }
?>