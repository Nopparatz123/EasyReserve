<?php
    require_once '../connect.php';
    $db = new Database();
    $conn = $db->getDB();

    class Auth{
        private $conn;

        public function __construct($conn){
            $this->conn = $conn;
        }

        public function Login($email, $password){
            try{   
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if($user && password_verify($password, $user['password'])){
                    $_SESSION['user_login'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] =  $user['role'];
                    return ['message' => 'login success'];
                }else{
                    return ['message' => 'invalid credential'];
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

    $Auth = new Auth($conn);
    if($_SERVER['REQUEST_METHOD'] == 'POST' && $data['action'] == 'sendRegister'){
        try{
            $table = $data['table'] ?? 'users';
            $password = $data['password'] ?? '';
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $dataUser = [
                'email' => $data['email'] ?? '',
                'username' => $data['username'] ?? '',
                'password' => $passwordhash,
            ];
            $result = $Auth->Register($dataUser, $table);
            echo json_encode($result);
        }catch(PDOException $e){
            echo json_encode(["Message" => $e->getMessage()]);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $data['action'] == 'sendLogin'){
        try{
            $email = $data['email'] ?? '';
            $password = $data['password'] ?? '';
            $result = $Auth->Login($email, $password);
            // $username = $_SESSION['username'];
            echo json_encode([
                "message" => $result['message'],
                "username" => $_SESSION['username'],
            ]);
        }catch(PDOException $e){
            echo json_encode(["Message" => $e->getMessage()]);
        }
    }
?>