<?php
    require_once '../controlAdmin.php';
    require_once '../connect.php';
    $db = new Database();
    $conn = $db->getDB();
    $admin = new Admin($conn);
    $action = $data['action'] ?? null;

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $action == 'insertHotel'){
        try{
            $table = $data['table'] ?? 'hotels';
            $dataHotel = [
                'name' => $data['name'] ?? '',
                'description' => $data['description'] ?? '',
                'location' => $data['location'] ?? '',
                'phone' => $data['phone'] ?? ''
            ];
            $result = $admin->Insert($dataHotel, $table);
            echo json_encode($result);
        }catch(Exception $e){
            echo json_encode(["message" => $e->getMessage()]);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $data['action'] == 'deleteHotel'){
        try{    
            $id = $data['id'] ?? 'id';
            $table = $data['table'] ?? 'hotels';
            $result = $admin->delete($table, $id);
            echo json_encode($result);

        }catch(Exception $e){
            echo json_encode(["message" => $e->getMessage()]);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        try{
            $table = $_GET['table'] ?? 'hotels';
            $result = $admin->getAll($table);
            echo json_encode($result);
        }catch(Exception $e){
            echo json_encode(["message" => $e->getMessage()]);
        }
    }
    
?>