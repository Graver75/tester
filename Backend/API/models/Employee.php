<?php


class Employee {

    // db config
    private $conn;
    private $table_name = 'employees';

    public $id;
    public $first_name;
    public $last_name;
    public $age;
    public $exp;

    public function __construct($db) {
        $this->conn = $db;
    }

    // all with skills
    function read() {
        $query = 'SELECT * FROM emps_skls
                  JOIN employees USING (employee_id)
                  JOIN skills USING (skill_id)';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

}