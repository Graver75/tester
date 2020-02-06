<?php


class Emps_Skls {

    private $conn;

    public $employee_id;
    public $skill_id;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    function create() {
        $query = 'INSERT INTO emps_skls (emplyees_id, skill_id) VALUES (?, ?)';

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->employee_id, $this->skill_id]);
    }

}