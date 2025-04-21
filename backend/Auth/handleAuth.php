<?php
    require_once 'auth.php';
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