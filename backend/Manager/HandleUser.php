<?php
    require_once '../controlAdmin.php';
    require_once '../connect.php';
    $db = new Database();
    $conn = $db->getDB();
    $admin = new Admin($conn);
    $action = $data['action'] ?? null;
    // ------------------END------------------------

    // -----------------Main-----------------------
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        try{
            $table = $_GET['table'] ?? 'users';
            $result = $admin->getAll($table);
            echo json_encode($result);
        }catch(Exception $e){
            echo json_encode(["error" => $e->getMessage()]);
        }
    }elseif($_SERVER['REQUEST_METHOD'] == 'POST' && $action == 'deleteUser'){
        try{
            $id = $data['id'] ?? null;
            $table = $data['table'] ?? 'users';
            
            if($id){
                $result = $admin->delete($table, $id);
                echo json_encode($result);
            }else{
                echo json_encode(["message" => "error", $id, $table]);
            }
        }catch(Exception $e){
            echo json_encode(["error" => $e->getMessage()]);
        }
    }

?>