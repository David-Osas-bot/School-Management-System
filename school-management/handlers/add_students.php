<?php
header("Content-Type: application/json");

require_once '../config/database.php';
require_once '../functions/student_functions.php';

$data = json_decode(file_get_contents("php://input"), true);

// 1. Updated validation matching the JS keys exactly (name instead of full_name, check for id)
if (!empty($data['id']) && !empty($data['name']) && !empty($data['cls']) && !empty($data['gender']) && !empty($data['email'])) {

    // 2. Pass the ID parameter to the model function
    $inserted = addStudent(
        $conn,
        $data['id'],
        $data['name'],
        $data['cls'],
        $data['gender'],
        $data['email'],
        $data['status'] ?? 'active',
        $data['created_at'] ?? null
    );

    if ($inserted) {
        echo json_encode([
            "status" => "success",
            "message" => "Student registered successfully!"
        ]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Missing fields."]);
}
