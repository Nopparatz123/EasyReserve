<?php
    require_once '../connect.php';
    $db = new Database();
    $conn = $db->getDB();

    class Auth{
        private $conn;

        public function Login($email, $password){
            try{   
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?, email = ?");
                $stmt->execute([$email, $password]);
                $user = $stmt->fetch();

                if($user && password_verify($password, $user['password'])){
                    $_SESSION['user_login'] = $data['id'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['role'] =  $data['role'];
                }else{
                    echo "die";
                }
            }catch(PDOException $e){
                echo "เกิดข้อผิดพลาด" . $e->getMessage();
            }
        }

        public function Register($data,$table){
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

    $Auth = new Auth();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $data['action'] == 'sendRegister'){
        try{
            $table = $data['table'] ?? 'users';
            $password = $data['password'] ?? '';
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $dataUser = [
                'username' => $data['username'] ?? '',
                'email' => $passwordhash,
                'password' => $data['password'] ?? '',
                'role' => $data['role'] ?? '',
            ];
            $result = $Auth->Register($dataUser, $table);
            echo json_encode($result);
        }catch(PDOException $e){
            json_encode(["Message" => $e->getMessage()]);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $data['action'] == 'sendLogin'){
        try{
            $email = $data['email'] ?? '';
            $password = $data['password'] ?? '';
            $result = $Auth->Login($email, $password);
            echo json_encode($result);
        }catch(PDOException $e){
            json_encode(["Message" => $e->getMessage()]);
        }
    }
?>