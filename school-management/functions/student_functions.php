<?php
// Functions to act as your "Model" data layer
include_once '../config/database.php';

function getAllStudents(mysqli $conn)
{
    $result = $conn->query("SELECT * FROM students ORDER BY created_at DESC");
    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    return $students;
}

function addStudent(
    mysqli $conn,
    string $id,          // Added parameter
    string $name,
    string $cls,
    string $gender,
    string $email,
    string $status = 'active',
    string $created_at = null
): bool {
    $id = $conn->real_escape_string($id);
    $name = $conn->real_escape_string($name);
    $cls = $conn->real_escape_string($cls);
    $gender = $conn->real_escape_string($gender);
    $email = $conn->real_escape_string($email);
    $status = $conn->real_escape_string($status);
    $created_at = !empty($created_at) ? $conn->real_escape_string($created_at) : null;

    // Added 'id' into the column and values array maps
    $sql = "INSERT INTO students (id, name, cls, gender, email, status, created_at) 
            VALUES ('$id', '$name', '$cls', '$gender', '$email', '$status', " . ($created_at ? "'$created_at'" : "NULL") . ")";

    return $conn->query($sql);
}
