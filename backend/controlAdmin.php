<?php
    require_once 'connect.php';
    $db = new Database();
    $conn = $db->getDB();
    class Admin{
        private $conn;

        public function __construct($conn){
            $this->conn = $conn;
        }

        public function getAll($table){
            $stmt = $this->conn->prepare("SELECT * FROM $table");
            $stmt->execute();
            $userAll = $stmt->fetchAll();
            return $userAll;
        }

        public function delete($table,$id){
            $stmt = $this->conn->prepare("DELETE FROM $table WHERE id = ?");
            $stmt->execute([$id]);
        }

        public function Insert($data,$table){
            $columns = implode(", ", array_keys($data));
            $placeholders = implode(", ", array_fill(0, count($data), '?'));
            $stmt = $this->conn->prepare("INSERT INTO $table($columns)VALUES($placeholders)");
            // $stmt->execute(array_values($data));
            if($stmt->execute(array_values($data))){
                return ['message' => 'success'];
            }else{
                return ['message' => 'error'];
            }
        }

    }
?>