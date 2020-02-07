<?php


class EmpSkl {

    private $conn;

    public $employee_id;
    public $skill_id;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    function create() {
        $query = 'INSERT INTO emps_skls (employee_id, skill_id) VALUES (?, ?)';

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->employee_id, $this->skill_id]);

        return $stmt;
    }

    function update() {
        $query = 'UPDATE emps_skls SET (skill_id = '. $this->skill_id .') VALUES (?)
                  WHERE employee_id = '. $this->employee_id;

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->skill_id]);
    }

}