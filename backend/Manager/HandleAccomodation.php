<?php
    require_once '../controlAdmin.php';
    require_once '../connect.php';
    $db = new Database();
    $conn = $db->getDB();
    $admin = new Admin($conn);
    $action = $data['action'] ?? null;


    if($_SERVER['REQUEST_METHOD'] == 'POST' && $action == 'insertAc'){
        try{
            $table = $data['table'] ?? 'accommodations';
            $hotel = isset($data['hotel_id']) && is_numeric($data['hotel_id']) ? (int)$data['hotel_id'] : null;
            $dataAc = [
                'room_name' => $data['room_name'] ?? '',
                'hotel_id' => $hotel,
                'description' => $data['description'] ?? '',
                'price' => $data['price'] ?? '',
                'capacity' => $data['capacity'] ?? '',
                'beds' => $data['beds'] ?? ''
            ];
            $result = $admin->Insert($dataAc, $table);
            echo json_encode($result);
        }catch(PDOException $e) {
            echo json_encode(["message" => $e->getMessage()]);
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $table = $_GET['table'] ?? 'accommodations';
            $result = $admin->getAll($table);
            echo json_encode($result);
        }catch(PDOException $e){
            echo json_encode(["message" => $e->getMessage()]);
        }
    }
?>