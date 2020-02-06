<?php


include_once '../config/database.php';
include_once '../models/Employee.php';
include_once '../models/Skill.php';
include_once '../models/Emp_Skl.php';

// db connection
$database = new Database();
$db = $database->getConnection();

$employee = new Employee($db);

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

$employee->first_name = $_POST['first_name'];
$employee->last_name = $_POST['last_name'];
$employee->age = $_POST['age'];
$employee->exp = $_POST['age'];
$skills = $_POST['skills'];

$employee->create();

foreach ($skills as $skill_raw) {

    $skill = new Skill($db);
    $skill->skill = $skill_raw;
    $skill->create();

    $emp_skl = new EmpSkl($db);
    $emp_skl->employee_id = $employee->employee_id;
    $emp_skl->skill_id = $skill->skill_id;
    $emp_skl->create();

}

echo json_encode($employee);