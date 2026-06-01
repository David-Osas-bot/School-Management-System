<?php
header("Content-Type: application/json");
require_once '../config/database.php';
require_once '../functions/student_functions.php';

$students = getAllStudents($conn);
echo json_encode($students);
