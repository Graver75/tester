<?php

include_once '../config/database.php';
include_once '../models/Employee.php';

// db connection
$database = new Database();
$db = $database->getConnection();

$employee = new Employee($db);

$employees = array();

if (empty($_GET)) {

    $stmt = $employee->query();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($rows);

} else {
    $key = key((array)$_GET);

    $stmt = $employee->query_by_field($key, $_GET[$key]);

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($rows);
}