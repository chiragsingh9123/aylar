<?php
include 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'DELETE') {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $id = intval($_DELETE['id']);
    
    if ($id) {
        $sql = "DELETE FROM users WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["success" => "Record deleted successfully"]);
        } else {
            echo json_encode(["error" => "Error deleting record: " . $conn->error]);
        }
    }
    $conn->close();
    exit();
}

?>
